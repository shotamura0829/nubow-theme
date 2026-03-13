<!DOCTYPE HTML>
<html lang="ja">
<head>
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-PCN85Q');</script>
<!-- End Google Tag Manager -->
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,user-scalable=1">
<meta name="format-detection" content="telephone=no">
<title><?php bloginfo('name'); wp_title('|'); ?></title>

<!-- 外部リソース事前接続（レンダリング高速化） -->
<link rel="preconnect" href="https://www.googletagmanager.com" crossorigin>
<link rel="preconnect" href="https://code.jquery.com" crossorigin>
<link rel="dns-prefetch" href="https://www.google-analytics.com">

<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/common/favicon.ico">
<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/images/common/apple-touch-icon.png" sizes="152x152">

<?php if ( is_front_page() ) : ?>
<link rel="preload" as="image" href="<?php echo get_template_directory_uri(); ?>/img/top/fv01.jpg" fetchpriority="high">
<?php endif; ?>

<?php if (
	is_front_page() ||
	is_page_template( 'page-service-list-detail.php' ) ||
	is_page_template( 'page-celebration-plants.php' )
) : ?>
<link rel='stylesheet' href='<?php echo get_template_directory_uri(); ?>/css/swiper-bundle.css'>
<?php endif; ?>
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/common.css" type="text/css" />
<?php 
$_current_path = trim(parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH), '/');
if (is_front_page() || is_home() || $_current_path === ''): 
?>
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/top.css">
<?php endif; ?>
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/page.css">

<?php wp_head(); ?>
</head>

<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PCN85Q"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<header>
	<div class="inner">
		<a href="<?php echo home_url(); ?>" class="logo">
			<img src="<?php echo get_template_directory_uri(); ?>/img/common/header-logo.png" alt="ヌボー" width="270" height="115">
		</a>

		<div class="menu">
			<div class="item"><a href="<?php echo home_url('/'); ?>">ホーム</a></div>
			<div class="item"><a href="<?php echo home_url('/'); ?>aboutus" class="has-child">ヌボー生花店<br>について</a></div>
			<div class="item"><a href="<?php echo home_url('/'); ?>shop" class="has-child">店舗紹介</a></div>
			<div class="item"><a href="<?php echo home_url('/'); ?>service" class="has-child">サービス紹介</a></div>
			<div class="item"><a href="<?php echo home_url('/'); ?>works">事例紹介</a></div>
			<div class="item"><a href="<?php echo home_url('/'); ?>online-shop">オンライン<br>ショップ</a></div>
			<a href="javascript:void(0)" class="toggle-button" id="menu_button">
				<span class="line">
					<span></span><!-- -->
					<span></span><!-- -->
					<span></span><!-- -->
				</span>
				メニュー
			</a>
		</div>
	</div>
</header>

<div class="mega-menu">
	<div class="menu01 menu-box">
		<div class="inner">
			<a href="<?php echo home_url('/'); ?>aboutus">ヌボー生花店について</a>
			<a href="<?php echo home_url('/'); ?>news">お知らせ</a>
			<a href="<?php echo home_url('/'); ?>contact">お問い合わせ</a>
		</div>
	</div>
	<div class="menu02 menu-box">
		<div class="inner">
			<a href="<?php echo home_url('/'); ?>shop">店舗紹介</a>
			<a href="<?php echo home_url('/'); ?>reservation">店舗来店予約</a>
		</div>
	</div>
	<div class="menu03 menu-box">
		<div class="inner">
			<a href="<?php echo home_url('/'); ?>service">サービス紹介</a>
			<a href="<?php echo home_url('/'); ?>faq">よくあるご質問</a>
		</div>
	</div>
</div>

<div class="head_wrap" id="head_submenu">
	<div class="head">
		<a href="javascript:void(0);" class="close-button">
			<span class="line">
				<span></span><!-- -->
				<span></span><!-- -->
			</span>
			とじる
		</a>
		<div class="menu">
			<div class="link-area">
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

		<a href="<?php echo home_url(); ?>" class="menu-logo">
			<img src="<?php echo get_template_directory_uri(); ?>/img/common/sp-header_logo.png" alt="ヌボー" loading="lazy">
		</a>

		<div class="bottom-links">
			<a href="<?php echo home_url('/'); ?>reservation" class="yoyaku">
				<img src="<?php echo get_template_directory_uri(); ?>/img/common/sp-header_icon-yoyaku.png" alt="" loading="lazy">店舗予約
			</a>
			<a href="<?php echo home_url('/'); ?>contact" class="contact">
				<img src="<?php echo get_template_directory_uri(); ?>/img/common/sp-header_icon-mail.png" alt="" loading="lazy">お問い合わせ
			</a>
		</div>
		</div>
	</div>
</div>