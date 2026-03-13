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
			/* common.css の main{overflow:hidden} がドロップダウン位置計算を狂わせるため開放 */
			#page.online-shop {
				overflow: visible !important;
			}
			/* ドロップダウンを正しく位置計算させるための起点を設定 */
			#hanayoya .hy-parts {
				position: relative;
			}
			/* hanayoya内のoverflowも開放 */
			#hanayoya,
			#hanayoya .hy-frame,
			#hanayoya .hy-wrap,
			#hanayoya .hy-parts-wrap {
				overflow: visible !important;
			}
			/* hanayoya が body に追記するドロップダウンポップアップ（SP 補正） */
			@media screen and (max-width: 1199px) {
				body > div[class*="hy"],
				body > ul[class*="hy"] {
					left: 0 !important;
					right: 0 !important;
					width: 90vw !important;
					max-width: 400px !important;
					margin: 0 auto !important;
					font-size: 16px !important;
					line-height: 1.8 !important;
					z-index: 99999 !important;
					box-sizing: border-box !important;
				}
				body > div[class*="hy"] li,
				body > ul[class*="hy"] li,
				body > div[class*="hy"] [class*="item"],
				body > div[class*="hy"] [class*="option"] {
					font-size: 16px !important;
					padding: 12px 16px !important;
					line-height: 1.6 !important;
					min-height: 44px !important;
					display: flex !important;
					align-items: center !important;
				}
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
        <div id="hanayoya" class="hy-frame"></div>
		<script>
		/* hanayoya SP ドロップダウン補正（MutationObserver） */
		(function() {
			var isSP = window.innerWidth <= 1199;
			if (!isSP) return;

			function fixDropdown(el) {
				if (!el || el.nodeType !== 1) return;
				var cls = (el.className || '').toString();
				if (cls.indexOf('hy') === -1) return;

				/* 文字サイズ・パディング */
				el.style.setProperty('font-size', '16px', 'important');
				el.style.setProperty('line-height', '1.8', 'important');
				el.style.setProperty('z-index', '99999', 'important');
				el.querySelectorAll('li, [class*="item"], [class*="option"]').forEach(function(item) {
					item.style.setProperty('font-size', '16px', 'important');
					item.style.setProperty('padding', '12px 16px', 'important');
					item.style.setProperty('min-height', '44px', 'important');
					item.style.setProperty('line-height', '1.6', 'important');
				});

				/* 位置補正：ビューポート内に収める */
				setTimeout(function() {
					var rect  = el.getBoundingClientRect();
					var vw    = window.innerWidth;
					var elW   = Math.min(rect.width, vw * 0.9);
					el.style.setProperty('width', elW + 'px', 'important');
					/* 右にはみ出す場合は右端に寄せる */
					var newLeft = parseFloat(el.style.left) || rect.left;
					if (newLeft + elW > vw - 8) {
						newLeft = vw - elW - 8;
					}
					if (newLeft < 8) newLeft = 8;
					el.style.setProperty('left', newLeft + 'px', 'important');
				}, 10);
			}

			var observer = new MutationObserver(function(mutations) {
				mutations.forEach(function(m) {
					m.addedNodes.forEach(function(node) { fixDropdown(node); });
				});
			});
			document.addEventListener('DOMContentLoaded', function() {
				observer.observe(document.body, { childList: true });
			});
		})();
		</script>
		<div class="link">
			<a href="<?php echo home_url('/'); ?>" class="cmn-button back">ホームに戻る</a>
		</div>
	</div>
</main>
<!-- メインコンテンツ -->

<?php get_footer(); ?>