<?php
define( 'ABSPATH', dirname(__FILE__) . '/' );
require_once( ABSPATH . 'wp-load.php' );

$uris  = get_option( 'permalink-manager-uris', [] );
$count = 0;

foreach ( $uris as $id => $uri ) {
	// works/ で始まり / が2つ以上 = カテゴリパスが入っている
	if ( strpos( $uri, 'works/' ) === 0 && substr_count( $uri, '/' ) >= 2 ) {
		if ( get_post_type( $id ) === 'works' ) {
			$parts        = explode( '/', $uri );
			$post_slug    = end( $parts );
			$uris[ $id ]  = 'works/' . $post_slug;
			$count++;
		}
	}
}

update_option( 'permalink-manager-uris', $uris );
echo '完了: ' . $count . ' 件更新しました。このファイルを削除してください。';
