<?php get_header();?>

<main id="page" class="notfound">
	<div class="page-header no-breadcrumbs">
		<div class="inner">
			<div class="main-title">
				<h2 class="font24">ご指定のページが見つかりません</h2>
			</div>
		</div>
	</div>

	<div class="main-content">
		<p>
			申し訳ございません。お客様がお探しのページが見つかりませんでした。<br>
			削除されたか、入力したURLが間違っている可能性がああります。<br>
			お手数ですが、上部メニューから目的のページをお探しください。
		</p>
		<div class="link">
			<a href="<?php echo home_url('/'); ?>" class="cmn-button back">ホームに戻る</a>
		</div>
	</div>
</main>

<?php get_footer();?>
