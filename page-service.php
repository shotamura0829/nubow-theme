<?php get_header(); ?>

<!-- メインコンテンツ -->
<main id="page" class="service-list">
	<div class="page-header">
		<div class="links">
			<a href="<?php echo home_url('/'); ?>service" class="is-active"><?php the_title(); ?></a>
			<a href="<?php echo home_url('/'); ?>faq">よくあるご質問</a>
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
					<li><a href="#service01">御祝い花束</a></li>
					<li><a href="#service02">御祝いアレンジメント花</a></li>
					<li><a href="#service03">御祝い胡蝶蘭</a></li>
					<li><a href="#service04">御祝い観葉植物</a></li>
					<li><a href="#service05">御祝いスタンド花</a></li>
					<li><a href="#service06">お悔やみ・お供え花</a></li>
					<li><a href="#service07">葬儀スタンド花</a></li>
				</ul>
			</div>
			<div id="sidebar-placeholder" style="display: none;"></div>
			<div class="service-main-content">
				<?php
				$service_boxes = [
					'service01' => ['slug' => 'celebration-bouquet',     'h3' => '御祝い花束',     'purpose' => '送別 | 退任 | 誕生日 | 記念日 | 結婚 | 出産 | 退院 | 受賞 | 叙勲 | 当選'],
					'service02' => ['slug' => 'celebration-arrangement', 'h3' => '御祝いアレンジメント花', 'purpose' => '開店 | 開業 | 移転 | 改装 | 改築 | 竣工 | 落成 | 周年 | 上場 | 就任 | 昇給 | 栄転 | 受賞 | 叙勲 | 当選'],
					'service03' => ['slug' => 'celebration-orchid',      'h3' => '御祝い胡蝶蘭',   'purpose' => '開店 | 開業 | 移転 | 改装 | 改築 | 竣工 | 落成 | 周年 | 上場 | 就任 | 昇進・栄転'],
					'service04' => ['slug' => 'celebration-plants',      'h3' => '御祝い観葉植物', 'purpose' => '開店 | 開業 | 移転 | 改装 | 改築 | 竣工 | 落成 | 新築 | 引越'],
					'service05' => ['slug' => 'celebration-stand-flower','h3' => '御祝いスタンド花', 'purpose' => '開店 | 開業 | 移転 | 改装 | 改築 | 竣工 | 落成'],
					'service06' => ['slug' => 'funeral-flower',          'h3' => 'お悔やみ・お供え花', 'purpose' => '四十九日 | 新盆 | 初正月 | 一周忌 | 他法事全般'],
					'service07' => ['slug' => 'funeral-stand-flower',    'h3' => '葬儀スタンド花', 'purpose' => ''],
				];
				$service_detail_pages = [
					'service01' => ['img' => 'service-list_img01.jpg', 'text' => '誕生日・送別・結婚など特別な日に、旬の花材を使った上質なブーケを丁寧に制作し、全国配送にも対応します。', 'btn' => '御祝い花束について', 'url' => 'celebration-bouquet'],
					'service02' => ['img' => 'service-list_img02.jpg', 'text' => '開店・周年・昇進・結婚など多彩なシーンに映える御祝いアレンジメント花。専門スタッフが厳選した花材で、贈る方の想いを形にします。', 'btn' => '御祝いアレンジメント花について', 'url' => 'celebration-arrangement'],
					'service03' => ['img' => 'service-list_img08.jpg', 'text' => '厳選産地から仕入れる高品質な胡蝶蘭を、長野市のヌボー生花店から全国へお届け。落成・就任・受賞など格式ある御祝いに最適な豪華な逸品です。', 'btn' => '御祝い胡蝶蘭について', 'url' => 'celebration-orchid'],
					'service04' => ['img' => 'service-list_img03.jpg', 'text' => '緑の癒しを贈る御祝い観葉植物。オフィス開設・新築・移転祝いに最適な大型鉢からコンパクトタイプまで幅広く揃え、長野市より全国配送いたします。', 'btn' => '御祝い観葉植物について', 'url' => 'celebration-plants'],
					'service05' => ['img' => 'service-list_img04.jpg', 'text' => '開店・公演・式典を華やかに彩る御祝いスタンド花。ボリューム感ある豪華なデザインを長野市から全国配送し、現地設置にも対応します。', 'btn' => '御祝いスタンド花について', 'url' => 'celebration-stand-flower'],
					'service06' => ['img' => 'service-list_img05.jpg', 'text' => '故人を偲び、ご遺族を慰めるお悔やみ・お供え花。長野市のヌボー生花店が心を込めて制作し、葬儀・法事・命日などにふさわしい花を全国へお届けします。', 'btn' => 'お悔やみ・お供え花について', 'url' => 'funeral-flower'],
					'service07' => ['img' => 'service-list_img06.jpg', 'text' => '葬儀会場を荘厳に彩る葬儀スタンド花。地域や式場の規格に合わせたデザインで、長野市から全国配送・現地設置まで一貫して対応します。', 'btn' => '葬儀スタンド花について', 'url' => 'funeral-stand-flower'],
				];
				// 各サービス詳細ページの商品リスト「1枚目」画像（テーマ直下からの相対パス）
				$service_first_product_img = [
					'celebration-bouquet'      => 'img/service/celebration-bouquet-image1.webp',
					'celebration-arrangement'  => 'img/page/celebration-arrangement/celebration-arrangement-image01.png',
					'celebration-orchid'       => 'img/page/celebration-orchid/celebration-orchid-image01.png',
					'celebration-plants'       => 'img/service/celebration-plants/celebration-plants-image01.webp',
					'celebration-stand-flower' => 'img/page/celebration-stand-flower/celebration-stand-flower-image01.webp',
					'funeral-flower'           => 'img/page/funeral-flower/funeral-flower-image01.webp',
					'funeral-stand-flower'     => 'img/page/funeral-stand-flower/sougi_stand01.webp',
				];
				foreach ( $service_boxes as $box_id => $box ) :
					// 子ページ（service/celebration-orchid 等）または単体スラッグで取得
					$page = get_page_by_path( 'service/' . $box['slug'] ) ?: get_page_by_path( $box['slug'] );
					$catch = ( $page && $page->ID ) ? get_field( 'catch_text', $page->ID ) : '';
					$detail = $service_detail_pages[ $box_id ];
					// 一覧の画像：詳細ページの1枚目商品画像があればそれを使用、なければ従来の service-list 画像
					$slug = $detail['url'];
				$_raw_img = $service_first_product_img[ $slug ] ?? null;
				if ( $_raw_img ) {
					$list_img_src = get_template_directory_uri() . '/' . $_raw_img;
				} else {
					$list_img_src = get_template_directory_uri() . '/img/page/' . $detail['img'];
				}
				?>
				<!-- <?php echo esc_html( $box['h3'] ); ?> -->
				<div class="box" id="<?php echo esc_attr( $box_id ); ?>" name="<?php echo esc_attr( $box_id ); ?>">
					<h3><?php echo esc_html( $box['h3'] ); ?></h3>
					<?php if ( $catch ) : ?><p><?php echo esc_html( $catch ); ?></p><?php endif; ?>
					<?php if ( $box['purpose'] ) : ?>
					<h4 class="youto">オススメ用途</h4>
					<p class="purpose"><?php echo esc_html( $box['purpose'] ); ?></p>
					<?php endif; ?>
					<div class="flex">
						<img src="<?php echo esc_url( $list_img_src ); ?>" alt="">
						<div class="text">
							<p><?php echo esc_html( $detail['text'] ); ?></p>
							<a href="<?php echo home_url('/'); ?>service/<?php echo esc_attr( $detail['url'] ); ?>" class="button"><?php echo esc_html( $detail['btn'] ); ?></a>
						</div>
					</div>
				</div>
				<?php endforeach; ?>

				<div class="faq-link pc">
					<a href="<?php echo home_url('/'); ?>faq" class="cmn-button">よくあるご質問はこちら</a>
				</div>
			</div>
		</div>
	</div>
	<div class="faq-link sp">
		<a href="<?php echo home_url('/'); ?>faq" class="cmn-button">よくあるご質問はこちら</a>
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