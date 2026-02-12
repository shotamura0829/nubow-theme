<div class="sidebar">
	<div class="side-category">
		<h2>カテゴリー</h2>
		<ul class="category-list">
			<?php
			$terms = get_terms([
				'taxonomy' => 'news_cat', // ←カスタムタクソノミー名
				'hide_empty' => true,     // 投稿がないものを非表示にしたい場合
			]);

			if ( !empty($terms) && !is_wp_error($terms) ) {
				foreach ( $terms as $term ) {
					echo '<li><a href="' . esc_url( get_term_link( $term ) ) . '">' . esc_html( $term->name ) . '</a></li>';
				}
			}
			?>
		</ul>
	</div>
</div>
