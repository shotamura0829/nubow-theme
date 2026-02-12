<?php get_header(); ?>

<!-- メインコンテンツ -->
<main id="page" class="case-list">
	<div class="page-header">
		<div class="links">
			<a href="<?php echo home_url('/'); ?>faq" class="is-active"><?php the_title(); ?></a>
		</div>
		<div class="inner">
			<ul class="breadcrumbs">
				<li><a href="<?php echo home_url('/'); ?>">ホーム</a></li>
				<li class="arrow">&#62;</li>
				<li><?php the_title(); ?></li>
			</ul>
			<div class="main-title">
				<h2 class="cmn-title"><?php the_title(); ?></h2>
			</div>
		</div>
		
	</div>
	<div class="main-content">
		<div class="flex">
			<div class="sidebar" id="sidebar">
				<ul>
					<?php
					$terms = get_terms([
						'taxonomy'   => 'works_category',
						'hide_empty' => false,
						'orderby'    => 'term_order',
						'order'      => 'ASC',
					]);

					$index = 1;
					foreach ($terms as $term) :
						$section_id = sprintf('case-list%02d', $index);
						?>
						<li><a href="#<?php echo esc_attr($section_id); ?>"><?php echo esc_html($term->name); ?></a></li>
						<?php
						$index++;
					endforeach;
					?>
				</ul>
			</div>
			<div id="sidebar-placeholder" style="display: none;"></div>
			<div class="case-main-content">
				<?php
				$terms = get_terms([
					'taxonomy'   => 'works_category',
					'hide_empty' => false, 
					'orderby'    => 'term_order',
					'order'      => 'ASC',
				]);

				$index = 1;
				foreach ($terms as $term) :
					$args = [
						'post_type'      => 'case',
						'posts_per_page' => 2,
						'tax_query'      => [
							[
								'taxonomy' => 'works_category',
								'field'    => 'slug',
								'terms'    => $term->slug,
							],
						],
					];

					$query = new WP_Query($args);
					$section_id = sprintf('case-list%02d', $index);
					?>
					<!-- <?php echo esc_html($term->name); ?> -->
					<div class="box" id="<?php echo esc_attr($section_id); ?>" name="<?php echo esc_attr($section_id); ?>">
						<div class="title">
							<h3><?php echo esc_html($term->name); ?></h3>
							<a href="<?php echo esc_url(get_term_link($term)); ?>" class="button"><?php echo esc_html($term->name); ?>の事例一覧</a>
						</div>

						<?php if ($query->have_posts()) : ?>
							<div class="list">
								<?php while ($query->have_posts()) : $query->the_post(); ?>
									<a href="<?php the_permalink(); ?>" class="item">
										<?php if (has_post_thumbnail()) : ?>
											<?php the_post_thumbnail('medium'); ?>
										<?php else : ?>
											<img src="<?php echo get_template_directory_uri(); ?>/img/common/noimg.png" alt="No image">
										<?php endif; ?>
										<h4><?php the_title(); ?></h4>
									</a>
								<?php endwhile; ?>
							</div>
						<?php else : ?>
							<p class="no-posts">現在、該当する事例はありません。</p>
						<?php endif; wp_reset_postdata(); ?>
					</div>
					<?php
					$index++;
				endforeach;
				?>
			</div>
		</div>
	</div>
</main>
<!-- メインコンテンツ -->

<script>
jQuery(function($) {
	const $window = $(window);
	const $sidebar = $('#sidebar');
	const $placeholder = $('#sidebar-placeholder');
	const $stopper = $('footer');

	// 最初の一回で固定値取得
	const sidebarOffsetTop = $sidebar.offset().top;
	const sidebarInitialTop = $sidebar.position().top;
	const sidebarWidth = $sidebar.outerWidth();
	const $header = $('header');

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
					// absolute で止める
					$sidebar.css({
						position: 'absolute',
						top: maxTop,
						width: sidebarWidth
					});
				} else {
					// fixed で追従
					$sidebar.css({
						position: 'fixed',
						top: headerHeight,
						width: sidebarWidth
					});
				}

				$placeholder
					.height(sidebarHeight)
					.width(sidebarWidth)
					.show();
			} else {
				// 初期位置に戻る
				$sidebar.css({
					position: 'static',
					width: '342px'
				});
				$placeholder.hide();
			}
		} else {
			// 1199px以下のときは初期状態に戻す
			$sidebar.css({
				position: 'static',
				width: 'auto'
			});
			$placeholder.hide();
		}
	}

	// スクロールとリサイズ時に処理
	$window.on('scroll resize', updateSidebar);

	// 初期実行
	updateSidebar();
});
</script>

<?php get_footer(); ?>