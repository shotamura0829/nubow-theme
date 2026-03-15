<?php
/**
 * works投稿のアイキャッチ自動設定スクリプト（一時利用・実行後削除）
 * アクセス: https://nubow.co.jp/dev/wp-content/themes/nubow/set-works-thumbnails.php?run=1
 * ファイルが存在すればメディアライブラリに登録してからアイキャッチに設定する
 */
@ini_set( 'memory_limit', '512M' );
@ini_set( 'max_execution_time', '600' );

require_once( dirname( __FILE__ ) . '/../../../wp-load.php' );

if ( ! current_user_can( 'manage_options' ) ) {
    wp_die( '管理者でログインしてからアクセスしてください。' );
}

if ( ! isset( $_GET['run'] ) ) {
    echo '<p>実行: <a href="?run=1">?run=1</a></p>';
    exit;
}

require_once( ABSPATH . 'wp-admin/includes/image.php' );
require_once( ABSPATH . 'wp-admin/includes/file.php' );
require_once( ABSPATH . 'wp-admin/includes/media.php' );

if ( ob_get_level() ) { ob_end_clean(); }
header( 'Content-Type: text/html; charset=utf-8' );
header( 'X-Accel-Buffering: no' );

global $wpdb;

echo '<pre>';

// works投稿をアイキャッチなしのものに絞って全取得
$posts = $wpdb->get_results(
    "SELECT p.ID, p.post_title, p.post_content
     FROM {$wpdb->posts} p
     WHERE p.post_type = 'works'
       AND p.post_status = 'publish'
       AND NOT EXISTS (
           SELECT 1 FROM {$wpdb->postmeta} pm
           WHERE pm.post_id = p.ID
             AND pm.meta_key = '_thumbnail_id'
       )
     ORDER BY p.ID ASC"
);

$total        = count( $posts );
$set_count    = 0;
$no_img_count = 0;
$not_found    = 0;
$registered   = 0;
$i            = 0;

echo "対象件数（アイキャッチなし）: {$total}件\n\n";
flush();

foreach ( $posts as $post ) {
    $i++;
    echo "[{$i}/{$total}] ID:{$post->ID} 「{$post->post_title}」\n";
    flush();

    // コンテンツ内の最初の img src を取得
    if ( ! preg_match( '/<img[^>]+src=["\']([^"\']+)["\'][^>]*>/i', $post->post_content, $m ) ) {
        $no_img_count++;
        echo "  → SKIP（本文に画像なし）\n\n";
        flush();
        continue;
    }

    $image_url = $m[1];
    $filename  = basename( parse_url( $image_url, PHP_URL_PATH ) );
    echo "  → ファイル名: {$filename}\n";
    flush();

    // _wp_attached_file の LIKE 検索（直接SQL）
    $attachment_id = $wpdb->get_var(
        $wpdb->prepare(
            "SELECT post_id FROM {$wpdb->postmeta}
             WHERE meta_key = '_wp_attached_file'
               AND meta_value LIKE %s
             LIMIT 1",
            '%' . $wpdb->esc_like( $filename )
        )
    );

    // メディアライブラリ未登録の場合、ファイルから登録を試みる
    if ( ! $attachment_id ) {
        // uploads フォルダ内でファイルを探す
        $upload_dir = wp_upload_dir();
        $found_file = '';

        // URLのパスからuploadsディレクトリ以降を取得
        $url_path = parse_url( $image_url, PHP_URL_PATH );
        // /dev/wp-content/uploads/ or /wp-content/uploads/ に対応
        if ( preg_match( '#wp-content/uploads/(.+)$#', $url_path, $up ) ) {
            $rel_path   = $up[1];
            $found_file = trailingslashit( $upload_dir['basedir'] ) . $rel_path;
        }

        if ( $found_file && file_exists( $found_file ) ) {
            echo "  → ファイル発見: {$found_file}\n";
            echo "  → メディアライブラリに登録中...\n";
            flush();

            $filetype  = wp_check_filetype( $found_file );
            $attach    = [
                'guid'           => trailingslashit( $upload_dir['baseurl'] ) . $rel_path,
                'post_mime_type' => $filetype['type'],
                'post_title'     => sanitize_file_name( pathinfo( $found_file, PATHINFO_FILENAME ) ),
                'post_content'   => '',
                'post_status'    => 'inherit',
            ];

            $attachment_id = wp_insert_attachment( $attach, $found_file, $post->ID );

            if ( ! is_wp_error( $attachment_id ) && $attachment_id ) {
                $attach_data = wp_generate_attachment_metadata( $attachment_id, $found_file );
                wp_update_attachment_metadata( $attachment_id, $attach_data );
                $registered++;
                echo "  → メディア登録完了（ID:{$attachment_id}）\n";
            } else {
                $not_found++;
                echo "  → メディア登録失敗\n\n";
                flush();
                continue;
            }
        } else {
            $not_found++;
            echo "  → ファイル未発見（アップロードフォルダに存在しない）\n";
            echo "  → 元URL: {$image_url}\n\n";
            flush();
            continue;
        }
    }

    echo "  → メディアID:{$attachment_id} 発見\n";
    flush();

    // アイキャッチを直接postmetaに書き込み
    $result = $wpdb->replace(
        $wpdb->postmeta,
        [
            'post_id'    => $post->ID,
            'meta_key'   => '_thumbnail_id',
            'meta_value' => $attachment_id,
        ],
        [ '%d', '%s', '%d' ]
    );

    if ( $result !== false ) {
        clean_post_cache( $post->ID );
        $set_count++;
        echo "  → OK（アイキャッチ設定完了）\n\n";
    } else {
        echo "  → ERROR（DB書き込み失敗）\n\n";
    }
    flush();
}

echo "========================================\n";
echo "完了: {$total}件対象\n";
echo "  設定:{$set_count}件 / メディア新規登録:{$registered}件 / 画像なし:{$no_img_count}件 / ファイル未発見:{$not_found}件\n";
echo '</pre>';
