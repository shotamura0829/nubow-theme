<?php
// テンプレート強制
add_filter( 'template_include', function( $template ) {
	$path = trim( parse_url( $_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH ), '/' );
	// トップ（/）は必ず front-page.php（パスが空またはトップの場合）
	if ( $path === '' || ( is_front_page() && $path === '' ) ) {
		$front = get_template_directory() . '/front-page.php';
		if ( file_exists( $front ) ) {
			return $front;
		}
	}
	if ( is_page( 'aboutus' ) ) {
		$custom = get_template_directory() . '/page-aboutus.php';
		if ( file_exists( $custom ) ) {
			return $custom;
		}
	}
	// お知らせ一覧（/news または /news/page/N）のみ page-news.php を強制使用
	// ※ /news/カテゴリ/スラッグ は記事詳細なので除外（single.php に任せる）
	$path_is_news = ( $path === 'news' || strpos( $path, 'news/page/' ) === 0 );
	$is_news_page = $path_is_news && ! is_front_page();
	if ( $is_news_page ) {
		$custom = get_template_directory() . '/page-news.php';
		if ( file_exists( $custom ) ) {
			return $custom;
		}
	}
	// お問い合わせ（/contact, /contact/confirm, /contact/complete）は page-contact.php を強制使用
	if ( $path === 'contact' || strpos( $path, 'contact/' ) === 0 ) {
		$custom = get_template_directory() . '/page-contact.php';
		if ( file_exists( $custom ) ) {
			return $custom;
		}
	}
	return $template;
}, 99 );

// 日本語中点（・）をカテゴリスラッグに保持する（sanitize_title で除去される問題を修正）
add_filter( 'sanitize_title', function( $title, $raw_title = '', $context = 'display' ) {
	if ( $context === 'query' || empty( $raw_title ) ) {
		return $title;
	}
	if ( mb_strpos( $raw_title, '・' ) !== false && mb_strpos( $title, '・' ) === false ) {
		$ph     = 'NAKATEN_DOT';
		$safe   = str_replace( '・', $ph, $raw_title );
		$result = sanitize_title_with_dashes( $safe, '', $context );
		return str_replace( $ph, '・', $result );
	}
	return $title;
}, 99, 3 );

// News URL: /news/カテゴリ/スラッグ 形式（本番と統一）※ deploy trigger
// お知らせページのページネーション用リライト（/news/page/2）
add_action('init', function() {
	add_rewrite_rule('^news/page/([0-9]+)/?$', 'index.php?pagename=news&paged=$matches[1]', 'top');
	// 個別記事: /news/カテゴリスラッグ/記事スラッグ（本番形式）
	add_rewrite_rule('^news/([^/]+)/([^/]+)/?$', 'index.php?name=$matches[2]', 'top');
}, 1);

// 投稿のURLを /news/カテゴリスラッグ/記事スラッグ 形式に変更（本番と同じ）
add_filter('post_link', function($permalink, $post) {
	if (!$post || $post->post_type !== 'post' || $post->post_status !== 'publish') {
		return $permalink;
	}
	$cats = get_the_category($post->ID);
	$cat_slug = 'information'; // 未分類・カテゴリなし時のフォールバック
	foreach ((array)$cats as $c) {
		if ($c->slug !== 'uncategorized') {
			$cat_slug = $c->slug;
			break;
		}
	}
	return home_url('/news/' . $cat_slug . '/' . $post->post_name);
}, 10, 2);

// aboutus サブパス（/aboutus/message 等）のリライトと style リダイレクト
add_filter( 'query_vars', function( $vars ) {
	$vars[] = 'aboutus_section';
	return $vars;
});

add_action( 'init', function() {
	$sections = array( 'message', 'company', 'staff', 'style' );
	foreach ( $sections as $section ) {
		add_rewrite_rule(
			'^aboutus/' . preg_quote( $section, '#' ) . '/?$',
			'index.php?pagename=aboutus&aboutus_section=' . $section,
			'top'
		);
	}
}, 1 );

add_action( 'template_redirect', function() {
	if ( get_query_var( 'aboutus_section' ) === 'style' ) {
		wp_redirect( home_url( '/aboutus/message' ), 301 );
		exit;
	}
}, 5 );

add_action( 'wp_head', function() {
	if ( is_page( 'aboutus' ) ) {
		echo '<link rel="canonical" href="' . esc_url( home_url( '/aboutus' ) ) . '" />' . "\n";
	}
}, 1 );

//インラインスタイル削除
function remove_recent_comments_style() {
    global $wp_widget_factory;
    remove_action( 'wp_head', array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style' ) );
}
add_action( 'widgets_init', 'remove_recent_comments_style' );

// WordPress4.4 レスポンシブイメージを無効化
add_filter( 'wp_calculate_image_srcset', '__return_false' );
add_filter( 'wp_calculate_image_sizes', '__return_false' );

//ディスクリプションのp削除
remove_filter('term_description','wpautop');

//抜粋のp削除
remove_filter('the_excerpt', 'wpautop');

// HTTPレスポンスの記述削除
remove_action('template_redirect', 'rest_output_link_header', 11 );

// Webサイト全体の画像をResponsive images機能の対象から外す
add_filter( 'wp_calculate_image_srcset', '__return_false' );
// 記事本文、the_content()関数が出力する画像のみ無効化する場合はこちら
// remove_filter( 'the_content', 'wp_make_content_images_responsive' );

//jpeg劣化対策
add_filter('jpeg_quality', function($arg){return 100;});

add_filter( 'wp_list_categories', 'my_list_categories', 10, 2 );
function my_list_categories( $output, $args ) {
  $output = preg_replace('/<\/a>\s*\((\d+)\)/',' ($1)</a>',$output);
  return $output;
}

// MW WP Form お問い合わせフォームのID（管理画面 フォーム一覧で編集URLの post= の値）
// add_filter( 'nubow_contact_form_key', function() { return 43; } );

// Contact Form 7の自動pタグ無効
add_filter('wpcf7_autop_or_not', 'wpcf7_autop_return_false');
function wpcf7_autop_return_false() {
  return false;
}

/* ツールバー非表示
/*---------------------------------------------------------*/
add_filter('show_admin_bar', '__return_false');

/* 記事サムネイルを有効化
/*---------------------------------------------------------*/
add_theme_support( 'post-thumbnails' );

/* 投稿画面のカテゴリー階層を正常表示
/*---------------------------------------------------------*/
function lig_wp_category_terms_checklist_no_top( $args, $post_id = null ) {
    $args['checked_ontop'] = false;
    return $args;
}
add_action( 'wp_terms_checklist_args', 'lig_wp_category_terms_checklist_no_top' );

/* get site URL
/*---------------------------------------------------------*/
function shortcode_url() {
    return get_bloginfo('url');
}
add_shortcode('url', 'shortcode_url');

/* get theme URL
/*---------------------------------------------------------*/
function shortcode_templateurl() {
    return get_template_directory_uri();
}
add_shortcode('template_url', 'shortcode_templateurl');


//トップページやカテゴリページなどのページネーションでのタグ出力
function rel_next_prev_link_tags() {
  global $paged;
  if(!is_front_page()) {
    if ( get_previous_posts_link() ){
      echo '<link rel="prev" href="'.get_pagenum_link( $paged - 1 ).'" />'.PHP_EOL;
    }
    if ( get_next_posts_link() ){
      echo '<link rel="next" href="'.get_pagenum_link( $paged + 1 ).'" />'.PHP_EOL;
    }
  }
}
add_action( 'wp_head', 'rel_next_prev_link_tags' );

// /news/カテゴリ/スラッグ のURLでは redirect_canonical アクション自体を削除（最優先で実行）
add_action( 'template_redirect', function() {
  $uri   = $_SERVER['REQUEST_URI'] ?? '';
  $path  = parse_url( $uri, PHP_URL_PATH ) ?? '';
  if ( strpos( $path, '/news/' ) === 0 && substr_count( $path, '/' ) >= 3 ) {
    remove_action( 'template_redirect', 'redirect_canonical' );
  }
}, 0 );

// 自動補完リダイレクト無効
function disable_redirect_canonical( $redirect_url ) {
  if ( is_404() ) {
    return false;
  }
  // MW WP Form の contact 系URLでは redirect_canonical を完全に無効化（スラッシュ正規化でループするため）
  $uri  = $_SERVER['REQUEST_URI'] ?? '';
  $path = trim( parse_url( $uri, PHP_URL_PATH ), '/' );
  if ( $path === 'contact' || strpos( $path, 'contact/' ) === 0 ) {
    return false;
  }
  // /news/カテゴリ/スラッグ 形式のURLはリダイレクトしない（フィルター側でも二重対策）
  $path_only = parse_url( $uri, PHP_URL_PATH ) ?? '';
  if ( strpos( $path_only, '/news/' ) === 0 && substr_count( $path_only, '/' ) >= 3 ) {
    return false;
  }
  // URL末尾スラッシュ統一（なしに揃える）: 末尾スラッシュの違いだけでリダイレクトしようとする場合はキャンセル
  if ( $redirect_url ) {
    $current = home_url( $_SERVER['REQUEST_URI'] ?? '' );
    $curr_trimmed = untrailingslashit( $current );
    $redir_trimmed = untrailingslashit( $redirect_url );
    if ( $curr_trimmed === $redir_trimmed ) {
      return false;
    }
  }
  return $redirect_url;
}
add_filter( 'redirect_canonical', 'disable_redirect_canonical', PHP_INT_MAX );

// URL末尾スラッシュを統一（全てなしに）
add_filter( 'user_trailingslashit', function( $url ) {
  return untrailingslashit( $url );
}, 10, 1 );

add_action( 'template_redirect', function() {
  $uri  = $_SERVER['REQUEST_URI'] ?? '';
  $path = parse_url( $uri, PHP_URL_PATH );
  $query = parse_url( $uri, PHP_URL_QUERY );
  if ( ! $path || $path === '/' ) return;
  // /contact, /contact/confirm, /contact/complete は MW WP Form のURL。末尾スラッシュリダイレクトでループするためスキップ
  $path_trimmed = trim( $path, '/' );
  if ( $path_trimmed === 'contact' || strpos( $path_trimmed, 'contact/' ) === 0 ) return;
  if ( substr( $path, -1 ) === '/' ) {
    $to = home_url( rtrim( $path, '/' ) );
    if ( $query ) $to .= '?' . $query;
    wp_redirect( $to, 301 );
    exit;
  }
}, 1 );

// ビジュアルエディタの変換を無効化
function override_mce_options( $init_array ) {
  global $allowedposttags;

  $init_array['valid_elements']          = '*[*]';
  $init_array['extended_valid_elements'] = '*[*]';
  $init_array['valid_children']          = '+a[' . implode( '|', array_keys( $allowedposttags ) ) . ']';
  $init_array['indent']                  = true;
  $init_array['wpautop']                 = false;
  $init_array['force_p_newlines']        = false;

  return $init_array;
}
add_filter( 'tiny_mce_before_init', 'override_mce_options' );

/* the_archive_title 余計な文字を削除 */
add_filter( 'get_the_archive_title', function ($title) {
    if (is_category()) {
        $title = single_cat_title('',false);
    } elseif (is_tag()) {
        $title = single_tag_title('',false);
  } elseif (is_tax()) {
      $title = single_term_title('',false);
  } elseif (is_post_type_archive() ){
    $title = post_type_archive_title('',false);
  } elseif (is_date()) {
      $title = get_the_time('Y年n月');
  } elseif (is_search()) {
      $title = '検索結果：'.esc_html( get_search_query(false) );
  } elseif (is_404()) {
      $title = '「404」ページが見つかりません';
  } else {

  }
    return $title;
});

/* アーカイブページ有効 */
function post_has_archive($args, $post_type)
{
    if ('post' == $post_type) {
        $args['rewrite'] = true; // リライトを有効にする
        $args['has_archive'] = 'news'; // 任意のスラッグ名
        $args['label'] = 'お知らせ'; // ページタイトル
    }
    return $args;
}
add_filter('register_post_type_args', 'post_has_archive', 10, 2);

// お知らせ一覧: 10件表示（他プラグインより後で適用）
add_action('pre_get_posts', function ($query) {
    if (is_admin() || !$query->is_main_query()) return;
    $page_for_posts = (int) get_option('page_for_posts');
    $is_blog = $page_for_posts && (int) $query->get('page_id') === $page_for_posts;
    $is_post_archive = $query->is_archive() && in_array($query->get('post_type'), array('', 'post'), true);
    if ($is_blog || $query->is_home() || $query->is_category() || $is_post_archive) {
        $query->set('posts_per_page', 10);
    }
}, 999);

//iframeのレスポンシブ対応
function wrap_iframe_in_div($the_content) {
  if ( is_singular() ) {
    $the_content = preg_replace('/<iframe/i', '<div class="iframe_body_wrap"><div class="iframe_body"><iframe', $the_content);
    $the_content = preg_replace('/<\/iframe>/i', '</iframe></div></div>', $the_content);
  }
  return $the_content;
}
add_filter('the_content','wrap_iframe_in_div');

// global-styles-inline-cssを無効化
function remove_global_styles_inline_css() {
    wp_dequeue_style( 'global-styles' );
}
add_action( 'wp_print_styles', 'remove_global_styles_inline_css' );

// 固定ページ内にパーツ呼び出し
function my_custom_part() {
  ob_start();
  get_template_part('parts/product-parts'); // parts/custom-part.php を読み込む
  return ob_get_clean();
}
add_shortcode('product-parts', 'my_custom_part');

// ACFのhtml入力に改行入れないようにする
add_filter('acf/format_value/type=wysiwyg', function ($value, $post_id, $field) {
  return $value; // 何も加工しない
}, 10, 3);


add_action('restrict_manage_posts', function () {
  $screen = get_current_screen();
  if (!$screen || $screen->post_type !== 'works') return; // ← 事例紹介(CPT)のスラッグに合わせる

  $taxonomies = ['works_category'];             // ← 絞り込みたいタクソノミーを追加

  foreach ($taxonomies as $tax) {
    $tax_obj = get_taxonomy($tax);
    if (!$tax_obj) continue;

    $current = isset($_GET[$tax]) ? sanitize_text_field($_GET[$tax]) : '';

    wp_dropdown_categories([
      'show_option_all' => $tax_obj->labels->all_items, // 「すべての◯◯」
      'taxonomy'        => $tax,
      'name'            => $tax,
      'orderby'         => 'name',
      'selected'        => $current,
      'hierarchical'    => true,
      'show_count'      => true,
      'hide_empty'      => false,
      'value_field'     => 'slug',            // ← slugで渡す（後段のparse_queryで扱いやすい）
    ]);
  }
});

// 2) 選択された値で実際に絞り込む
add_action('parse_query', function ($query) {
  if (!is_admin() || !$query->is_main_query()) return;

  $screen = function_exists('get_current_screen') ? get_current_screen() : null;
  // get_current_screen() は一部フックで未定義のことがあるため post_type パラメータでも判定
  $post_type = isset($_GET['post_type']) ? sanitize_text_field($_GET['post_type']) : ($screen->post_type ?? '');

  if ($post_type !== 'works') return;             // ← CPTに合わせる

  $taxonomies = ['works_category'];             // ← 上と同じ配列
  $tax_query  = [];

  foreach ($taxonomies as $tax) {
    if (!empty($_GET[$tax])) {
      $slug = sanitize_text_field($_GET[$tax]);
      $tax_query[] = [
        'taxonomy' => $tax,
        'field'    => 'slug',
        'terms'    => $slug,
      ];
    }
  }

  if (!empty($tax_query)) {
    // 既存の tax_query がある場合もマージして適用
    $existing = (array) $query->get('tax_query');
    $query->set('tax_query', array_merge($existing, $tax_query));
  }
});

// CPT UI で作成したタクソノミーを一括編集でも使えるようにする
add_action('init', function() {
  global $wp_taxonomies;

  if (isset($wp_taxonomies['works_category'])) {
    $wp_taxonomies['works_category']->show_in_quick_edit = true;
    $wp_taxonomies['works_category']->show_admin_column = true;
  }
});



// 事例カテゴリ(works_category)に「休止」チェックを追加
add_action('works_category_add_form_fields', function(){
  ?>
  <div class="form-field">
    <label for="scw_term_hidden">休止（カテゴリから探すに表示しない）</label>
    <input type="checkbox" name="scw_term_hidden" id="scw_term_hidden" value="1">
  </div>
  <?php
});
add_action('works_category_edit_form_fields', function($term){
  $val = get_term_meta($term->term_id, 'scw_term_hidden', true);
  ?>
  <tr class="form-field">
    <th scope="row"><label for="scw_term_hidden">休止（カテゴリから探すに表示しない）</label></th>
    <td><label><input type="checkbox" name="scw_term_hidden" id="scw_term_hidden" value="1" <?php checked($val, '1'); ?>> このタームを一覧から除外</label></td>
  </tr>
  <?php
});
add_action('created_works_category', function($term_id){
  update_term_meta($term_id, 'scw_term_hidden', isset($_POST['scw_term_hidden']) ? '1' : '0');
});
add_action('edited_works_category', function($term_id){
  update_term_meta($term_id, 'scw_term_hidden', isset($_POST['scw_term_hidden']) ? '1' : '0');
});








// ① 階層ターム対応のリライトルール（最優先で登録）
add_action('init', function () {
  // /works/{parent/child}/page/N/
  add_rewrite_rule(
    '^works/(.+)/page/([0-9]+)/?$',
    'index.php?works_category=$matches[1]&paged=$matches[2]',
    'top'
  );
  // 末尾スラ無しも保険
  add_rewrite_rule(
    '^works/(.+)/page/([0-9]+)$',
    'index.php?works_category=$matches[1]&paged=$matches[2]',
    'top'
  );
}, 0); // ★優先度0

// ② フォールバック：rewriteに乗らず pagename 扱いになった時の救済（階層対応）
add_filter('request', function ($vars) {
  // 既に解釈できているなら何もしない
  if ( (!empty($vars['taxonomy']) && !empty($vars['paged'])) ||
       (!empty($vars['works_category']) && !empty($vars['paged'])) ) {
    return $vars;
  }

  if (!empty($vars['pagename']) &&
      preg_match('#^works/(.+)/page/([0-9]+)/?$#', $vars['pagename'], $m)) {

    $path  = $m[1];            // 例: service_category/bouquet
    $vars['taxonomy']       = 'works_category';
    $vars['works_category'] = $path;          // 階層をそのまま渡す
    $vars['paged']          = (int)$m[2];
    unset($vars['pagename']);                 // 404回避
  }
  return $vars;
}, 10, 1);
