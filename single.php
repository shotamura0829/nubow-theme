<?php get_header(); ?>

<main id="page" class="article article-detail">
	<div class="page-header">
		<!-- <div class="links">
			<a href="<?php echo home_url('/'); ?>">ヌボー生花店について</a>
			<a href="<?php echo home_url('/'); ?>news" class="is-active">お知らせ</a>
			<a href="<?php echo home_url('/'); ?>">お問い合わせ</a>
		</div> -->
		<div class="inner">
			<ul class="breadcrumbs">
				<li><a href="<?php echo home_url('/'); ?>">TOP</a></li>
				<li class="arrow">&#62;</li>
				<li><a href="<?php echo home_url('/'); ?>news">お知らせ</a></li>
				<li class="arrow">&#62;</li>
				<li><?php the_title(); ?></li>
			</ul>
			<div class="main-title">
				<h2 class="cmn-title">お知らせ</h2>
			</div>
		</div>
	</div>

	<div class="main-content">
		<div class="entry-header">
			<div class="info">
				<p class="date"><?php echo get_the_date('Y.m.d'); ?></p>
				<p class="tag">
					<?php
					$categories = get_the_category();
					if ( $categories ) {
						foreach ( $categories as $category ) {
							echo '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '">' . esc_html( $category->name ) . '</a>';
						}
					}
					?>
				</p>
			</div>
			<h1	class="title"><?php the_title(); ?></h1>
		</div>
		<div class="article-main">
			<?php the_content(); ?>
		</div>

		<div class="link">
			<a href="<?php echo home_url('/'); ?>news" class="cmn-button back">お知らせ一覧を確認する</a>
		</div>
	</div>
</main>

<?php get_footer(); ?>
