<?php
/**
 * Template Name: お知らせ一覧
 * 固定ページ「news」用。投稿一覧＋ページネーションを表示。
 */
get_header();

$paged = get_query_var('paged') ? (int) get_query_var('paged') : 1;
$news_query = new WP_Query([
    'post_type'      => 'post',
    'post_status'    => 'publish',
    'posts_per_page' => 10,
    'paged'          => $paged,
    'orderby'        => 'date',
    'order'          => 'DESC',
]);

$max_page = $news_query->max_num_pages;
?>

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
			<?php if ($news_query->have_posts()) : ?>
				<div class="list">
					<?php while ($news_query->have_posts()) : $news_query->the_post(); ?>
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
						<?php
					$_cats = get_the_category();
					$_cat_slug = 'information';
					foreach ( (array) $_cats as $_c ) {
						if ( $_c->slug !== 'uncategorized' ) { $_cat_slug = $_c->slug; break; }
					}
					$_post_url = home_url( '/news/' . $_cat_slug . '/' . get_post_field( 'post_name' ) );
					?>
					<a href="<?php echo esc_url( $_post_url ); ?>" class="more">詳しく見る</a>
					</div>
					<?php endwhile; ?>
				</div>

				<?php
				if ($max_page > 1) :
					// 表示設定の「投稿ページ」または固定ページ「news」のURLを取得（末尾スラッシュなし）
					$page_for_posts = (int) get_option('page_for_posts');
					if ($page_for_posts) {
						$news_url = untrailingslashit(get_permalink($page_for_posts));
					} else {
						$news_page = get_page_by_path('news');
						$news_url = $news_page ? untrailingslashit(get_permalink($news_page)) : home_url('/news');
					}
					$base = $news_url . '/page/%_%';
					$format = '%#%';
				?>
					<div class="pagination pagination-news en">
						<?php if ($paged > 1) : ?>
							<a href="<?php echo esc_url($paged > 2 ? $news_url . '/page/' . ($paged - 1) : $news_url); ?>" class="prev-button">« 前へ</a>
						<?php endif; ?>

						<?php
						$pagination = paginate_links([
							'base'      => $base,
							'format'    => $format,
							'prev_next' => false,
							'type'      => 'array',
							'mid_size'  => 1,
							'end_size'  => 1,
							'total'     => $max_page,
							'current'   => $paged,
						]);
						if ($pagination) :
							foreach ($pagination as $link) {
								echo $link;
							}
						endif;
						?>

						<?php if ($max_page > 4 && $paged < $max_page - 2) : ?>
							<span class="extend">...</span>
							<a href="<?php echo esc_url($news_url . '/page/' . $max_page); ?>"><?php echo (int) $max_page; ?></a>
						<?php endif; ?>

						<?php if ($paged < $max_page) : ?>
							<a href="<?php echo esc_url($news_url . '/page/' . ($paged + 1)); ?>" class="next-button">次へ »</a>
						<?php endif; ?>
					</div>
				<?php endif; ?>

			<?php else : ?>
				<p class="no_article">記事はまだありません</p>
			<?php endif; ?>
			<?php wp_reset_postdata(); ?>
			</div>
		</div>
	</div>

</main>

<?php get_footer(); ?>
