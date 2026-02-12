<?php get_header(); ?>

<!-- メインコンテンツ -->
<main id="page" class="online-shop">
	<div class="page-header">
		<div class="links">
			<a href="<?php echo home_url('/'); ?>shoplist">店舗紹介</a>
			<a href="<?php echo home_url('/'); ?>onlin-shop" class="is-active"><?php the_title(); ?></a>
		</div>
		<div class="inner">
			<ul class="breadcrumbs">
				<li><a href="<?php echo home_url('/'); ?>">ホーム</a></li>
				<li class="arrow">&#62;</li>
				<li><?php the_title(); ?></li>
			</ul>
			<div class="main-title">
				<h2 class="cmn-title"><?php the_title(); ?></h2>
			</div>
		</div>
		<script type="text/javascript">
			//message_seminar
			$(document).ready(function() {
			    $(window).on('load resize', function() {

			      var seminarArea = $('.seminar'),
			        archiev = seminarArea.find('.seminar_list ul'),
			        pic = seminarArea.find('.pic');

			      if($(window).width() > 600){
			        var picHi = pic.height();
			        archiev.css({
			          height:picHi
			        });
			      }else{
			        archiev.css({
			          height:'300px'
			        });
			      }
			    });
			});
			</script>
	</div>
	<div class="main-content">
		<script src="https://hanayoya.jp/form/common/js/lib.js"></script>
        <script src="https://nubow.co.jp/httpdocs/hanayoya/load.js" type="text/javascript"></script>
        <div id="hanayoya" class="hy-frame" style="margin-left: auto; margin-right:auto;"></div>
		<div class="link">
			<a href="<?php echo home_url('/'); ?>" class="cmn-button back">ホームに戻る</a>
		</div>
	</div>
</main>
<!-- メインコンテンツ -->

<?php get_footer(); ?>