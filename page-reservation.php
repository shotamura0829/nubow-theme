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
			/* hanayoya内のoverflowを開放（ドロップダウンがクリッピングされないよう） */
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
		/* hanayoya SP ドロップダウン補正 v3 */
		(function() {
			if (window.innerWidth > 1199) return;

			/* クリックされた hanayoya 内要素を記録 */
			var lastHyClick = null;
			document.addEventListener('click', function(e) {
				var t = e.target;
				while (t && t !== document.body) {
					if (t.id === 'hanayoya') { lastHyClick = e.target; break; }
					t = t.parentElement;
				}
			}, true);

			/* ドロップダウン要素かどうか判定（class に依存しない） */
			function looksLikeDropdown(el) {
				if (!el || el.nodeType !== 1) return false;
				/* class に "hy" が含まれる */
				var cls = (el.className || '').toString();
				if (cls.indexOf('hy') !== -1) return true;
				/* または body 直下に追加されたリスト・div */
				if (el.parentElement === document.body) {
					var tag = el.tagName.toLowerCase();
					if (tag === 'ul' || tag === 'ol') return true;
					if (tag === 'div' && el.children.length > 0) return true;
				}
				return false;
			}

			function applyStyles(el) {
				/* コンテナ */
				el.style.setProperty('font-size', '16px', 'important');
				el.style.setProperty('line-height', '1.8', 'important');
				el.style.setProperty('z-index', '99999', 'important');
				el.style.setProperty('box-sizing', 'border-box', 'important');
				el.style.setProperty('border-radius', '8px', 'important');
				el.style.setProperty('box-shadow', '0 4px 16px rgba(0,0,0,.2)', 'important');
				el.style.setProperty('background', '#fff', 'important');
				el.style.setProperty('max-height', '50vh', 'important');
				el.style.setProperty('overflow-y', 'auto', 'important');
				/* 項目 */
				el.querySelectorAll('li, span, div').forEach(function(c) {
					if (c === el) return;
					c.style.setProperty('font-size', '16px', 'important');
					c.style.setProperty('padding', '11px 16px', 'important');
					c.style.setProperty('min-height', '44px', 'important');
					c.style.setProperty('line-height', '1.5', 'important');
					c.style.setProperty('display', 'flex', 'important');
					c.style.setProperty('align-items', 'center', 'important');
					c.style.setProperty('box-sizing', 'border-box', 'important');
				});
			}

			function reposition(el) {
				var vw = window.innerWidth;
				/* 基準要素: クリックされた要素 or hanayoya 内の最初のフォーム部品 */
				var ref = lastHyClick
					|| document.querySelector('#hanayoya select')
					|| document.querySelector('#hanayoya input')
					|| document.getElementById('hanayoya');
				if (!ref) return;

				var r = ref.getBoundingClientRect();
				var dropW = Math.min(Math.max(r.width || 280, 240), vw - 16);
				var left  = r.left;
				if (left + dropW > vw - 8) left = vw - dropW - 8;
				if (left < 8) left = 8;

				/*
				 * position:fixed を使う → ビューポート相対なので
				 * padding-top / scroll / offsetParent の影響を一切受けない
				 */
				el.style.setProperty('position', 'fixed', 'important');
				el.style.setProperty('top',   (r.bottom + 4) + 'px', 'important');
				el.style.setProperty('left',  left + 'px', 'important');
				el.style.setProperty('width', dropW + 'px', 'important');
			}

		function repositionCalendar(el) {
			/* 子要素に適用したドロップダウン用スタイルをリセット */
			el.querySelectorAll('li, span, div, td, th').forEach(function(c) {
				if (c === el) return;
				['font-size','padding','min-height','line-height','display','align-items','box-sizing'].forEach(function(p) {
					c.style.removeProperty(p);
				});
			});
			function setCalPos() {
				var vw  = window.innerWidth;
				var calW = Math.min(vw - 16, 400);
				var leftPx = Math.round((vw - calW) / 2);
				el.style.setProperty('position',   'fixed',         'important');
				el.style.setProperty('top',        '10vh',          'important');
				el.style.setProperty('left',       leftPx + 'px',   'important');
				el.style.setProperty('transform',  'none',          'important');
				el.style.setProperty('width',      calW + 'px',     'important');
				el.style.setProperty('max-width',  '400px',         'important');
				el.style.setProperty('max-height', '80vh',          'important');
				el.style.setProperty('overflow-y', 'auto',          'important');
				el.style.setProperty('z-index',    '99999',         'important');
			}
			/* hanayoya の JS が後から上書きしても追従して再適用 */
			setCalPos();
			[50, 100, 200, 400, 800].forEach(function(ms) {
				setTimeout(setCalPos, ms);
			});
		}

		function fix(el) {
			if (!looksLikeDropdown(el)) return;
			applyStyles(el);
			/* 少し遅らせてhanayoyaのJS位置設定を上書き */
			setTimeout(function() { reposition(el); }, 30);
			/* 300ms後：hanayoyaがカレンダーを描画し終えてから子要素数で判定 */
			setTimeout(function() {
				var isCalendar = el.querySelectorAll('*').length > 20;
				if (isCalendar) {
					repositionCalendar(el);
				} else {
					reposition(el);
				}
			}, 300);
		}

			/*
			 * body の直接の子要素だけを監視（subtree:false）
			 * #hanayoya 内部のカレンダー等は触らない
			 */
			var obs = new MutationObserver(function(muts) {
				muts.forEach(function(m) {
					m.addedNodes.forEach(function(n) {
						/* body の直接の子でない場合はスキップ */
						if (!n || !n.parentElement || n.parentElement !== document.body) return;
						fix(n);
					});
				});
			});

		function startObs() {
			obs.observe(document.body, { childList: true, subtree: false });
		}
		if (document.readyState === 'loading') {
			document.addEventListener('DOMContentLoaded', startObs);
		} else {
			startObs();
		}

		/* カレンダーが #hanayoya 内に追加されたら自動スクロールで見えるようにする */
		function startCalObs() {
			var hyEl = document.getElementById('hanayoya');
			if (!hyEl) return;
			new MutationObserver(function(muts) {
				muts.forEach(function(m) {
					m.addedNodes.forEach(function(n) {
						if (n.nodeType !== 1) return;
						setTimeout(function() {
							n.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
						}, 150);
					});
				});
			}).observe(hyEl, { childList: true, subtree: true });
		}
		if (document.readyState === 'loading') {
			document.addEventListener('DOMContentLoaded', startCalObs);
		} else {
			startCalObs();
		}
	})();
	</script>
		<div class="link">
			<a href="<?php echo home_url('/'); ?>" class="cmn-button back">ホームに戻る</a>
		</div>
	</div>
</main>
<!-- メインコンテンツ -->

<?php get_footer(); ?>