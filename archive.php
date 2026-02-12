<?php get_header(); ?>

<main id="page" class="article article-list">
	<div class="page-header">
		<div class="links">
			<a href="<?php echo home_url('/'); ?>">ヌボー生花店について</a>
			<a href="<?php echo home_url('/'); ?>news" class="is-active">お知らせ</a>
			<a href="<?php echo home_url('/'); ?>">お問い合わせ</a>
		</div>
		<div class="inner">
			<ul class="breadcrumbs">
				<li><a href="<?php echo home_url('/'); ?>">ホーム</a></li>
				<li class="arrow">&#62;</li>
				<li><a href="<?php echo home_url('/'); ?>news">お知らせ</a></li>
			</ul>
			<div class="main-title">
				<h2 class="cmn-title">お知らせ</h2>
			</div>
		</div>
	</div>

	<div class="main-content">
		<div class="article-wrap">
			<div class="article-main">
			<?php if (have_posts()) : ?>
				<div class="list">
					<?php while (have_posts()) : the_post(); ?>
					<div class="item">
						<div class="article-title">
							<p class="date en"><?php echo get_the_date('Y.m.d'); ?></p>
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
						<p class="content"><?php the_title(); ?></p>
						<a href="<?php the_permalink(); ?>" class="more">詳しく見る</a>
					</div>
					<?php endwhile; ?>
				</div>

				<?php if (function_exists('wp_pagenavi')) : ?>
					<?php
					global $wp_query;
					$max_page = $wp_query->max_num_pages;
					$current_page = max(1, get_query_var('paged'));
					$range = 2;
					$show_last_page_threshold = $max_page - $range;
					?>
					<div class="pagination en">
						<?php if ($prev_link = get_previous_posts_link('前へ')) : ?>
							<a href="<?php echo get_pagenum_link($current_page - 1); ?>" class="prev-button"><?php echo strip_tags($prev_link); ?></a>
						<?php endif; ?>

						<?php wp_pagenavi(); ?>

						<?php if ($max_page > 1 && $current_page < $show_last_page_threshold) : ?>
							<span class="extend">...</span>
							<a href="<?php echo get_pagenum_link($max_page); ?>" class="last-page"><?php echo $max_page; ?></a>
						<?php endif; ?>

						<?php if ($next_link = get_next_posts_link('次へ')) : ?>
							<a href="<?php echo get_pagenum_link($current_page + 1); ?>" class="next-button"><?php echo strip_tags($next_link); ?></a>
						<?php endif; ?>
					</div>
				<?php endif; ?>

			<?php else : ?>
				<p class="no_article">記事はまだありません</p>
			<?php endif; ?>
			</div>
		</div>
	</div>

</main>

<?php get_footer(); ?>
