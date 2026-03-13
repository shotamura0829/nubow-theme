<?php get_header(); ?>

<!-- メインコンテンツ -->
<main id="top">
		<!-- fv -->
		<section class="fv">
			<div class="wrapper">
				<div class="swiper01">
			<div class="swiper-wrapper">
				<div class="swiper-slide">
					<a href="https://nubow.jp/" target="_blank" rel="noopener noreferrer">
						<img src="<?php echo get_template_directory_uri(); ?>/img/top/fv01.jpg" alt="ヌボー生花店 オンラインショップ">
					</a>
				</div>
				<div class="swiper-slide">
					<a href="<?php echo home_url('/reservation'); ?>">
						<img src="<?php echo get_template_directory_uri(); ?>/img/top/fv03.jpg" alt="店舗来店予約・事前決済">
					</a>
				</div>
				<div class="swiper-slide">
					<a href="https://nubow.jp/" target="_blank" rel="noopener noreferrer">
						<img src="<?php echo get_template_directory_uri(); ?>/img/top/fv01.jpg" alt="ヌボー生花店 オンラインショップ">
					</a>
				</div>
				<div class="swiper-slide">
					<a href="<?php echo home_url('/reservation'); ?>">
						<img src="<?php echo get_template_directory_uri(); ?>/img/top/fv03.jpg" alt="店舗来店予約・事前決済">
					</a>
				</div>
			</div>
				</div>
				<!-- ナビゲーションボタン -->
				<div class="swiper-button-prev swiper-button-prev-01"></div>
				<div class="swiper-button-next swiper-button-next-01"></div>
			</div>
		</section>
		<!-- fv -->

		<!-- NEWS -->
		<section class="news">
			<div class="inner">
				<div class="title-wrap">
					<h2 class="cmn-title">お知らせ</h2>
					<a href="<?php echo home_url('/'); ?>news" class="cmn-button">お知らせ一覧を確認する</a>
				</div>

				<div class="list">
					<?php
					$args = [
						'post_type' => 'post', // 通常の投稿
						'posts_per_page' => 2, // 表示数は任意で変更
					];
					$news_query = new WP_Query($args);
					if ($news_query->have_posts()) :
						while ($news_query->have_posts()) : $news_query->the_post();
					?>
							<div class="item">
								<div class="article-title">
									<p class="date en"><?php echo get_the_date('Y.m.d'); ?></p>
									<a href="<?php the_permalink(); ?>">詳しく見る</a>
								</div>
								<p class="content"><?php the_title(); ?></p>
								<a href="<?php the_permalink(); ?>" class="sp-button">詳しく見る</a>
							</div>
					<?php
						endwhile;
						wp_reset_postdata();
					else :
					?>
						<p>現在お知らせはありません。</p>
					<?php endif; ?>
				</div>
			</div>
		</section>
		<!-- NEWS -->


		<!-- about -->
		<section class="about">
			<div class="inner">
				<h2 class="cmn-title">ヌボー生花店について</h2>
				<div class="box">
					<p>
						創業50年の感謝と、これからの未来へ。<br>
						「ヌボー（新しい）」という名に込めた革新のDNAと、AI時代だからこそ際立つ「花と人の力」について。<br>
						普遍的な癒やしを届ける花屋として、<br>
						地域の皆様に幸福感を提供し続けるための<br>
						私たちの決意表明をぜひご覧ください。
					</p>
					<img src="<?php echo get_template_directory_uri(); ?>/img/top/about_img01.png" alt="ヌボーエール 店内">
				</div>
				<div class="link">
					<a href="<?php echo home_url('/'); ?>aboutus" class="cmn-button">ヌボー生花店について</a>
				</div>
			</div>
		</section>
		<!-- about -->

		<!-- shop -->
		<section class="shop">
			<div class="inner">
				<div class="title-wrap">
					<h2 class="cmn-title">店舗紹介</h2>
					<a href="<?php echo home_url('/'); ?>shop" class="cmn-button">各店舗の情報を確認する</a>
				</div>
				<div class="top">
					<div class="shop-box">
						<h3>ヌボーエール</h3>
						<div class="box">
							<img src="<?php echo get_template_directory_uri(); ?>/img/top/shop_img01.webp" alt="ヌボーエール 店内">
							<p>
								住所：〒381-0037<br>
								長野県長野市西和田２丁目５−２５<br>
								営業時間：9:00～18:00<br>
								定休日：不定休
							</p>
						</div>
					</div>
				</div>
				<div class="bottom">
					<div class="shop-box">
						<h3>ヌボーアドレ</h3>
						<div class="box">
							<img src="<?php echo get_template_directory_uri(); ?>/img/top/shop_img02.jpg" alt="">
							<p>
								住所：〒381-2217<br>
								長野市稲里町中央1-23-1<br>
								ツルヤ長野南店隣 <br>
								営業時間：10:00～19:00 <br>
								定休日：ツルヤ長野南店に準ずる
							</p>
						</div>
					</div>
					<div class="shop-box">
						<h3>ヌボーラルブル</h3>
						<div class="box">
							<img src="<?php echo get_template_directory_uri(); ?>/img/top/shop_img03.jpg" alt="">
							<p>
								住所：〒380-0823<br>
								長野県長野市南千歳1丁目<br>
								22-6 長野駅ビルMIDORI長野1階<br> 
								営業時間：10:00～20:00 <br>
								定休日：長野駅ビルMIDORI長野店に準ずる
							</p>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- shop -->

		<!-- service -->
		<section class="service">
			<div class="inner">
				<div class="title-wrap">
					<h2 class="cmn-title">サービス紹介</h2>
					<a href="<?php echo home_url('/'); ?>service" class="cmn-button">サービス一覧を確認する</a>
				</div>

				<p>
					誕生日・記念日・冠婚葬祭。様々な節目の場面で登場するお花。<br>
					そのシーンをより感動的な場面にするお手伝い、それがヌボー生花店の役目です。
				</p>

				<div class="list">
					<a href="<?php echo home_url('/'); ?>service/celebration-bouquet/" class="item">
						<img src="<?php echo get_template_directory_uri(); ?>/img/service/celebration-bouquet-image1.webp" alt="御祝い花束">
						<p>御祝い花束</p>
					</a>
					<a href="<?php echo home_url('/'); ?>service/celebration-arrangement/" class="item">
						<img src="<?php echo get_template_directory_uri(); ?>/img/page/celebration-arrangement/celebration-arrangement-image01.png" alt="御祝いアレンジメント花">
						<p>御祝い<br>アレンジメント花</p>
					</a>
					<a href="<?php echo home_url('/'); ?>service/celebration-orchid/" class="item">
						<img src="<?php echo get_template_directory_uri(); ?>/img/page/celebration-orchid/celebration-orchid-image01.png" alt="御祝い胡蝶蘭">
						<p>御祝い胡蝶蘭</p>
					</a>
					<a href="<?php echo home_url('/'); ?>service/celebration-plants/" class="item">
						<img src="<?php echo get_template_directory_uri(); ?>/img/service/celebration-plants/celebration-plants-image01.webp" alt="御祝い観葉植物">
						<p>御祝い観葉植物</p>
					</a>
					<a href="<?php echo home_url('/'); ?>service/celebration-stand-flower/" class="item">
						<img src="<?php echo get_template_directory_uri(); ?>/img/page/celebration-stand-flower/celebration-stand-flower-image01.webp" alt="御祝いスタンド花">
						<p>御祝いスタンド花</p>
					</a>
					<a href="<?php echo home_url('/'); ?>service/funeral-flower" class="item">
						<img src="<?php echo get_template_directory_uri(); ?>/img/page/funeral-flower/funeral-flower-image01.webp" alt="お悔やみ・お供え花">
						<p>お悔やみ・お供え花</p>
					</a>
					<a href="<?php echo home_url('/'); ?>service/funeral-stand-flower" class="item">
						<img src="<?php echo get_template_directory_uri(); ?>/img/page/funeral-stand-flower/sougi_stand01.webp" alt="葬儀スタンド花">
						<p>葬儀スタンド花</p>
					</a>
				</div>
			</div>
		</section>
		<!-- service -->

		<?php
	// 設定
	$taxonomy     = 'works_category';   // タクソノミー
	$parent_slug  = 'service_category'; // 親タームの「スラッグ」

	// サービスカテゴリ 表示タイトル・クエリ用スラッグマッピング
	$fp_service_term_map = [
		'御祝い花束'           => ['title' => '花束',                      'slugs' => ['bouquet']],
		'御祝いアレンジメント花' => ['title' => 'アレンジメント花',           'slugs' => ['arrangement', 'abstract-flowers']],
		'御祝い胡蝶蘭'         => ['title' => '胡蝶蘭',                    'slugs' => ['phalaenopsis']],
		'御祝い観葉植物'        => ['title' => '観葉植物',                  'slugs' => ['plants', 'rental']],
		'御祝いスタンド花'      => ['title' => '御祝い花・御祝いスタンド花', 'slugs' => ['stand-celebration', 'display-decorations']],
		'お悔やみ・お供え花'    => ['title' => 'お悔やみ・お供え花',         'slugs' => ['funeral-flower']],
		'葬儀スタンド花'        => ['title' => '葬儀花・葬儀スタンド花',     'slugs' => ['funeral', 'stand-funeral']],
	];

	// 親タームを取得（スラッグ指定）
	$parent = get_term_by( 'slug', $parent_slug, $taxonomy );

	// 親が見つからない場合は、名称での補助検索（名称=日本語名で登録した場合の保険）
	if ( ! $parent ) {
		$parent = get_term_by( 'name', $parent_slug, $taxonomy );
	}

	if ( ! $parent || is_wp_error( $parent ) ) :
?>
	<p>親ターム「service_category」が見つかりません。</p>
<?php
	else :
	// 親ターム直下の子ターム一覧を取得（必要なら hide_empty を false に）
	$child_terms = get_terms([
		'taxonomy'   => $taxonomy,
		'parent'     => (int) $parent->term_id,
		'hide_empty' => true,         // 投稿が1件も無い子タームはタブに出さない
		'orderby'    => 'term_order', // 並び順プラグインが無い場合は 'name' に変更
		'order'      => 'ASC',
	]);

	if ( is_wp_error( $child_terms ) || empty( $child_terms ) ) :
?>
	<p>「<?php echo esc_html( $parent->name ); ?>」配下のカテゴリーはありません。</p>
<?php else : ?>

<!-- case -->
<section class="case">
	<div class="inner">
		<div class="title-wrap">
			<h2 class="cmn-title">事例紹介</h2>
			<a href="<?php echo esc_url( home_url('/case-list') ); ?>" class="cmn-button">事例一覧を確認する</a>
		</div>

		<p class="top-text">
			ヌボー生花店が手掛けたウェディング装花・店舗ディスプレイ・定期装飾・お悔やみのお花など、多彩な事例をまとめています。制作背景やデザインの工夫まで、詳しく事例ページでご紹介しています。
		</p>

		<ul class="tab-menu">
			<?php foreach ( $child_terms as $i => $term ) : ?>
				<?php
				$slug        = $term->slug;
				$_tc         = $fp_service_term_map[ $term->name ] ?? null;
				$name        = $_tc ? $_tc['title'] : $term->name;
				$active      = ( $i === 0 ) ? ' is-active' : '';
				?>
				<li class="tab<?php echo esc_attr( $active ); ?>" data-tab="<?php echo esc_attr( $slug ); ?>">
					<?php echo esc_html( $name ); ?>
				</li>
			<?php endforeach; ?>
		</ul>

		<div class="tab-wrap">
			<?php foreach ( $child_terms as $i => $term ) : ?>
				<?php
				$slug        = $term->slug;
				$activeClass = ( $i === 0 ) ? ' is-active' : '';
				$term_link   = get_term_link( $term );
				$_tc         = $fp_service_term_map[ $term->name ] ?? null;
				$display_name = $_tc ? $_tc['title'] : $term->name;

				// マッピングがある場合は production slugs で取得、なければデフォルト
				if ( $_tc ) {
					$tax_query_arg = [
						'taxonomy' => $taxonomy,
						'field'    => 'slug',
						'terms'    => $_tc['slugs'],
						'operator' => 'IN',
					];
				} else {
					$tax_query_arg = [
						'taxonomy'         => $taxonomy,
						'field'            => 'term_id',
						'terms'            => (int) $term->term_id,
						'include_children' => true,
					];
				}
				$q = new WP_Query([
					'post_type'      => 'works',
					'posts_per_page' => 2,
					'post_status'    => 'publish',
					'tax_query'      => [ $tax_query_arg ],
				]);
				?>
				<div class="tab-contents<?php echo esc_attr( $activeClass ); ?>" id="tab-<?php echo esc_attr( $slug ); ?>" data-tab="<?php echo esc_attr( $slug ); ?>">
					<div class="list">
						<?php if ( $q->have_posts() ) : ?>
							<?php while ( $q->have_posts() ) : $q->the_post(); ?>
								<div class="box">
									<?php if ( has_post_thumbnail() ) : ?>
										<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'medium' ); ?></a>
									<?php else : ?>
										<a href="<?php the_permalink(); ?>">
											<img src="<?php echo esc_url( get_template_directory_uri() . '/img/common/no-image.jpg' ); ?>" alt="">
										</a>
									<?php endif; ?>
									<div class="text">
										<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
										<p><?php echo esc_html( wp_trim_words( get_the_excerpt(), 40, '…' ) ); ?></p>
										<a class="more" href="<?php the_permalink(); ?>">詳しく見る</a>
									</div>
								</div>
							<?php endwhile; wp_reset_postdata(); ?>
						<?php else : ?>
							<p class="no-article">このカテゴリの事例はまだありません。</p>
						<?php endif; ?>
					</div>

					<?php if ( ! is_wp_error( $term_link ) ) : ?>
						<div class="link">
							<a href="<?php echo esc_url( $term_link ); ?>" class="cmn-button">
								<?php echo esc_html( $display_name ); ?>の事例を確認する
							</a>
						</div>
					<?php endif; ?>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
<!-- /case -->

<?php endif; endif; ?>



		<!-- faq -->
		<section class="faq">
			<div class="inner">
				<div class="title-wrap">
					<h2 class="cmn-title">よくあるご質問</h2>
					<a href="<?php echo home_url('/'); ?>faq" class="cmn-button">よくあるご質問を確認する</a>
				</div>

				<div class="list">
					<a href="<?php echo home_url('/'); ?>faq#faq-order" class="item">
						<img src="<?php echo get_template_directory_uri(); ?>/img/top/faq_img01.png" alt="">
						<p>ご注文方法</p>
					</a>
					<a href="<?php echo home_url('/'); ?>faq#faq-payment" class="item">
						<img src="<?php echo get_template_directory_uri(); ?>/img/top/faq_img02.png" alt="">
						<p>お支払い方法</p>
					</a>
					<a href="<?php echo home_url('/'); ?>faq#faq-deliver" class="item">
						<img src="<?php echo get_template_directory_uri(); ?>/img/top/faq_img03.png" alt="">
						<p>お届け方法</p>
					</a>
					<a href="<?php echo home_url('/'); ?>faq#faq-attention" class="item">
						<img src="<?php echo get_template_directory_uri(); ?>/img/top/faq_img04.png" alt="">
						<p>お花を贈る時の注意点</p>
					</a>
					<a href="<?php echo home_url('/'); ?>faq#faq-other" class="item">
						<img src="<?php echo get_template_directory_uri(); ?>/img/top/faq_img05.png" alt="">
						<p>その他</p>
					</a>
				</div>
			</div>
		</section>
		<!-- faq -->

	</div>
</main>
<!-- メインコンテンツ -->

<script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
<script type="text/javascript">
	$(function() {
		const swiper1 = new Swiper(".swiper01", {
			loop: true,
			centeredSlides: true,
			slidesPerView: 1,
			spaceBetween: 0,
			speed: 1000,
			allowTouchMove: true,
			autoplay: {
				delay: 4000,
				disableOnInteraction: false,
			},
			pagination: {
				el: ".swiper-pagination-01",
				clickable: true,
			},
			navigation: {
				nextEl: ".swiper-button-next-01",
				prevEl: ".swiper-button-prev-01",
			},
			breakpoints: {
				1239: {
					slidesPerView: 1,
				}
			},
		});
	});
</script>

<script type="text/javascript">
$(window).on('load', function() {
	$(".tab-contents:not(:eq(0))").hide();
	$(".tab").click(function() {
		var num = $(".tab").index(this);
		$(".tab-contents").hide();
		$(".tab-contents").eq(num).show();
		$(".tab").removeClass('is-active');
		$(this).addClass('is-active');
	});
});
</script>


<?php get_footer(); ?>
