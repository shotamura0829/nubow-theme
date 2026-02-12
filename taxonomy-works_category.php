<?php get_header(); ?>

<!-- Remodal CSS & JS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remodal/1.0.5/remodal.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remodal/1.0.5/remodal-default-theme.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/remodal/1.0.5/remodal.min.js"></script>

<main id="page" class="case-list case-list-detail">
	<div class="page-header">
		<div class="links">
			<a href="<?php echo home_url('/'); ?>works" class="is-active">事例紹介</a>
		</div>
		<div class="inner">
			<ul class="breadcrumbs">
				<li><a href="<?php echo home_url('/'); ?>">ホーム</a></li>
				<li class="arrow">&#62;</li>
				<li><a href="<?php echo home_url('/'); ?>works">事例紹介</a></li>
				<?php
				$current_term = get_queried_object();
				if ($current_term && !is_wp_error($current_term) && isset($current_term->name)) :
				?>
					<li class="arrow">&#62;</li>
					<li><?php echo esc_html($current_term->name); ?></li>
				<?php endif; ?>
			</ul>
			<div class="main-title">
				<h2 class="cmn-title">
					<?php
					if ($current_term && !is_wp_error($current_term) && isset($current_term->name)) {
                        echo esc_html($current_term->name);
					} else {
						post_type_archive_title();
					}
					?>
				</h2>
				<a href="javascript:void(0);" class="serch-detail" data-remodal-target="modal">
					詳細検索
					<img src="<?php echo get_template_directory_uri(); ?>/img/page/case_icon-search.svg" alt="">
				</a>
			</div>
		</div>
	</div>

	<!-- 検索モーダル -->
	<div class="remodal" data-remodal-id="modal">
		<button data-remodal-action="close" class="remodal-close">
			<img src="<?php echo get_template_directory_uri(); ?>/img/page/case_icon-close.svg" alt="">
		</button>
		<div class="modal-inner">
			<form method="get" action="<?php echo esc_url( get_post_type_archive_link('works') ); ?>">
				<h2>サービスから探す <span class="required">※選択必須</span></h2>
				<div class="service-radio-list">
					<?php
					// 親ターム（slug: service_category）を取得
					$parent = get_term_by( 'slug', 'service_category', 'works_category' );
					$parent_id = ( $parent && ! is_wp_error( $parent ) ) ? (int) $parent->term_id : 0;

					$case_terms = get_terms([
						'taxonomy'   => 'works_category',
						'parent'     => $parent_id,   // 親=service_category の直下のみ取得
						'hide_empty' => false,
						'orderby'    => 'term_order',
						'order'      => 'ASC',
					]);

					if ( ! empty( $case_terms ) && ! is_wp_error( $case_terms ) ) :
						foreach ( $case_terms as $index => $case_term ) :
							$input_id = 'works_category_' . $index; // indexでID作成
							$term_url = get_term_link( $case_term ); // ← /works_category/◯◯/ の綺麗なURL
							?>
							<input
								class="visually-hidden"
								type="radio"
								name="works_category"
								id="<?php echo esc_attr( $input_id ); ?>"
								value="<?php echo esc_attr( $case_term->slug ); ?>"
								data-url="<?php echo esc_url( $term_url ); ?>"
								<?php echo $index === 0 ? 'required' : ''; ?>><!-- グループ必須化 -->
							<label for="<?php echo esc_attr( $input_id ); ?>"><?php echo esc_html( $case_term->name ); ?></label>
							<?php
						endforeach;
					endif;
					?>
				</div>

				<div class="search-category">
					<h2>カテゴリから探す</h2>
					<ul class="category-link-list">
						<?php
						// 休止フラグの無い/0のタームだけ取得
						$all_terms = get_terms([
							'taxonomy'   => 'works_category',
							'hide_empty' => false,
							'orderby'    => 'name',
							'order'      => 'ASC',
							'meta_query' => [
								'relation' => 'OR',
								[ 'key' => 'scw_term_hidden', 'compare' => 'NOT EXISTS' ],
								[ 'key' => 'scw_term_hidden', 'value' => '0', 'compare' => '=' ],
							],
						]);

						if (!empty($all_terms) && !is_wp_error($all_terms)) :
							foreach ($all_terms as $term) : ?>
								<li>
									<a href="<?php echo esc_url(get_term_link($term)); ?>">
										<?php echo esc_html($term->name); ?>
									</a>
								</li>
							<?php endforeach;
						endif; ?>
					</ul>
				</div>


				<!-- <input type="hidden" name="post_type" value="works"> -->
				<button type="submit" class="submit-button">
					詳細検索
					<img src="<?php echo get_template_directory_uri(); ?>/img/page/case_icon-search.svg" alt="">
				</button>
			</form>

			<script>
			document.addEventListener('DOMContentLoaded', function () {
				const form = document.querySelector('.remodal .modal-inner form');
				if (!form) return;

				// 送信ボタン押下時のみ、選択されたタームのパーマリンクへ遷移
				form.addEventListener('submit', function (e) {
					const checked = form.querySelector('input[name="works_category"]:checked');
					if (checked && checked.dataset.url) {
						e.preventDefault(); // GET送信させない
						window.location.href = checked.dataset.url; // /works_category/◯◯/ へ
					}
				});
			});
			</script>
		</div>
	</div>

	<!-- 投稿一覧 -->
	<div class="main-content">
		<div class="article-wrap">
			<div class="article-main">
				<?php if (have_posts()) : ?>
					<div class="list">
						<?php while (have_posts()) : the_post(); ?>
							<div class="item">
								<div class="thumb">
									<?php if (has_post_thumbnail()) : ?>
										<?php the_post_thumbnail('medium'); ?>
									<?php else : ?>
										<img src="<?php echo get_template_directory_uri(); ?>/img/common/no-image.jpg" alt="no image">
									<?php endif; ?>
								</div>
								<div class="text">
									<p class="title"><?php the_title(); ?></p>
									<a href="<?php the_permalink(); ?>">詳細を見る</a>
								</div>
							</div>
						<?php endwhile; ?>
					</div>

					<?php if (function_exists('wp_pagenavi')) : ?>
						<?php
						global $wp_query;
						$max_page = $wp_query->max_num_pages;
						$current_page = max( 1, get_query_var('paged'), get_query_var('page') );
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
