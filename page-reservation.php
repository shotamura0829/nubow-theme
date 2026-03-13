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
				<h1 class="cmn-title"><?php the_title(); ?></h1>
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

			/* ===== プルダウンのズレ修正 ===== */
			/* ドロップダウンを正しく位置計算させるための起点を設定 */
			#hanayoya .hy-parts {
				position: relative;
			}
			/* 親要素がoverflowでクリッピングしないよう開放 */
			#hanayoya,
			#hanayoya .hy-frame,
			#hanayoya .hy-wrap,
			#hanayoya .hy-parts-wrap {
				overflow: visible !important;
			}

			/* ===== PC（1200px以上）：視認性向上 ===== */
			#hanayoya.hy-frame {
				font-size: 15px;
				line-height: 1.6;
			}
			/* フォームフィールドのラベル・入力エリアを大きく */
			#hanayoya .hy-parts-wrap {
				font-size: 15px;
				padding: 6px 0;
			}
			#hanayoya .hy-select,
			#hanayoya .hy-reservedate,
			#hanayoya .hy-input {
				font-size: 15px !important;
				padding: 6px 8px !important;
				height: auto !important;
				min-height: 36px;
			}
			/* 注記テキスト */
			#hanayoya .hy-info02 {
				font-size: 13px;
				line-height: 1.6;
			}

			/* ===== 次へボタン：PC でも目立つデザインに ===== */
			#hanayoya button {
				all: revert;
				cursor: pointer;
				background-color: #d1c0a5 !important;
				border: 3px solid #ccc !important;
				color: #fff !important;
				white-space: nowrap;
			}
			#hanayoya button.hy-button {
				background-color: #5C4636 !important;
				border-color: #5C4636 !important;
				color: #fff !important;
				font-size: 16px !important;
				font-weight: bold !important;
				padding: 14px 32px !important;
				border-radius: 50px !important;
				min-width: 140px;
				letter-spacing: 0.05em;
				box-shadow: 0 3px 8px rgba(0,0,0,0.15);
			}
			#hanayoya button:hover {
				opacity: 1;
				background-color: #fff !important;
				color: #5C4636 !important;
				border-color: #5C4636 !important;
			}
			#hanayoya button:hover span {
				color: #5C4636 !important;
			}
			#hanayoya button:hover span:after {
				border-top-color: #5C4636 !important;
				border-right-color: #5C4636 !important;
			}
			#hanayoya button span {
				display: flex;
				align-items: center;
				justify-content: center;
				color: #fff;
				gap: 6px;
			}
			#hanayoya button span:after {
				content: '';
				width: 8px;
				height: 8px;
				border-top: 2px solid currentColor;
				border-right: 2px solid currentColor;
				transform: rotate(45deg);
				display: inline-block;
				box-sizing: content-box;
			}
			/* CTAエリアをボタンが右に固まらないよう余裕を持たせる */
			#hanayoya .hy-ctrl {
				display: flex;
				flex-direction: column;
				align-items: center;
				gap: 10px;
				padding: 8px 12px;
				text-align: center;
			}

			/* ===== SP（〜1199px）：レイアウト崩れのみ修正 ===== */
			@media screen and (max-width: 1199px) {
				#hanayoya img.hy-logo {
					max-width: 120px !important;
					width: auto !important;
					height: auto !important;
				}
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
					font-size: 15px !important;
					padding: 14px 0 !important;
					border-radius: 50px !important;
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