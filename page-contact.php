<?php
/*
Template Name: お問い合わせ
*/
get_header();
?>

<?php
// フォーム状態取得（最初に定義）
remove_filter('the_content', 'wpautop');
remove_filter('the_content', 'wptexturize');

$data = MW_WP_Form_Data::connect('mw-wp-form-43');
$flg = $data->get_view_flg();
?>

<!-- メインコンテンツ -->
<main id="page" class="contact">
	<div class="page-header">
		<div class="links">
			<a href="<?php echo home_url('/'); ?>shoplist">店舗紹介</a>
			<a href="<?php echo home_url('/'); ?>onlin-shop" class="is-active"><?php the_title(); ?></a>
		</div>
		<div class="inner">
			<ul class="breadcrumbs">
				<li><a href="<?php echo home_url('/'); ?>">ホーム</a></li>
				<li class="arrow">&#62;</li>
				<li>お問い合わせ</li>
				<?php if ( $flg === 'confirm' ) : ?>
					<li class="arrow">&#62;</li>
					<li>お問い合わせ内容のご確認</li>
				<?php elseif ( $flg === 'complete' ) : ?>
					<li class="arrow">&#62;</li>
					<li>お問い合わせ内容のご確認</li>
					<li class="arrow">&#62;</li>
					<li>お問い合わせが完了しました</li>
				<?php endif; ?>
			</ul>
			<div class="main-title">
				<h2 class="cmn-title">
					<?php if ( $flg === 'confirm' ) : ?>
						<span class="pc-only">お問い合わせ内容のご確認</span>
						<span class="sp-only">お問い合わせ</span>
					<?php elseif ( $flg === 'complete' ) : ?>
						<span class="thanks">お問い合わせが完了しました</span>
					<?php else : ?>
						お問い合わせ
					<?php endif; ?>
				</h2>
			</div>
		</div>
	</div>

	<div class="main-content">
		<!-- メッセージブロック -->
		<div class="form-message-area">
			<?php if ( $flg === 'confirm' ) : ?>
				<h3>下記、お問い合わせ内容のご確認がよろしければ、送信ボタンを押してください。</h3>
			<?php elseif ( $flg === 'complete' ) : ?>
				<h3 class="no-border">お問い合わせいただき、ありがとうございました。 内容をご確認後、担当者よりご連絡をさせていただきます。</h3>
			<?php else : ?>
				<h3>全ての項目をご入力後、よろしければ確認画面へお進みください。</h3>
			<?php endif; ?>
		</div>
		<?php
		// フォーム出力
		$form_html = do_shortcode('[mwform_formkey key="43"]');

		// 確認画面のときだけ送信ボタン直前にプライバシー文を挿入
		if ( $flg === 'confirm' ) {
			$privacy_note = '<span class="form-privacy-note">
				<a href="' . esc_url( home_url('/privacy-policy') ) . '" target="_blank" rel="noopener noreferrer">プライバシーポリシー</a>に同意いただいた上でご送信ください。
			</span>';

			// ボタンの直前に挿入（button-send クラス）
			$form_html = preg_replace(
				'/(<button[^>]*class="[^"]*button-send[^"]*"[^>]*>)/i',
				$privacy_note . '$1',
				$form_html
			);
		}

		// フォーム表示
		echo $form_html;
		?>

		<?php if ( $flg === 'complete' ) : ?>
			<div class="link">
				<a href="<?php echo home_url('/'); ?>" class="cmn-button back home">ホームに戻る</a>
			</div>
		<?php endif; ?>
	</div>
</main>

<script>
document.addEventListener('DOMContentLoaded', function () {
	const telSpans = document.querySelectorAll('.mwform-tel-field');

	telSpans.forEach(function(span) {
		const childNodes = Array.from(span.childNodes);
		childNodes.forEach(function(node) {
			if (node.nodeType === Node.TEXT_NODE && node.textContent.trim() === '-') {
				span.removeChild(node);
			}
		});
	});
});
</script>

<?php get_footer(); ?>
