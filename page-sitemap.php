<?php get_header(); ?>

<!-- メインコンテンツ -->
<main id="page" class="sitemap">
	<div class="page-header">
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
		<div class="list">
			<div class="item">
				<h3>ヌボー生花店について</h3>
				<ul>
					<li><a href="<?php echo home_url('/'); ?>aboutus">・ヌボー生花店について</a></li>
					<li><a href="<?php echo home_url('/'); ?>news">・お知らせ</a></li>
					<li><a href="<?php echo home_url('/'); ?>contact">・お問い合わせ</a></li>
				</ul>
			</div>
			<div class="item">
				<h3>店舗紹介</h3>
				<ul>
					<li>
						<a href="<?php echo home_url('/'); ?>shop">・店舗紹介</a>
						<ul>
							<li><a href="<?php echo home_url('/'); ?>shop/nubow-aile">・ヌボーエール</a></li>
							<li><a href="<?php echo home_url('/'); ?>shop/nubow-adorer">・ヌボーアドレ</a></li>
							<li><a href="<?php echo home_url('/'); ?>shop/nubow-larbre">・ヌボーラルブル</a></li>
						</ul>
					</li>
					<li><a href="<?php echo home_url('/'); ?>reservation">・店舗来店予約</a></li>
				</ul>
			</div>
			<div class="item">
				<h3>サービス紹介</h3>
				<ul>
					<li>
						<a href="<?php echo home_url('/'); ?>service">・サービス紹介</a>
						<ul>
							<li><a href="<?php echo home_url('/'); ?>service/celebration-bouquet/">・御祝い花束</a></li>
							<li><a href="<?php echo home_url('/'); ?>service/celebration-arrangement/">・御祝いアレンジメント花</a></li>
							<li><a href="<?php echo home_url('/'); ?>service/celebration-orchid/">・御祝い胡蝶蘭</a></li>
							<li><a href="<?php echo home_url('/'); ?>service/celebration-plants/">・御祝い観葉植物</a></li>
							<li><a href="<?php echo home_url('/'); ?>service/celebration-stand-flower/">・御祝いスタンド花</a></li>
							<li><a href="<?php echo home_url('/'); ?>service/funeral-flower">・お悔やみ・お供え花</a></li>
							<li><a href="<?php echo home_url('/'); ?>service/funeral-stand-flower/">・葬儀スタンド花</a></li>
						</ul>
					</li>
					<li><a href="<?php echo home_url('/'); ?>faq">・よくあるご質問</a></li>
				</ul>
			</div>
		<div class="item">
			<h3>事例紹介</h3>
			<ul>
				<li><a href="<?php echo home_url('/'); ?>works">・事例紹介</a></li>
			</ul>
		</div>
			<div class="item">
				<h3>オンラインショップ</h3>
				<ul>
					<li><a href="<?php echo home_url('/'); ?>online-shop">・オンラインショップ</a></li>
				</ul>
			</div>
			<div class="item">
				<h3>その他</h3>
				<ul>
					<li><a href="<?php echo home_url('/'); ?>privacy-policy">・プライバシーポリシー</a></li>
					<li><a href="<?php echo home_url('/'); ?>sitemap">・サイトマップ</a></li>
				</ul>
			</div>
		</div>
		<div class="link">
			<a href="<?php echo home_url('/'); ?>" class="cmn-button back">ホームに戻る</a>
		</div>
	</div>
</main>
<!-- メインコンテンツ -->

<?php get_footer(); ?>
