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
				<h1 class="cmn-title">お知らせ</h1>
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

				<?php
				global $wp_query;
				$max_page = $wp_query->max_num_pages;
				if ($max_page > 1) :
					$current_page = max(1, get_query_var('paged'));
				?>
					<div class="pagination pagination-news en">
						<?php if ($current_page > 1) : ?>
							<a href="<?php echo esc_url(get_pagenum_link($current_page - 1)); ?>" class="prev-button">« 前へ</a>
						<?php endif; ?>

						<?php
						$pagination = paginate_links([
							'prev_next' => false,
							'type'      => 'array',
							'mid_size'  => 1,
							'end_size'  => 1,
							'total'     => $max_page,
							'current'   => $current_page,
						]);
						if ($pagination) :
							foreach ($pagination as $link) {
								echo $link;
							}
						endif;
						?>

						<?php if ($max_page > 4 && $current_page < $max_page - 2) : ?>
							<span class="extend">...</span>
							<a href="<?php echo esc_url(get_pagenum_link($max_page)); ?>"><?php echo (int) $max_page; ?></a>
						<?php endif; ?>

						<?php if ($current_page < $max_page) : ?>
							<a href="<?php echo esc_url(get_pagenum_link($current_page + 1)); ?>" class="next-button">次へ »</a>
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
