<?php
/**
 * works投稿のアイキャッチ自動設定スクリプト（一時利用・実行後削除）
 * アクセス: https://dev.nubow.co.jp/wp-content/themes/nubow/set-works-thumbnails.php?run=1
 * バッチ処理: ?run=1&offset=0&limit=10 のように offset を増やして実行
 */
@ini_set( 'memory_limit', '512M' );
@ini_set( 'max_execution_time', '300' );

require_once( dirname( __FILE__ ) . '/../../../wp-load.php' );

if ( ! current_user_can( 'manage_options' ) ) {
    wp_die( '管理者でログインしてからアクセスしてください。' );
}

if ( ! isset( $_GET['run'] ) ) {
    echo '<p>実行: <a href="?run=1&offset=0&limit=20">?run=1&offset=0&limit=20</a></p>';
    echo '<p>エラー時は offset を増やして続きから実行できます。</p>';
    exit;
}

$offset = isset( $_GET['offset'] ) ? (int) $_GET['offset'] : 0;
$limit  = isset( $_GET['limit'] )  ? (int) $_GET['limit']  : 20;

// 出力をリアルタイム表示
if ( ob_get_level() ) { ob_end_clean(); }
header( 'Content-Type: text/html; charset=utf-8' );
header( 'X-Accel-Buffering: no' );

echo '<pre>';

$posts = get_posts( [
    'post_type'      => 'works',
    'posts_per_page' => $limit,
    'offset'         => $offset,
    'post_status'    => 'publish',
    'orderby'        => 'ID',
    'order'          => 'ASC',
] );

if ( empty( $posts ) ) {
    echo "offset:{$offset} 以降の投稿はありません。全件処理完了です。\n";
    echo '</pre>';
    exit;
}

$set_count    = 0;
$skip_count   = 0;
$no_img_count = 0;
$error_count  = 0;
$i            = $offset;

foreach ( $posts as $post ) {
    $i++;
    echo "[{$i}] ID:{$post->ID} 「{$post->post_title}」 ... ";
    flush();

    if ( has_post_thumbnail( $post->ID ) ) {
        $skip_count++;
        echo "SKIP（既存アイキャッチあり）\n";
        flush();
        continue;
    }

    // コンテンツ内の最初の img src を取得
    if ( ! preg_match( '/<img[^>]+src=["\']([^"\']+)["\'][^>]*>/i', $post->post_content, $m ) ) {
        $no_img_count++;
        echo "NO IMG（本文に画像なし）\n";
        flush();
        continue;
    }

    $image_url = $m[1];
    echo "\n  → URL: {$image_url}\n  → ";
    flush();

    // すでにメディアライブラリに登録済みか確認
    $attachment_id = attachment_url_to_postid( $image_url );

    if ( $attachment_id ) {
        echo "既存メディアID:{$attachment_id} を使用 ... ";
    } else {
        $tmp = download_url( $image_url );
        if ( is_wp_error( $tmp ) ) {
            $error_count++;
            echo "ERROR（ダウンロード失敗: " . $tmp->get_error_message() . "）\n";
            flush();
            continue;
        }
        $file = [
            'name'     => basename( parse_url( $image_url, PHP_URL_PATH ) ),
            'tmp_name' => $tmp,
        ];
        $attachment_id = media_handle_sideload( $file, $post->ID );
        if ( is_wp_error( $attachment_id ) ) {
            $error_count++;
            echo "ERROR（サイドロード失敗: " . $attachment_id->get_error_message() . "）\n";
            @unlink( $tmp );
            flush();
            continue;
        }
        echo "メディア登録 ID:{$attachment_id} ... ";
    }

    if ( set_post_thumbnail( $post->ID, $attachment_id ) ) {
        $set_count++;
        echo "OK\n";
    } else {
        $error_count++;
        echo "ERROR（set_post_thumbnail 失敗）\n";
    }
    flush();
}

echo "\n========================================\n";
echo "処理範囲: offset {$offset}〜" . ( $offset + $limit - 1 ) . "\n";
echo "設定:{$set_count}件 / スキップ:{$skip_count}件 / 画像なし:{$no_img_count}件 / エラー:{$error_count}件\n";

$next_offset = $offset + $limit;
echo "\n次のバッチ: <a href=\"?run=1&offset={$next_offset}&limit={$limit}\">?run=1&offset={$next_offset}&limit={$limit}</a>\n";
echo '</pre>';
