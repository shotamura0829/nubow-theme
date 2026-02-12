<?php get_header(); ?>

<main id="page" class="article article-detail case-detail">
	<div class="page-header">
		<div class="links">
			<a href="<?php echo home_url('/'); ?>news" class="is-active">事例紹介</a>
		</div>
		<div class="inner">
			<ul class="breadcrumbs">
				<li><a href="<?php echo home_url('/'); ?>">TOP</a></li>
				<li class="arrow">&#62;</li>
				<li><a href="<?php echo home_url('/'); ?>case-list">事例紹介</a></li>
					<?php
					$taxonomy = 'case_cat';
					$terms = get_the_terms(get_the_ID(), $taxonomy);
					if ($terms && !is_wp_error($terms)) :
						$term = $terms[0];
					?>
					<li class="arrow">&#62;</li>
					<li><a href="<?php echo get_term_link($term); ?>"><?php echo esc_html($term->name); ?>の事例一覧</a></li>
				<?php endif; ?>
				<li class="arrow">&#62;</li>
				<li>事例詳細</li>
			</ul>
		</div>
	</div>

	<div class="main-content">
		<div class="entry-header">
			<div class="info">
				<p class="date"><?php echo get_the_date('Y.m.d'); ?></p>
				<p class="tag">
					<a href="">タグ1</a>
					<a href="">タグ2</a>
				</p>
			</div>
			<h1	class="title"><?php the_title(); ?></h1>
		</div>
		<div class="article-main">
			<?php the_content(); ?>
		</div>

		<div class="link">
			<a href="<?php echo home_url('/'); ?>case-list" class="cmn-button back">事例一覧を確認する</a>
		</div>
	</div>

	<!-- その他リンク -->
	<?php get_template_part('parts/parts-otherlinks'); ?>
	<!-- その他リンク -->
</main>

<?php get_footer(); ?>
