<?php
/**
 * works投稿のアイキャッチ自動設定スクリプト（一時利用・実行後削除）
 * アクセス: https://dev.nubow.co.jp/wp-content/themes/nubow/set-works-thumbnails.php?run=1
 */
@ini_set( 'memory_limit', '512M' );
@ini_set( 'max_execution_time', '300' );

require_once( dirname( __FILE__ ) . '/../../../wp-load.php' );

if ( ! current_user_can( 'manage_options' ) ) {
    wp_die( '管理者でログインしてからアクセスしてください。' );
}

if ( ! isset( $_GET['run'] ) ) {
    echo '<p>実行: <a href="?run=1">?run=1</a></p>';
    exit;
}

// リアルタイム出力
if ( ob_get_level() ) { ob_end_clean(); }
header( 'Content-Type: text/html; charset=utf-8' );
header( 'X-Accel-Buffering: no' );

echo '<pre>';

$posts = get_posts( [
    'post_type'      => 'works',
    'posts_per_page' => -1,
    'post_status'    => 'publish',
    'orderby'        => 'ID',
    'order'          => 'ASC',
] );

$set_count    = 0;
$skip_count   = 0;
$no_img_count = 0;
$not_found    = 0;
$i            = 0;

foreach ( $posts as $post ) {
    $i++;
    echo "[{$i}] ID:{$post->ID} 「{$post->post_title}」\n";
    flush();

    if ( has_post_thumbnail( $post->ID ) ) {
        $skip_count++;
        echo "  → SKIP（アイキャッチ設定済み）\n\n";
        flush();
        continue;
    }

    // コンテンツ内の最初の img src を取得
    if ( ! preg_match( '/<img[^>]+src=["\']([^"\']+)["\'][^>]*>/i', $post->post_content, $m ) ) {
        $no_img_count++;
        echo "  → SKIP（本文に画像なし）\n\n";
        flush();
        continue;
    }

    $image_url = $m[1];
    $filename  = basename( parse_url( $image_url, PHP_URL_PATH ) );
    echo "  → 最初の画像: {$filename}\n";
    flush();

    // ① attachment_url_to_postid で探す（完全一致）
    $attachment_id = attachment_url_to_postid( $image_url );

    // ② devドメインに置き換えて再検索
    if ( ! $attachment_id ) {
        $dev_url       = preg_replace( '#https?://[^/]+#', home_url(), $image_url );
        $attachment_id = attachment_url_to_postid( $dev_url );
        if ( $attachment_id ) {
            echo "  → devドメインURLで発見 ID:{$attachment_id}\n";
        }
    }

    // ③ ファイル名でメディアライブラリを検索
    if ( ! $attachment_id ) {
        $found = get_posts( [
            'post_type'      => 'attachment',
            'post_status'    => 'inherit',
            'posts_per_page' => 1,
            'meta_query'     => [
                [
                    'key'     => '_wp_attached_file',
                    'value'   => $filename,
                    'compare' => 'LIKE',
                ],
            ],
        ] );
        if ( $found ) {
            $attachment_id = $found[0]->ID;
            echo "  → ファイル名検索で発見 ID:{$attachment_id}\n";
        }
    }

    if ( ! $attachment_id ) {
        $not_found++;
        echo "  → NOT FOUND（メディアライブラリに画像なし）\n  → URL: {$image_url}\n\n";
        flush();
        continue;
    }

    if ( set_post_thumbnail( $post->ID, $attachment_id ) ) {
        $set_count++;
        echo "  → OK（アイキャッチ設定: attachment ID:{$attachment_id}）\n\n";
    } else {
        echo "  → ERROR（set_post_thumbnail 失敗）\n\n";
    }
    flush();
}

echo "========================================\n";
echo "完了: {$i}件処理\n";
echo "  設定:{$set_count}件 / スキップ:{$skip_count}件 / 画像なし:{$no_img_count}件 / ライブラリ未発見:{$not_found}件\n";
echo '</pre>';
