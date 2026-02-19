<?php
/**
 * Template Name: Celebration Plants (専用)
 * Slug: celebration-plants
 */
get_header(); ?>

<!-- メインコンテンツ -->
<main id="page" class="service-list service-detail">
	<div class="page-header">
		<div class="inner">
			<ul class="breadcrumbs">
				<li><a href="<?php echo home_url('/'); ?>">ホーム</a></li>
				<li class="arrow">&#62;</li>
				<li><a href="<?php echo home_url('/'); ?>service">サービス紹介</a></li>
				<li class="arrow">&#62;</li>
				<li><?php the_title(); ?></li>
			</ul>
			<div class="main-title">
				<h2 class="cmn-title"><?php the_title(); ?></h2>
			</div>
		</div>
	</div>
	<div class="main-content">
		<div class="flex">
			<div class="sidebar" id="sidebar">
				<h3 class="pc-only"><?php the_title(); ?>に関するよくあるご質問</h3>
				<h3 class="sp-only accordion-toggle"><?php the_title(); ?>に関するよくあるご質問</h3>
				<div class="wrap">
					<div class="faqbox">
						<?php
						$faq_html = get_field('faq_html');
						if ($faq_html) :
							echo $faq_html;
						endif;
						?>
					</div>

					<div class="bottom">
						<h3>
							その他のよくある<br class="pc-only">
							<a href="<?php echo home_url('/'); ?>faq">ご質問一覧▶</a>
						</h3>
					</div>
				</div>
			</div>

			<div class="service-main-content has-sidebar">
				<!-- celebration-plants専用コンテンツ (updated) -->
				<?php
				$plants_img = get_template_directory_uri() . '/img/service/celebration-plants/';
				?>
				<h3><?php the_title(); ?></h3>
				<?php
					$catch_text = get_field('catch_text');
					if ($catch_text) :
						echo '<p class="catch">' . esc_html($catch_text) . '</p>';
					endif;
				?>
				<?php if ( $purpose_text = get_field('purpose_text') ) : ?>
					<h4 class="youto">オススメ用途</h4>
					<p class="purpose"><?php echo esc_html($purpose_text); ?></p>
				<?php endif; ?>
				<?php
				$detail_text = get_field('service_detail_text');
				if ($detail_text) :
					echo '<p class="text1">' . nl2br(esc_html($detail_text)) . '</p>';
				endif;
				?>

				<!-- 商品リスト（観葉植物6種） -->
				<div class="list item-list celebration-plants-items">
					<div class="item">
						<img src="<?php echo $plants_img; ?>celebration-plants-image01.webp" alt="フィカス・アルテシマ">
						<h5>
							<span class="name">フィカス・アルテシマ<br><span class="item-detail">尺鉢・鉢皿付</span></span>
							<span class="price">¥27,500円<span class="tax">（税込）</span></span>
						</h5>
						<div class="size">
							<p>植物 H160cm〜180cm前後　W40cm〜50cm前後</p>
							<p>立て札 H29.7cm x W13cm</p>
							<p class="note">※ 観葉植物は個体差があるため、サイズは目安となります。</p>
						</div>
					</div>
					<div class="item">
						<img src="<?php echo $plants_img; ?>celebration-plants-image02.webp" alt="シュロチク">
						<h5>
							<span class="name">シュロチク<br><span class="item-detail">尺鉢・鉢皿付</span></span>
							<span class="price">¥27,500円<span class="tax">（税込）</span></span>
						</h5>
						<div class="size">
							<p>植物 H160cm〜180cm前後　W50cm〜60cm前後</p>
							<p>立て札 H29.7cm x W13cm</p>
							<p class="note">※ 観葉植物は個体差があるため、サイズは目安となります。</p>
						</div>
					</div>
					<div class="item">
						<img src="<?php echo $plants_img; ?>celebration-plants-image03.webp" alt="ドラセナ・マッサンゲアナ">
						<h5>
							<span class="name">ドラセナ・マッサンゲアナ<br><span class="item-detail">尺鉢・鉢皿付</span></span>
							<span class="price">¥27,500円<span class="tax">（税込）</span></span>
						</h5>
						<div class="size">
							<p>植物 H150cm〜170cm前後　W30cm〜40cm前後</p>
							<p>立て札 H29.7cm x W13cm</p>
							<p class="note">※ 観葉植物は個体差があるため、サイズは目安となります。</p>
						</div>
					</div>
					<div class="item">
						<img src="<?php echo $plants_img; ?>celebration-plants-image04.webp" alt="ユッカ・エレファンティペス">
						<h5>
							<span class="name">ユッカ・エレファンティペス<br><span class="item-detail">尺鉢・鉢皿付</span></span>
							<span class="price">¥27,500円<span class="tax">（税込）</span></span>
						</h5>
						<div class="size">
							<p>植物 H150cm〜170cm前後　W30cm〜40cm前後</p>
							<p>立て札 H29.7cm x W13cm</p>
							<p class="note">※ 観葉植物は個体差があるため、サイズは目安となります。</p>
						</div>
					</div>
					<div class="item">
						<img src="<?php echo $plants_img; ?>celebration-plants-image05.webp" alt="ドラセナ・リフレクサ">
						<h5>
							<span class="name">ドラセナ・リフレクサ<br><span class="item-detail">尺鉢・鉢皿付</span></span>
							<span class="price">¥22,000円<span class="tax">（税込）</span></span>
						</h5>
						<div class="size">
							<p>植物 H150cm〜170cm前後　W40cm〜50cm前後</p>
							<p>立て札 H29.7cm x W13cm</p>
							<p class="note">※ 観葉植物は個体差があるため、サイズは目安となります。</p>
						</div>
					</div>
					<div class="item">
						<img src="<?php echo $plants_img; ?>celebration-plants-image06.webp" alt="シェフレラ・カポック">
						<h5>
							<span class="name">シェフレラ・カポック<br><span class="item-detail">尺鉢・鉢皿付</span></span>
							<span class="price">¥22,000円<span class="tax">（税込）</span></span>
						</h5>
						<div class="size">
							<p>植物 H150cm〜170cm前後　W40cm〜50cm前後</p>
							<p>立て札 H29.7cm x W13cm</p>
							<p class="note">※ 観葉植物は個体差があるため、サイズは目安となります。</p>
						</div>
					</div>
				</div>

				<!-- 価格から選ぶセクション（既存のACFコンテンツを維持） -->
				<?php if ( $kakaku_html = get_field('kakaku_html', false, false) ) : ?>
					<div class="price">
						<?php echo do_shortcode( $kakaku_html ); ?>
					</div>
				<?php endif; ?>

				<!-- Serviceセクション -->
				<div class="plants-service">
					<div class="service-header">
						<h3>Service</h3>
						<div class="service-sub">
							<span class="label">サービス</span>
							<img src="<?php echo $plants_img; ?>celebration-plants-pot.webp" alt="器付・皿鉢付き">
						</div>
					</div>
					<div class="service-body">
						<hr>
						<p>観葉植物はすべて、器付・皿鉢付きの価格となっております。</p>
					</div>
				</div>

				<!-- Green Rentalセクション -->
				<div class="plants-rental">
					<div class="rental-header">
						<h3>Green Rental</h3>
						<div class="rental-sub">
							<span class="label">植物レンタル</span>
							<img src="<?php echo $plants_img; ?>celebration-plants-rental.webp" alt="植物レンタル">
						</div>
					</div>
					<div class="rental-body">
						<hr>
						<p>ヌボー生花店では、オフィスに観葉植物をお貸しするサービスを行っております。月々3,300円（税込）から、専門スタッフによるメンテナンス付で手軽に観葉植物をお楽しみいただけます。</p>
					</div>
				</div>

				<!-- 観葉植物の特典 -->
				<div class="tokuten celebration-plants-tokuten">
					<div class="tokuten-header">
						<h3>観葉植物の特典</h3>
					</div>
					<div class="list tokuten-list">
						<div class="item">
							<img src="<?php echo $plants_img; ?>celebration-plants-sighboard.webp" alt="立て札無料">
							<h5>立て札無料</h5>
						</div>
						<div class="item">
							<img src="<?php echo $plants_img; ?>celebration-plants-book.webp" alt="観葉植物の楽しみ方冊子付き">
							<h5>観葉植物の楽しみ方冊子付き</h5>
						</div>
					</div>
				</div>

				<!-- Suiteセクション（サスティープレゼント） -->
				<div class="plants-suite">
					<div class="suite-header">
						<h3>Suite</h3>
					</div>
					<div class="suite-body">
						<div class="suite-sub">
							<span class="label">サスティープレゼント</span>
						</div>
						<hr>
						<p class="suite-main">22,000円以上の商品は、適切な水やりタイミングがわかる「サスティー」付き！</p>
						<hr class="dashed">
						<p>水やりは植物を楽しむうえで基本の「き」ですが、最も難しい作業といえます。初心者の方も「サスティー」があれば、水やりを失敗することなく、植物を楽しんでいただけます。</p>
						<div class="suite-image">
							<img src="<?php echo $plants_img; ?>sustee.png" alt="サスティー">
						</div>
					</div>
				</div>

				<div class="link">
					<a href="<?php echo home_url('/'); ?>service" class="cmn-button back">サービス一覧に戻る</a>
				</div>
			</div>
		</div>
	</div>

	<!-- その他リンク -->
	<?php get_template_part('parts/parts-otherlinks2'); ?>
	<!-- その他リンク -->
</main>
<!-- メインコンテンツ -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css">
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

<script>
jQuery(function($) {
	const sliderEl = document.querySelector('.price-slider');
	if (!sliderEl) return;

	const swiper = new Swiper(sliderEl, {
		slidesPerView: 'auto',
		centeredSlides: true,
		spaceBetween: 0,
		navigation: {
			nextEl: '.swiper-button-next',
			prevEl: '.swiper-button-prev',
		},
		on: {
			init: function () { setTimeout(updateActiveSlide, 100); },
			slideChange: updateActiveSlide,
			transitionEnd: updateActiveSlide
		}
	});

	const priceButtons = document.querySelectorAll('.price-btn');

	// ボタンクリックでスライド移動＆ボタン状態更新
	priceButtons.forEach((btn, index) => {
		btn.addEventListener('click', function () {
			swiper.slideTo(index);
			priceButtons.forEach(b => b.classList.remove('active'));
			this.classList.add('active');
		});
	});

	// スライドの拡大とボタン状態同期
	function updateActiveSlide() {
		const slides = document.querySelectorAll('.swiper-slide');
		slides.forEach(slide => slide.classList.remove('is-active'));
		const activeSlide = swiper.slides[swiper.activeIndex];
		if (activeSlide) {
			activeSlide.classList.add('is-active');
		}

		// ボタン連動（インデックスが同じならactiveに）
		priceButtons.forEach(b => b.classList.remove('active'));
		if (priceButtons[swiper.activeIndex]) {
			priceButtons[swiper.activeIndex].classList.add('active');
		}
	}
});
</script>

<?php get_footer(); ?>