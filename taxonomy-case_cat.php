<?php get_header(); ?>

<!-- Remodal CSS & JS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remodal/1.0.5/remodal.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remodal/1.0.5/remodal-default-theme.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/remodal/1.0.5/remodal.min.js"></script>

<main id="page" class="case-list case-list-detail">
	<div class="page-header">
		<div class="links">
			<a href="<?php echo home_url('/'); ?>faq" class="is-active">事例紹介</a>
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
				<a href="" class="serch-detail" data-remodal-target="modal">
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
			<form method="get" action="<?php echo home_url(); ?>">
				<h2>サービスから探す <span class="required">※選択必須</span></h2>
				<div class="service-radio-list">
					<?php
					$case_terms = get_terms([
						'taxonomy'   => 'case_cat',
						'hide_empty' => false,
						'orderby'    => 'term_order',
					]);

					if (!empty($case_terms) && !is_wp_error($case_terms)) :
						foreach ($case_terms as $index => $case_term) :
							$input_id = 'case_cat_' . $index;
							?>
							<input class="visually-hidden" type="radio" name="case_cat" id="<?php echo esc_attr($input_id); ?>" value="<?php echo esc_attr($case_term->slug); ?>">
							<label for="<?php echo esc_attr($input_id); ?>"><?php echo esc_html($case_term->name); ?></label>
							<?php
						endforeach;
					endif;
					?>
				</div>

				<div class="search-category">
					<h2>カテゴリから探す</h2>
					<ul class="category-link-list">
						<?php
						foreach ($case_terms as $cat) :
						?>
							<li>
								<a href="<?php echo esc_url(get_term_link($cat)); ?>">
									<?php echo esc_html($cat->name); ?>
								</a>
							</li>
						<?php endforeach; ?>
					</ul>
				</div>

				<input type="hidden" name="post_type" value="case">
				<button type="submit" class="submit-button">
					詳細検索
					<img src="<?php echo get_template_directory_uri(); ?>/img/page/case_icon-search.svg" alt="">
				</button>
			</form>
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
						<div class="pagination en"><?php wp_pagenavi(); ?></div>
					<?php endif; ?>
				<?php else : ?>
					<p class="no_article">記事はまだありません</p>
				<?php endif; ?>
			</div>
		</div>
	</div>
</main>

<?php get_footer(); ?>
