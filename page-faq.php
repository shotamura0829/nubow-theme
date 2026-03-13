<?php
// =====================================================================
// FAQデータ一元管理
// 回答（answer）を入力すれば HTML と JSON-LD の両方に自動反映されます
// =====================================================================
// セクション定義 + faq_listタクソノミーのターム名を紐付け
// WordPress管理画面で入力したFAQ投稿が優先されます
$faq_section_defs = [
	[ 'id' => 'faq01', 'title' => 'ご注文方法',          'term' => 'ご注文方法' ],
	[ 'id' => 'faq02', 'title' => 'お支払方法',          'term' => 'お支払方法' ],
	[ 'id' => 'faq03', 'title' => 'お届け方法',          'term' => 'お届け方法' ],
	[ 'id' => 'faq04', 'title' => 'お花を贈る時の注意点', 'term' => 'お花を贈る時の注意点' ],
	[ 'id' => 'faq05', 'title' => 'その他',              'term' => 'その他' ],
];

// WordPressのFAQ投稿からデータを取得して $faq_sections を組み立てる
$faq_sections = [];
foreach ( $faq_section_defs as $def ) {
	$items    = [];
	$faq_term = get_term_by( 'name', $def['term'], 'faq_list' );

	if ( $faq_term && ! is_wp_error( $faq_term ) ) {
		$faq_q = new WP_Query([
			'post_type'      => 'faq',
			'posts_per_page' => -1,
			'orderby'        => 'menu_order',
			'order'          => 'ASC',
			'no_found_rows'  => true,
			'tax_query'      => [[
				'taxonomy' => 'faq_list',
				'field'    => 'term_id',
				'terms'    => $faq_term->term_id,
			]],
		]);
		if ( $faq_q->have_posts() ) {
			while ( $faq_q->have_posts() ) {
				$faq_q->the_post();
				$items[] = [
					'question' => get_the_title(),
					'answer'   => get_the_content(),
				];
			}
			wp_reset_postdata();
		}
	}

	// WordPress投稿が1件もなければセクション自体をスキップ
	if ( ! empty( $items ) ) {
		$faq_sections[] = [
			'id'    => $def['id'],
			'title' => $def['title'],
			'items' => $items,
		];
	}
}

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
				<li><?php the_title(); ?></li>
			</ul>
			<div class="main-title">
				<h1 class="cmn-title"><?php the_title(); ?></h1>
			</div>
		</div>
		
	</div>
	<div class="main-content">
		<div class="flex">
			<div class="sidebar" id="sidebar">
				<ul>
					<?php foreach ( $faq_sections as $section ) : ?>
					<li><a href="#<?php echo esc_attr( $section['id'] ); ?>"><?php echo esc_html( $section['title'] ); ?></a></li>
					<?php endforeach; ?>
				</ul>
			</div>
			<div id="sidebar-placeholder" style="display: none;"></div>
			<div class="faq-main-content">
				<?php foreach ( $faq_sections as $section ) : ?>
				<div class="box" id="<?php echo esc_attr( $section['id'] ); ?>">
					<h3><?php echo esc_html( $section['title'] ); ?></h3>
					<?php foreach ( $section['items'] as $item ) : ?>
					<dl class="faq-content">
						<dt class="faq-question accordion-toggle">
							<div class="faq-question__title"><?php echo esc_html( $item['question'] ); ?></div>
						</dt>
						<dd class="faq-answer">
							<div class="faq-answer__wrap">
								<div><?php echo $item['answer'] ? wpautop( wp_kses_post( $item['answer'] ) ) : '<span style="color:#999;">（回答準備中）</span>'; ?></div>
							</div>
						</dd>
					</dl>
					<?php endforeach; ?>
				</div>
				<?php endforeach; ?>
			</div>
		</div>

		<!-- その他リンク -->
		<?php get_template_part('parts/parts-otherlinks'); ?>
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

<?php
// JSON-LD: FAQPage（回答が入力済みの項目のみ出力）
$_faq_entities = [];
foreach ( $faq_sections as $_section ) {
	foreach ( $_section['items'] as $_item ) {
		if ( ! empty( $_item['answer'] ) ) {
			$_faq_entities[] = [
				'@type' => 'Question',
				'name'  => $_item['question'],
				'acceptedAnswer' => [
					'@type' => 'Answer',
					'text'  => $_item['answer'],
				],
			];
		}
	}
}
if ( ! empty( $_faq_entities ) ) {
	$faq_jsonld = [
		'@context'   => 'https://schema.org',
		'@type'      => 'FAQPage',
		'url'        => get_permalink(),
		'name'       => 'よくあるご質問 | 長野の花屋 ヌボー生花店',
		'mainEntity' => $_faq_entities,
	];
	echo '<script type="application/ld+json">' . wp_json_encode( $faq_jsonld, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT ) . '</script>' . "\n";
}
?>

<?php get_footer(); ?>