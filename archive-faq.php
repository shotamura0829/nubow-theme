<?php
/*
Template Name: FAQ（分類ごと）
*/
get_header();
?>

<!-- メインコンテンツ -->
<main id="page" class="faq">
	<div class="page-header">
		<div class="links">
			<a href="<?php echo home_url('/'); ?>">サービス紹介</a>
			<a href="<?php echo home_url('/'); ?>faq" class="is-active"><?php the_title(); ?></a>
		</div>
		<div class="inner">
			<ul class="breadcrumbs">
				<li><a href="<?php echo home_url('/'); ?>">ホーム</a></li>
				<li class="arrow">&#62;</li>
				<li>よくあるご質問</li>
			</ul>
			<div class="main-title">
				<h2 class="cmn-title">よくあるご質問</h2>
			</div>
		</div>
	</div>

	<?php
	// 取得対象のタクソノミー
	$tax = 'faq_list';

	// 並び順ポリシー（必要に応じて変更）
	$orderby_posts = 'date'; // 'menu_order' or 'date' など
	$order_posts   = 'DESC';       // 逆順：DESC / 通常：ASC

	// 投稿が1件以上ひも付くタームのみ（hide_empty=true）を並び替え順で取得
	$terms = get_terms([
		'taxonomy'   => $tax,
		'hide_empty' => true,
		'orderby'    => 'term_order', // 必要に応じて 'name' などに変更
		'order'      => 'ASC',
	]);

	// 見出し用に、タームが無い場合のフォールバック
	if (is_wp_error($terms)) $terms = [];
	?>

	<div class="main-content">
		<div class="flex">
			<!-- サイドバー自動生成 -->
			<div class="sidebar" id="sidebar">
				<ul>
					<?php if (!empty($terms)) : ?>
						<?php foreach ($terms as $term) : ?>
							<li><a href="#faq-<?php echo esc_attr($term->slug); ?>"><?php echo esc_html($term->name); ?></a></li>
						<?php endforeach; ?>
					<?php else : ?>
						<li><a href="#faq-all">FAQ</a></li>
					<?php endif; ?>
				</ul>
			</div>
			<div id="sidebar-placeholder" style="display:none;"></div>

			<!-- 本文側 -->
			<div class="faq-main-content">
				<?php if (!empty($terms)) : ?>
					<?php foreach ($terms as $term) : ?>
						<?php
						// 各タームに属するFAQ投稿を取得（逆順：$order_posts = 'DESC'）
						$q = new WP_Query([
							'post_type'      => 'faq',
							'posts_per_page' => -1,
							'orderby'        => $orderby_posts,
							'order'          => $order_posts,
							'tax_query'      => [[
								'taxonomy' => $tax,
								'field'    => 'term_id',
								'terms'    => $term->term_id,
							]],
						]);
						if (!$q->have_posts()) continue;
						?>
						<!-- タームごとのボックス -->
						<div class="box" id="faq-<?php echo esc_attr($term->slug); ?>" name="faq-<?php echo esc_attr($term->slug); ?>">
							<h3><?php echo esc_html($term->name); ?></h3>

							<?php while ($q->have_posts()) : $q->the_post(); ?>
								<dl class="faq-content">
									<dt class="faq-question accordion-toggle">
										<div class="faq-question__title">
											<?php the_title(); ?>
										</div>
									</dt>
									<dd class="faq-answer">
										<div class="faq-answer__wrap">
											<div>
												<?php the_content(); ?>
											</div>
										</div>
									</dd>
								</dl>
							<?php endwhile; wp_reset_postdata(); ?>
						</div>
					<?php endforeach; ?>

				<?php else : ?>
					<!-- タームが無い場合：全件リスト（フォールバック）-->
					<div class="box" id="faq-all" name="faq-all">
						<h3>FAQ</h3>
						<?php
						$q = new WP_Query([
							'post_type'      => 'faq',
							'posts_per_page' => -1,
							'orderby'        => $orderby_posts,
							'order'          => $order_posts,
						]);
						if ($q->have_posts()) :
							while ($q->have_posts()) : $q->the_post(); ?>
								<dl class="faq-content">
									<dt class="faq-question accordion-toggle">
										<div class="faq-question__title">
											<?php the_title(); ?>
										</div>
									</dt>
									<dd class="faq-answer">
										<div class="faq-answer__wrap">
											<div><?php the_content(); ?></div>
										</div>
									</dd>
								</dl>
							<?php endwhile; wp_reset_postdata();
						else : ?>
							<p>現在、FAQは準備中です。</p>
						<?php endif; ?>
					</div>
				<?php endif; ?>
			</div><!-- /.faq-main-content -->
		</div><!-- /.flex -->

		<!-- その他リンク -->
		<?php get_template_part('parts/parts-otherlinks'); ?>
		<!-- /その他リンク -->
	</div><!-- /.main-content -->
</main>
<!-- /メインコンテンツ -->

<script>
jQuery(function($) {
	const $window = $(window);
	const $sidebar = $('#sidebar');
	const $placeholder = $('#sidebar-placeholder');
	const $stopper = $('.other-links');
	const $header = $('header');

	// 初期固定値
	const sidebarOffsetTop = $sidebar.offset().top;
	const sidebarWidth = $sidebar.outerWidth();

	// スティッキー制御
	window.updateSidebar = function() {
		const windowWidth = $window.width();

		if (windowWidth > 1199) {
			const scrollTop = $window.scrollTop();
			const sidebarHeight = $sidebar.outerHeight(true);
			const stopperOffsetTop = $stopper.offset().top;
			const parentOffsetTop = $sidebar.parent().offset().top;
			const maxTop = stopperOffsetTop - sidebarHeight - parentOffsetTop;
			const headerHeight = $header.outerHeight();

			if (scrollTop + headerHeight >= sidebarOffsetTop) {
				if ((scrollTop - parentOffsetTop + headerHeight) >= maxTop) {
					$sidebar.css({ position: 'absolute', top: maxTop, width: sidebarWidth });
				} else {
					$sidebar.css({ position: 'fixed', top: headerHeight, width: sidebarWidth });
				}
				$placeholder.height(sidebarHeight).width(sidebarWidth).show();
			} else {
				$sidebar.css({ position: 'static', width: '342px' });
				$placeholder.hide();
			}
		} else {
			$sidebar.css({ position: 'static', width: 'auto' });
			$placeholder.hide();
		}
	};
	$window.on('scroll resize', updateSidebar);
	updateSidebar();

	// ページ内リンクのスクロール（固定ヘッダー分オフセット）
	$('a[href^="#"]').on('click', function(e) {
		const href = $(this).attr('href');
		if (href.length > 1) {
			const $target = $(href);
			if ($target.length) {
				e.preventDefault();
				const headerH = $header.outerHeight() || 0;
				const top = $target.offset().top - headerH - 8;
				$('html, body').animate({ scrollTop: top }, 300);
			}
		}
	});

	// 直リンク（#付き）で来た場合の初期位置調整
	if (location.hash) {
		const $t = $(location.hash);
		if ($t.length) {
			setTimeout(function() {
				const headerH = $header.outerHeight() || 0;
				const top = $t.offset().top - headerH - 8;
				window.scrollTo({ top: top, behavior: 'instant' });
			}, 0);
		}
	}
});
</script>

<?php get_footer(); ?>
