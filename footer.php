<a href="#" class="backtotop">
	<img src="<?php echo get_template_directory_uri(); ?>/img/common/icon-backtotop.png" alt="トップへ戻る" loading="lazy">
</a>

<footer>
	<div class="inner">
		<div class="left-box">
			<div class="top">
				<a href="<?php echo home_url('/'); ?>">
					<img src="<?php echo get_template_directory_uri(); ?>/img/common/footer_icon_home.png" width="49" height="49" loading="lazy" alt="">ホーム
				</a>
				<a href="<?php echo home_url('/'); ?>online-shop">
					<img src="<?php echo get_template_directory_uri(); ?>/img/common/footer_icon_cart.png" width="51" height="49" loading="lazy" alt="">オンラインショップ
				</a>
				<a href="<?php echo home_url('/'); ?>reservation">
					<img src="<?php echo get_template_directory_uri(); ?>/img/common/shop-icon.png" width="51" height="51" loading="lazy" alt="">店舗予約
				</a>
			</div>
			<div class="sp-menu">
				<div class="sp-menu_box">
					<a href="javascript:void(0)" class="title accordion-toggle">ヌボー生花店について</a>
					<div class="list">
						<div class="list-inner">
							<a href="<?php echo home_url('/'); ?>aboutus">ヌボー生花店について</a>
							<a href="<?php echo home_url('/'); ?>news">お知らせ</a>
							<a href="<?php echo home_url('/'); ?>contact">お問い合わせ</a>
						</div>
					</div>
				</div>
				<div class="sp-menu_box">
					<a href="javascript:void(0)" class="title accordion-toggle">店舗紹介</a>
					<div class="list">
						<div class="list-inner">
							<a href="<?php echo home_url('/'); ?>shop">店舗紹介</a>
							<a href="<?php echo home_url('/'); ?>reservation">店舗来店予約</a>
						</div>
					</div>
				</div>
				<div class="sp-menu_box">
					<a href="javascript:void(0)" class="title accordion-toggle">サービス紹介</a>
					<div class="list">
						<div class="list-inner">
							<a href="<?php echo home_url('/'); ?>service">サービス紹介</a>
							<a href="<?php echo home_url('/'); ?>faq">よくあるご質問</a>
						</div>
					</div>
				</div>
				<div class="sp-menu_box">
					<a href="<?php echo home_url('/'); ?>works" class="title">事例紹介</a>
				</div>
				<div class="sp-menu_box">
					<a href="<?php echo home_url('/'); ?>privacy-policy" class="title">プライバシーポリシー</a>
				</div>
				<div class="sp-menu_box">
					<a href="<?php echo home_url('/'); ?>sitemap" class="title">サイトマップ</a>
				</div>
			</div>
			<div class="bottom">
				<a href="<?php echo home_url('/'); ?>" class="logo"><img src="<?php echo get_template_directory_uri(); ?>/img/common/footer-logo.png" width="215" loading="lazy" alt="" class="footer-logo"></a>
				<div class="access">
					<p>〒381-0014 <br class="sp-only">長野県長野市北尾張部715-7</p>
					<ul>
						<li><a href="<?php echo home_url('/'); ?>privacy-policy">プライバシーポリシー</a></li>
						<li><a href="<?php echo home_url('/'); ?>sitemap">サイトマップ</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="right-box">
			<div class="menu">
				<div class="box">
					<p>ヌボー生花店について</p>
					<ul>
						<li><a href="<?php echo home_url('/'); ?>aboutus">ヌボー生花店について</a></li>
						<li><a href="<?php echo home_url('/'); ?>news">お知らせ</a></li>
						<li><a href="<?php echo home_url('/'); ?>contact">お問い合わせ</a></li>
					</ul>
				</div>
				<div class="box">
					<p>サービス紹介</p>
					<ul>
						<li><a href="<?php echo home_url('/'); ?>service/celebration-bouquet/">御祝い花束</a></li>
						<li><a href="<?php echo home_url('/'); ?>service/celebration-arrangement/">御祝いアレンジメント花</a></li>
						<li><a href="<?php echo home_url('/'); ?>service/celebration-orchid/">御祝い胡蝶蘭</a></li>
						<li><a href="<?php echo home_url('/'); ?>service/celebration-plants/">御祝い観葉植物</a></li>
						<li><a href="<?php echo home_url('/'); ?>service/celebration-stand-flower/">御祝いスタンド花</a></li>
						<li><a href="<?php echo home_url('/'); ?>service/funeral-flower">お悔やみ・お供え花</a></li>
						<li><a href="<?php echo home_url('/'); ?>service/funeral-stand-flower/">葬儀スタンド花</a></li>
						<li><a href="<?php echo home_url('/'); ?>faq">よくあるご質問</a></li>
					</ul>
				</div>
			</div>
			<div class="menu">
				<div class="box">
					<p>店舗紹介</p>
					<ul>
						<li><a href="<?php echo home_url('/'); ?>shop/nubow-aile">ヌボーエール</a></li>
						<li><a href="<?php echo home_url('/'); ?>shop/nubow-adorer">ヌボーアドレ</a></li>
						<li><a href="<?php echo home_url('/'); ?>shop/nubow-larbre">ヌボーラルブル</a></li>
						<li><a href="<?php echo home_url('/'); ?>reservation">店舗来店予約</a></li>
					</ul>
				</div>
				<div class="box">
					<p>事例紹介</p>
					<ul>
						<?php
						$_footer_name_map = [
							'御祝い花束'           => '花束',
							'御祝いアレンジメント花' => 'アレンジメント花',
							'御祝い胡蝶蘭'         => '胡蝶蘭',
							'御祝い観葉植物'        => '観葉植物',
							'御祝いスタンド花'      => '御祝い花・御祝いスタンド花',
							'お悔やみ・お供え花'    => 'お悔やみ・お供え花',
							'葬儀スタンド花'        => '葬儀花・葬儀スタンド花',
						];
						$_svc_parent = get_term_by( 'slug', 'service_category', 'works_category' );
						if ( $_svc_parent && ! is_wp_error( $_svc_parent ) ) :
							$_footer_terms = get_terms([
								'taxonomy'   => 'works_category',
								'parent'     => $_svc_parent->term_id,
								'hide_empty' => false,
								'orderby'    => 'term_order',
								'order'      => 'ASC',
							]);
							foreach ( $_footer_terms as $_ft ) :
								$_ft_label = $_footer_name_map[ $_ft->name ] ?? $_ft->name;
								echo '<li><a href="' . esc_url( get_term_link( $_ft ) ) . '">' . esc_html( $_ft_label ) . '</a></li>';
							endforeach;
						endif;
						?>
					</ul>
				</div>
			</div>
		</div>
	</div>
</footer>

<script>
jQuery(function($) {
	function scrollToHashTarget(hash) {
		var headerHight = $("header").outerHeight();
		var extraOffset = 20;
		var targetId = hash.replace('#', '');
		var target;

		if (targetId === '') {
			target = $('html');
		} else {
			target = $('#' + targetId);
		}

		if (target.length) {
			var position = target.offset().top - headerHight - extraOffset;
			$("html, body").animate({ scrollTop: position }, 500, "swing");
		}
	}

	// リンククリック時
	$('a[href*="#"]').click(function() {
		var currentPath = location.pathname.replace(/\/$/, '');
		var linkPath = this.pathname.replace(/\/$/, '');
		var linkHost = this.hostname;

		if (currentPath === linkPath && location.hostname === linkHost) {
			var href = $(this).attr("href");
			scrollToHashTarget(href);
			return false;
		}
	});

	// ページ読み込み時（ハッシュがある場合）
	if (location.hash) {
		setTimeout(function() {
			scrollToHashTarget(location.hash);
		}, 300); // 描画完了後に実行（遅延しないと正確に取れないことがある）
	}
});
</script>


<!-- ハンバーガー -->
<script>
jQuery(function ($) {
	// メニュー開閉ボタン
	$(".toggle-button").click(function () {
		$("#head_submenu").toggleClass("open");
		$(".menu-blur").toggleClass("open");
		$(this).toggleClass("active");
		return false;
	});

	// 閉じるボタン
	$(".close-button").click(function () {
		$("#head_submenu").removeClass("open");
		$(".menu-blur").removeClass("open");
		$(".toggle-button").removeClass("active");
		return false;
	});

	// #head_wrap 内のメニューリンククリック時にメニューを閉じる
	$("#head_wrap .menu a").click(function () {
		$("#head_submenu").removeClass("open");
		$(".menu-blur").removeClass("open");
		$(".toggle-button").removeClass("active");
	});
});
</script>
<!-- ハンバーガー -->

<script>
jQuery(function($) {
	const $menuBoxes = $('.mega-menu .menu-box');
	const $megaMenu = $('.mega-menu');

	$('a.has-child').on('click', function(e) {
		e.preventDefault();

		const index = $('a.has-child').index(this);
		const $targetBox = $menuBoxes.eq(index);

		// 同じメニューを再度クリックした場合：閉じる
		if ($targetBox.is(':visible')) {
			$targetBox.fadeOut(200, function () {
				$megaMenu.fadeOut(200);
			});
		} else {
			// 他のボックスを閉じる → .mega-menu 表示 → 対象だけ開く
			$menuBoxes.fadeOut(200);
			$megaMenu.fadeIn(200, function () {
				$targetBox.fadeIn(200);
			});
		}
	});
});
</script>


<script>
	$(document).ready(function() {
		$(".accordion-toggle").on('click',function() {
			$(this).toggleClass("is-open");
			$(this).next().stop().slideToggle("400");
		});
	});
</script>



<?php wp_footer(); ?>

</body>
</html>
