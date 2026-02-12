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
					<li><a href="#service08">お庭のお手入れ</a></li>
				</ul>
			</div>
			<div id="sidebar-placeholder" style="display: none;"></div>
			<div class="service-main-content">
				<!-- 御祝い花束 -->
				<div class="box" id="service01" name="service01">
					<h3>御祝い花束</h3>
					<p>想いを束ねて軽やかに贈りたいあなたへ</p>
					<h4 class="youto">オススメ用途</h4>
					<p class="purpose">送別 | 退任 | 誕生日 | 記念日 | 結婚 | 出産 | 退院 | 受賞 | 叙勲 | 当選</p>
					<div class="flex">
						<img src="<?php echo get_template_directory_uri(); ?>/img/page/service-list_img01.jpg" alt="">
						<div class="text">
							<p>
								誕生日・送別・結婚など特別な日に、旬の花材を使った上質なブーケを丁寧に制作し、全国配送にも対応します。
							</p>
							<a href="<?php echo home_url('/'); ?>service/celebration-bouquet" class="button">御祝い花束について</a>
						</div>
					</div>
				</div>

				<!-- 御祝いアレンジメント花 -->
				<div class="box" id="service02" name="service02">
					<h3>御祝いアレンジメント花</h3>
					<p>「幸せを呼ぶ」胡蝶蘭を贈りたいあなたへ</p>
					<h4 class="youto">オススメ用途</h4>
					<p class="purpose">開店 | 開業 | 移転 | 改装 | 改築 | 竣工 | 落成 | 周年 | 上場 | 就任 | 昇給 | 栄転 | 受賞 | 叙勲 | 当選</p>
					<div class="flex">
						<img src="<?php echo get_template_directory_uri(); ?>/img/page/service-list_img02.jpg" alt="">
						<div class="text">
							<p>
								開店・周年・昇進・結婚など多彩なシーンに映える御祝いアレンジメント花。専門スタッフが厳選した花材で、贈る方の想いを形にします。
							</p>
							<a href="<?php echo home_url('/'); ?>service/celebration-arrangement" class="button">御祝いアレンジメント花について</a>
						</div>
					</div>
				</div>

				<!-- 御祝い胡蝶蘭 -->
				<div class="box" id="service03" name="service04">
					<h3>御祝い胡蝶蘭</h3>
					<p>「幸せを呼ぶ」胡蝶蘭を贈りたいあなたへ</p>
					<h4 class="youto">オススメ用途</h4>
					<p class="purpose">開店 | 開業 | 移転 | 改装 | 改築 | 竣工 | 落成 | 周年 | 上場 | 就任 | 昇進・栄転</p>
					<div class="flex">
						<img src="<?php echo get_template_directory_uri(); ?>/img/page/service-list_img08.jpg" alt="">
						<div class="text">
							<p>
								厳選産地から仕入れる高品質な胡蝶蘭を、長野市のヌボー生花店から全国へお届け。落成・就任・受賞など格式ある御祝いに最適な豪華な逸品です。
							</p>
							<a href="<?php echo home_url('/'); ?>service/celebration-orchid" class="button">御祝い胡蝶蘭について</a>
						</div>
					</div>
				</div>

				<!-- 御祝い観葉植物 -->
				<div class="box" id="service04" name="service03">
					<h3>御祝い観葉植物</h3>
					<p>緑のある癒しの時間を贈りたいあなたへ</p>
					<h4 class="youto">オススメ用途</h4>
					<p class="purpose">開店 | 開業 | 移転 | 改装 | 改築 | 竣工 | 落成 | 新築 | 引越</p>
					<div class="flex">
						<img src="<?php echo get_template_directory_uri(); ?>/img/page/service-list_img03.jpg" alt="">
						<div class="text">
							<p>
								緑の癒しを贈る御祝い観葉植物。オフィス開設・新築・移転祝いに最適な大型鉢からコンパクトタイプまで幅広く揃え、長野市より全国配送いたします。
							</p>
							<a href="<?php echo home_url('/'); ?>service/celebration-plants" class="button">御祝い観葉植物について</a>
						</div>
					</div>
				</div>

				<!-- 御祝いスタンド花 -->
				<div class="box" id="service05" name="service04">
					<h3>御祝いスタンド花</h3>
					<!-- <p>緑のある癒しの時間を贈りたいあなたへ</p> -->
					<h4 class="youto">オススメ用途</h4>
					<p class="purpose">開店 | 開業 | 移転 | 改装 | 改築 | 竣工 | 落成</p>
					<div class="flex">
						<img src="<?php echo get_template_directory_uri(); ?>/img/page/service-list_img04.jpg" alt="">
						<div class="text">
							<p>
								開店・公演・式典を華やかに彩る御祝いスタンド花。ボリューム感ある豪華なデザインを長野市から全国配送し、現地設置にも対応します。
							</p>
							<a href="<?php echo home_url('/'); ?>service/celebration-stand-flower" class="button">御祝いスタンド花について</a>
						</div>
					</div>
				</div>

				<!-- お悔やみ・お供え花 -->
				<div class="box" id="service06" name="service05">
					<h3>お悔やみ・お供え花</h3>
					<p>故人を偲びたい時に、ご家族をいたわりたい時に</p>
					<h4 class="youto">オススメ用途</h4>
					<p class="purpose">四十九日 | 新盆 | 初正月 | 一周忌 | 他法事全般</p>
					<div class="flex">
						<img src="<?php echo get_template_directory_uri(); ?>/img/page/service-list_img05.jpg" alt="">
						<div class="text">
							<p>
								故人を偲び、ご遺族を慰めるお悔やみ・お供え花。長野市のヌボー生花店が心を込めて制作し、葬儀・法事・命日などにふさわしい花を全国へお届けします。
							</p>
							<a href="<?php echo home_url('/'); ?>service/funeral-flower" class="button">お悔やみ・お供え花について</a>
						</div>
					</div>
				</div>

				<!-- 葬儀スタンド花 -->
				<div class="box" id="service07" name="service06">
					<h3>葬儀スタンド花</h3>
					<div class="flex">
						<img src="<?php echo get_template_directory_uri(); ?>/img/page/service-list_img06.jpg" alt="">
						<div class="text">
							<p>
								葬儀会場を荘厳に彩る葬儀スタンド花。地域や式場の規格に合わせたデザインで、長野市から全国配送・現地設置まで一貫して対応します。
							</p>
							<a href="<?php echo home_url('/'); ?>service/funeral-stand-flower" class="button">葬儀スタンド花について</a>
						</div>
					</div>
				</div>

				<!-- お庭のお手入れ -->
				<div class="box" id="service08" name="service07">
					<h3>お庭のお手入れ</h3>
					<div class="flex">
						<img src="<?php echo get_template_directory_uri(); ?>/img/page/service-list_img07.jpg" alt="">
						<div class="text">
							<p>
								庭木剪定・消毒・伐採など、お庭の美観と健康を守るメンテナンスサービス。長野市の専門スタッフが無料見積りの上、丁寧かつ迅速に施工します。
							</p>
							<a href="<?php echo home_url('/'); ?>service/garden-maintenance" class="button">お庭のお手入れ</a>
						</div>
					</div>
				</div>

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