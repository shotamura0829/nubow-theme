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
		<style>
			/* ===== テーマCSS干渉リセット（最小限） ===== */
			#hanayoya, #hanayoya * {
				box-sizing: content-box;
			}
			#hanayoya *:before,
			#hanayoya *:after {
				box-sizing: content-box;
			}
			#hanayoya img {
				width: auto;
				height: auto;
				max-width: none;
				vertical-align: middle;
			}
			/* SP時はロゴが画面幅を超えないよう制限 */
			@media screen and (max-width: 1199px) {
				#hanayoya img.hy-logo {
					max-width: 120px !important;
					width: auto !important;
					height: auto !important;
				}
			}

			/* ===== 次へボタン：色のみサイトに合わせる ===== */
			#hanayoya button {
				all: revert;
				cursor: pointer;
				background-color: #d1c0a5 !important;
				border: 3px solid #ccc !important;
				color: #fff !important;
				white-space: nowrap;
			}
			/* サイトカラーで上書き */
			#hanayoya button.hy-button {
				background-color: #998675 !important;
				border-color: #998675 !important;
			}
			#hanayoya button:hover {
				opacity: 1;
				background-color: #fff !important;
				color: #998675 !important;
				border-color: #998675 !important;
			}
			#hanayoya button:hover span {
				color: #998675 !important;
			}
			#hanayoya button:hover span:after {
				border-top-color: #998675 !important;
				border-right-color: #998675 !important;
			}
			#hanayoya button span {
				display: flex;
				align-items: center;
				color: #fff;
			}
			#hanayoya button span:after {
				content: '';
				width: 8px;
				height: 8px;
				border-top: 2px solid currentColor;
				border-right: 2px solid currentColor;
				transform: rotate(45deg);
				display: inline-block;
				margin-left: 4px;
				box-sizing: content-box;
			}

			/* ===== SP（〜1199px）：レイアウト崩れのみ修正 ===== */
			@media screen and (max-width: 1199px) {
				/* テーマの vw ベース font-size を px に固定して崩れ防止 */
				#hanayoya.hy-frame {
					font-size: 14px !important;
					line-height: 1.4 !important;
				}
				/* 横並びを縦積みに */
				#hanayoya .hy-wrap {
					display: block !important;
				}
				#hanayoya .hy-parts-wrap {
					display: block !important;
					margin-top: 10px;
				}
				#hanayoya .hy-parts {
					display: flex !important;
					flex-wrap: nowrap;
					align-items: center;
					padding: 5px !important;
				}
				/* セレクト・入力を横幅いっぱいに */
				#hanayoya .hy-nowrap {
					flex: 1;
				}
				#hanayoya .hy-select,
				#hanayoya .hy-reservedate,
				#hanayoya .hy-input {
					font-size: 14px !important;
					width: 100% !important;
				}
				/* CTAエリアを縦積み中央寄せ */
				#hanayoya .hy-ctrl {
					display: flex !important;
					flex-direction: column;
					align-items: center;
					gap: 8px;
					text-align: center;
				}
				/* 注記テキスト：改行許容・中央寄せ */
				#hanayoya .hy-info02 {
					font-size: 12px !important;
					white-space: normal !important;
					text-align: center;
					line-height: 1.5 !important;
				}
				/* ボタンをタップしやすく */
				#hanayoya button.hy-button {
					width: 100% !important;
					font-size: 14px !important;
					padding: 12px 0 !important;
					border-radius: 18px !important;
				}
				#hanayoya button span {
					justify-content: center;
				}
			}
		</style>
		<script src="https://hanayoya.jp/form/common/js/lib.js"></script>
        <script src="/hanayoya/load.js" type="text/javascript"></script>
        <div id="hanayoya" class="hy-frame" style="margin-left: auto; margin-right:auto;"></div>
		<div class="link">
			<a href="<?php echo home_url('/'); ?>" class="cmn-button back">ホームに戻る</a>
		</div>
	</div>
</main>
<!-- メインコンテンツ -->

<?php get_footer(); ?>