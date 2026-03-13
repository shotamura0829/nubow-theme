<?php get_header(); ?>

<!-- メインコンテンツ -->
<main id="page" class="online-shop">
	<div class="page-header">
		<div class="links">
			<a href="<?php echo home_url('/'); ?>onlin-shop" class="is-active"><?php the_title(); ?></a>
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
		<div class="list">
			<div class="box">
				<h3>ヌボー生花店公式オンラインストア</h3>
				<a href="https://nubow.jp/" target="_blank">
					<img src="<?php echo get_template_directory_uri(); ?>/img/page/online-shop_img01.png" alt="個人の方はこちら">
					<span>個人の方はこちら</span>
				</a>
			</div>
			<div class="box">
				<h3>ヌボー生花店法人様用オンラインストア</h3>
				<a href="https://www.nubow.shop/" target="_blank">
					<img src="<?php echo get_template_directory_uri(); ?>/img/page/online-shop_img02.png" alt="法人の方はこちら">
					<span>法人の方はこちら</span>
				</a>
			</div>
		</div>
		<div class="link">
			<a href="<?php echo home_url('/'); ?>" class="cmn-button back">ホームに戻る</a>
		</div>
	</div>
</main>
<!-- メインコンテンツ -->

<?php get_footer(); ?>