<?php
// =====================================================================
// FAQデータ一元管理
// 回答（answer）を入力すれば HTML と JSON-LD の両方に自動反映されます
// =====================================================================
$faq_sections = [
	[
		'id'    => 'faq01',
		'title' => 'ご注文方法',
		'items' => [
			[
				'question' => '注文後の変更はできますか？',
				'answer'   => '', // ← ここに回答を入力してください
			],
			[
				'question' => 'いつまでに注文したら良いですか？',
				'answer'   => '',
			],
			[
				'question' => 'どのように注文したら良いですか？',
				'answer'   => '',
			],
		],
	],
	[
		'id'    => 'faq02',
		'title' => 'お支払方法',
		'items' => [
			[
				'question' => '支払いはどうしたら良いでしょうか？',
				'answer'   => '',
			],
			[
				'question' => '金券でも支払いは出来ますか？',
				'answer'   => '',
			],
		],
	],
	[
		'id'    => 'faq03',
		'title' => 'お届け方法',
		'items' => [
			[
				'question' => '法事のお花を贈るタイミングは？',
				'answer'   => '',
			],
			[
				'question' => '訃報の知らせをうけたら？',
				'answer'   => '',
			],
			[
				'question' => '長野市外へのお届けは出来ますか？',
				'answer'   => '',
			],
			[
				'question' => 'お届け先が不在の場合はどうなりますか？',
				'answer'   => '',
			],
			[
				'question' => '叙勲・受賞祝のタイミングは？',
				'answer'   => '',
			],
		],
	],
	[
		'id'    => 'faq04',
		'title' => 'お花を贈る時の注意点',
		'items' => [
			[
				'question' => 'ご法事花の注意点は？',
				'answer'   => '',
			],
			[
				'question' => '叙勲・受賞祝時の注意点は？',
				'answer'   => '',
			],
			[
				'question' => '出馬・当選祝時の注意点は？',
				'answer'   => '',
			],
			[
				'question' => '就任・栄転祝い時の注意点は？',
				'answer'   => '',
			],
			[
				'question' => '開店・開業・移転祝時の注意点は？',
				'answer'   => '',
			],
		],
	],
	[
		'id'    => 'faq05',
		'title' => 'その他',
		'items' => [
			[
				'question' => 'お悔やみ時の札の大きさは？',
				'answer'   => '',
			],
			[
				'question' => 'お祝いの札の大きさは？',
				'answer'   => '',
			],
			[
				'question' => 'お店はどこにありますか？',
				'answer'   => '長野市内に3店舗ございます。ヌボーエール（西和田2丁目5-25）、ヌボーアドレ（稲里町中央1-23-1）、ヌボーラルブル（南千歳1丁目22-6 長野駅ビルMIDORI長野1階）にてお買い求めいただけます。',
			],
			[
				'question' => 'お届けした商品を見ることは出来ますか？',
				'answer'   => '',
			],
			[
				'question' => '注文後の変更は出来ますか？',
				'answer'   => '',
			],
		],
	],
];

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
				<h2 class="cmn-title"><?php the_title(); ?></h2>
			</div>
		</div>
		
	</div>
	<div class="main-content">
		<div class="flex">
			<div class="sidebar" id="sidebar">
				<ul>
					<li><a href="#faq01">ご注文方法</a></li>
					<li><a href="#faq02">お支払い方法</a></li>
					<li><a href="#faq03">お届け方法</a></li>
					<li><a href="#faq04">お花を贈る時の注意点</a></li>
					<li><a href="#faq05">その他</a></li>
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
								<div><?php echo $item['answer'] ? nl2br( esc_html( $item['answer'] ) ) : '<span style="color:#999;">（回答準備中）</span>'; ?></div>
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