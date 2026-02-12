<?php
// ヌボー生花店についてページは page-aboutus.php を強制使用（テンプレート選択に依存しない）
if ( is_page( 'aboutus' ) ) {
	include( get_template_directory() . '/page-aboutus.php' );
	return;
}
get_header();
?>

<!-- メインコンテンツ -->
<main id="page">
	<div class="page-header">
		<div class="inner">
			<ul class="breadcrumbs">
				<li><a href="<?php echo home_url('/'); ?>">ホーム</a></li>
				<li class="arrow">&#62;</li>
				<li><?php the_title(); ?></li>
			</ul>
			<div class="main-title">
				<h2 class="cmn-title"><?php the_title();?></h2>
			</div>
		</div>
	</div>

	<div class="main-content">
		<?php
		if(have_posts()){
			while(have_posts()){
				the_post();
				the_content();
			}
		} ?>
	</div>
</main>
<!-- メインコンテンツ -->

<?php get_footer(); ?>