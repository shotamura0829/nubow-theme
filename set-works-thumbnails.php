<?php
/**
 * works投稿のアイキャッチ自動設定スクリプト（一時利用・実行後削除）
 * アクセス: https://dev.nubow.co.jp/wp-content/themes/nubow/set-works-thumbnails.php
 */
require_once( dirname( __FILE__ ) . '/../../../wp-load.php' );

// 管理者のみ実行
if ( ! current_user_can( 'manage_options' ) ) {
    wp_die( '管理者でログインしてからアクセスしてください。' );
}

if ( ! isset( $_GET['run'] ) ) {
    echo '<p>実行するには <a href="?run=1">?run=1</a> をつけてアクセスしてください。</p>';
    exit;
}

echo '<pre>';

$posts = get_posts( [
    'post_type'      => 'works',
    'posts_per_page' => -1,
    'post_status'    => 'publish',
] );

$set_count     = 0;
$skip_count    = 0;
$no_img_count  = 0;
$error_count   = 0;

foreach ( $posts as $post ) {
    if ( has_post_thumbnail( $post->ID ) ) {
        $skip_count++;
        echo "[SKIP] ID:{$post->ID} 「{$post->post_title}」 → すでにアイキャッチあり\n";
        continue;
    }

    // コンテンツ内の最初の img src を取得
    if ( ! preg_match( '/<img[^>]+src=["\']([^"\']+)["\'][^>]*>/i', $post->post_content, $m ) ) {
        $no_img_count++;
        echo "[NO IMG] ID:{$post->ID} 「{$post->post_title}」 → 本文に画像なし\n";
        continue;
    }

    $image_url = $m[1];

    // すでにメディアライブラリに登録済みか確認
    $attachment_id = attachment_url_to_postid( $image_url );

    if ( ! $attachment_id ) {
        $tmp = download_url( $image_url );
        if ( is_wp_error( $tmp ) ) {
            $error_count++;
            echo "[ERROR] ID:{$post->ID} ダウンロード失敗: " . $tmp->get_error_message() . "\n";
            continue;
        }
        $file = [
            'name'     => basename( parse_url( $image_url, PHP_URL_PATH ) ),
            'tmp_name' => $tmp,
        ];
        $attachment_id = media_handle_sideload( $file, $post->ID );
        if ( is_wp_error( $attachment_id ) ) {
            $error_count++;
            echo "[ERROR] ID:{$post->ID} サイドロード失敗: " . $attachment_id->get_error_message() . "\n";
            @unlink( $tmp );
            continue;
        }
    }

    if ( set_post_thumbnail( $post->ID, $attachment_id ) ) {
        $set_count++;
        echo "[OK] ID:{$post->ID} 「{$post->post_title}」 → {$image_url}\n";
    } else {
        $error_count++;
        echo "[ERROR] ID:{$post->ID} set_post_thumbnail 失敗\n";
    }
}

echo "\n========================================\n";
echo "完了: {$set_count}件設定 / {$skip_count}件スキップ(既存) / {$no_img_count}件画像なし / {$error_count}件エラー\n";
echo '</pre>';
