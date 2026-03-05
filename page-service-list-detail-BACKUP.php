<?php
/*
Template Name: サービス紹介詳細
*/
get_header();
?>

<!-- メインコンテンツ -->
<!-- TEMPLATE UPDATE TEST: 2025-02-06-v2 -->
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
						<!-- <dl class="faq-content">
							<dt class="faq-question accordion-toggle">
								<div class="faq-question__title">
									ここに質問が入ります。
								</div>
							</dt>
							<dd class="faq-answer">
								<div class="faq-answer__wrap">
									<div>
										ここに回答が入ります。ここに回答が入ります。ここに回答が入ります。ここに回答が入ります。
									</div>
								</div>
							</dd>
						</dl>
						<dl class="faq-content">
							<dt class="faq-question accordion-toggle">
								<div class="faq-question__title">
									ここに質問が入ります。
								</div>
							</dt>
							<dd class="faq-answer">
								<div class="faq-answer__wrap">
									<div>
										ここに回答が入ります。ここに回答が入ります。ここに回答が入ります。ここに回答が入ります。
									</div>
								</div>
							</dd>
						</dl> -->
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
				<?php 
				// デバッグ用：現在のページ情報を表示
				global $post;
				echo '<!-- DEBUG: Post ID: ' . get_the_ID() . ' -->';
				echo '<!-- DEBUG: Post Slug: ' . $post->post_name . ' -->';
				echo '<!-- DEBUG: is_page(celebration-plants): ' . (is_page('celebration-plants') ? 'true' : 'false') . ' -->';
				?>
				<?php if ( is_page('celebration-bouquet') ) : ?>
					<!-- celebration-bouquet専用コンテンツ -->
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

					<!-- 商品リスト（S/M/L/LLサイズ） -->
					<div class="list item-list celebration-bouquet-items">
						<div class="item">
							<img src="<?php echo get_template_directory_uri(); ?>/img/service/celebration-bouquet-image1.webp" alt="Sサイズ">
							<h5>
								<span class="name">Sサイズ</span>
								<span class="price">¥4,400円<span class="tax">（税込）</span></span>
							</h5>
							<div class="size">
								<p>花束 H45cm程度 x W30cm程度</p>
								<p>カード H7.4cm x W10.5cm</p>
							</div>
						</div>
						<div class="item">
							<img src="<?php echo get_template_directory_uri(); ?>/img/service/celebration-bouquet-image2.webp" alt="Mサイズ">
							<h5>
								<span class="name">Mサイズ</span>
								<span class="price">¥6,600円<span class="tax">（税込）</span></span>
							</h5>
							<div class="size">
								<p>花束 H55cm程度 x W35cm程度</p>
								<p>カード H7.4cm x W10.5cm</p>
							</div>
						</div>
						<div class="item">
							<img src="<?php echo get_template_directory_uri(); ?>/img/service/celebration-bouquet-image3.webp" alt="Lサイズ">
							<h5>
								<span class="name">Lサイズ</span>
								<span class="price">¥8,800円<span class="tax">（税込）</span></span>
							</h5>
							<div class="size">
								<p>花束 H70cm程度 x W40cm程度</p>
								<p>カード H10cm x W14.8cm</p>
							</div>
						</div>
						<div class="item">
							<img src="<?php echo get_template_directory_uri(); ?>/img/service/celebration-bouquet-image4.webp" alt="LLサイズ">
							<h5>
								<span class="name">LLサイズ</span>
								<span class="price">¥11,000円<span class="tax">（税込）</span></span>
							</h5>
							<div class="size">
								<p>花束 H75cm程度 x W45cm程度</p>
								<p>カード H10cm x W14.8cm</p>
							</div>
						</div>
					</div>

					<!-- Rose Boquetセクション -->
					<div class="rose-bouquet-section">
						<div class="rose-bouquet-preview">
							<img src="<?php echo get_template_directory_uri(); ?>/img/service/celebration-bouquet-rose-preview.webp" alt="Rose Boquet">
							<div class="rose-bouquet-overlay">
								<h3 class="rose-bouquet-subtitle">Rose Boquet</h3>
								<p class="rose-bouquet-description">バラのみの花束 ※1週間までにご予約ください。</p>
							</div>
						</div>
						<div class="rose-bouquet-price-list">
							<div class="rose-price-column rose-price-left">
								<p><strong>10本</strong> ¥7,550円<span class="tax">（税込）</span></p>
								<p><strong>11本</strong> ¥8,250円<span class="tax">（税込）</span></p>
								<p><strong>12本</strong> ¥8,950円<span class="tax">（税込）</span></p>
								<p><strong>24本</strong> ¥16,800円<span class="tax">（税込）</span></p>
							</div>
							<div class="rose-price-column rose-price-right">
								<p><strong>50本</strong> ¥35,000円<span class="tax">（税込）</span></p>
								<p><strong>100本</strong> ¥70,000円<span class="tax">（税込）</span></p>
								<p><strong>108本</strong> ¥75,690円<span class="tax">（税込）</span></p>
							</div>
						</div>
						<div class="list item-list rose-bouquet-items">
							<div class="item">
								<img src="<?php echo get_template_directory_uri(); ?>/img/service/celebration-bouquet-rose-image3.webp" alt="バラ108本">
								<h5>
									<span class="name">バラ108本</span>
									<span class="price">¥75,600円<span class="tax">（税込）</span></span>
								</h5>
							</div>
							<div class="item">
								<img src="<?php echo get_template_directory_uri(); ?>/img/service/celebration-bouquet-rose-image2.webp" alt="バラ24本">
								<h5>
									<span class="name">バラ24本</span>
									<span class="price">¥16,800円<span class="tax">（税込）</span></span>
								</h5>
							</div>
							<div class="item">
								<img src="<?php echo get_template_directory_uri(); ?>/img/service/celebration-bouquet-rose-image1.webp" alt="バラ12本">
								<h5>
									<span class="name">バラ12本</span>
									<span class="price">¥8,950円<span class="tax">（税込）</span></span>
								</h5>
							</div>
						</div>
					</div>

					<!-- 御祝い花束の特典 -->
					<div class="tokuten celebration-bouquet-tokuten">
						<div class="tokuten-header">
							<h3><?php the_title(); ?>の特典</h3>
						</div>
						<div class="list tokuten-list">
							<div class="item">
								<img src="<?php echo get_template_directory_uri(); ?>/img/service/brochure.webp" alt="メッセージカード無料">
								<h5>メッセージカード無料</h5>
							</div>
							<div class="item">
								<img src="<?php echo get_template_directory_uri(); ?>/img/service/supplement.webp" alt="切り花栄養剤プレゼント">
								<h5>切り花栄養剤プレゼント</h5>
							</div>
							<div class="item">
								<img src="<?php echo get_template_directory_uri(); ?>/img/service/bouquet-book.webp" alt="花束を長く楽しむための解説書付き">
								<h5>花束を長く楽しむための解説書付き</h5>
							</div>
							<div class="item">
								<img src="<?php echo get_template_directory_uri(); ?>/img/service/bouquet-guarantee.webp" alt="5日間の鮮度保証付きサービス">
								<h5>5日間の鮮度保証付きサービス</h5>
							</div>
						</div>
					</div>
				<?php elseif ( is_page('celebration-arrangement') ) : ?>
					<!-- celebration-arrangement専用コンテンツ -->
					<?php
					$arr_img = get_template_directory_uri() . '/img/page/celebration-arrangement/';
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

					<!-- 商品リスト（S/M/L/LLサイズ） -->
					<div class="list item-list celebration-arrangement-items">
						<div class="item">
							<img src="<?php echo $arr_img; ?>celebration-arrangement-image01.png" alt="Sサイズ">
							<h5>
								<span class="name">Sサイズ</span>
								<span class="price">¥6,600円<span class="tax">（税込）</span></span>
							</h5>
							<div class="size">
								<p>アレンジ H30cm程度 x W30cm程度</p>
								<p>カード H7.4cm x W10.5cm</p>
							</div>
						</div>
						<div class="item">
							<img src="<?php echo $arr_img; ?>celebration-arrangement-image02.png" alt="Mサイズ">
							<h5>
								<span class="name">Mサイズ</span>
								<span class="price">¥11,000円<span class="tax">（税込）</span></span>
							</h5>
							<div class="size">
								<p>アレンジ H40cm程度 x W40cm程度</p>
								<p>カード H10cm x W14.8cm</p>
							</div>
						</div>
						<div class="item">
							<img src="<?php echo $arr_img; ?>celebration-arrangement-image01.png" alt="Lサイズ">
							<h5>
								<span class="name">Lサイズ</span>
								<span class="price">¥16,500円<span class="tax">（税込）</span></span>
							</h5>
							<div class="size">
								<p>アレンジ H65cm程度 x W50cm程度</p>
								<p>カード H19cm x W10cm</p>
							</div>
						</div>
						<div class="item">
							<img src="<?php echo $arr_img; ?>celebration-arrangement-image01.png" alt="LLサイズ">
							<h5>
								<span class="name">LLサイズ</span>
								<span class="price">¥22,000円<span class="tax">（税込）</span></span>
							</h5>
							<div class="size">
								<p>アレンジ H65cm程度 x W65cm程度</p>
								<p>カード H29.7cm x W13cm</p>
							</div>
						</div>
					</div>

					<?php if ( $kakaku_html = get_field('kakaku_html', false, false) ) : ?>
						<div class="price">
							<?php echo do_shortcode( $kakaku_html ); ?>
						</div>
					<?php endif; ?>

					<!-- 御祝いアレンジメントの特典 -->
					<div class="tokuten celebration-arrangement-tokuten">
						<div class="tokuten-header">
							<h3>御祝いアレンジメントの特典</h3>
						</div>
						<div class="list tokuten-list">
							<div class="item">
								<img src="<?php echo $arr_img; ?>brochure.png" alt="メッセージカード・立て札無料">
								<h5>メッセージカード・立て札無料</h5>
							</div>
							<div class="item">
								<img src="<?php echo $arr_img; ?>celebration-arrangement-book.png" alt="アレンジメントを長く楽しむための解説書付き">
								<h5>アレンジメントを長く楽しむための解説書付き</h5>
							</div>
							<div class="item">
								<img src="<?php echo $arr_img; ?>bouquet-guarantee.png" alt="5日間の鮮度保証サービス付き">
								<h5>5日間の鮮度保証サービス付き</h5>
							</div>
						</div>
					</div>

					<!-- Colorsセクション -->
					<div class="celebration-arrangement-colors">
						<div class="colors-header">
							<h3>Colors</h3>
						</div>
						<p class="colors-lead">おすすめの色「あの人は何色？」単色系以外にも、いろいろな色を混ぜた"色MIX"も華やかでオススメです</p>
						<div class="colors-list">
							<div class="colors-item">
								<img src="<?php echo $arr_img; ?>celebration-arrangement-color-pink.png" alt="Pink">
								<div class="colors-text">
									<h4>Pink</h4>
									<p>優しく可愛いイメージのピンク。どんな用途でも人気の一色。</p>
								</div>
							</div>
							<div class="colors-item">
								<img src="<?php echo $arr_img; ?>celebration-arrangement-color-yellow-orange.png" alt="Yellow | Orange">
								<div class="colors-text">
									<h4>Yellow | Orange</h4>
									<p>明るくパワフルなあの人に似合う色。元気をつけたい時にもおすすめ。</p>
								</div>
							</div>
							<div class="colors-item">
								<img src="<?php echo $arr_img; ?>celebration-arrangement-color-white-green.png" alt="White | Green">
								<div class="colors-text">
									<h4>White | Green</h4>
									<p>ナチュラルさと洗練された雰囲気を感じさせる色。ピュアなあの人に。</p>
								</div>
							</div>
							<div class="colors-item">
								<img src="<?php echo $arr_img; ?>celebration-arrangement-color-purple.png" alt="Purple">
								<div class="colors-text">
									<h4>Purple</h4>
									<p>落ち着いて上品、エレガントなあの人に似合う色。おしゃれさも抜群。</p>
								</div>
							</div>
							<div class="colors-item">
								<img src="<?php echo $arr_img; ?>celebration-arrangement-color-red.png" alt="Red">
								<div class="colors-text">
									<h4>Red</h4>
									<p>情熱を伝えたい時に。シックかつ格好良いイメージにもぴったり。</p>
								</div>
							</div>
						</div>
					</div>
				<?php elseif ( is_page('celebration-plants') ) : ?>
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
								<span class="name">フィカス・アルテシマ</span>
								<span class="price">尺鉢・鉢皿付 ¥27,500円<span class="tax">（税込）</span></span>
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
								<span class="name">シュロチク</span>
								<span class="price">尺鉢・鉢皿付 ¥27,500円<span class="tax">（税込）</span></span>
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
								<span class="name">ドラセナ・マッサンゲアナ</span>
								<span class="price">尺鉢・鉢皿付 ¥27,500円<span class="tax">（税込）</span></span>
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
								<span class="name">ユッカ・エレファンティペス</span>
								<span class="price">尺鉢・鉢皿付 ¥27,500円<span class="tax">（税込）</span></span>
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
								<span class="name">ドラセナ・リフレクサ</span>
								<span class="price">尺鉢・鉢皿付 ¥22,000円<span class="tax">（税込）</span></span>
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
								<span class="name">シェフレラ・カポック</span>
								<span class="price">尺鉢・鉢皿付 ¥22,000円<span class="tax">（税込）</span></span>
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
						</div>
						<div class="service-body">
							<div class="service-sub">
								<span class="label">サービス</span>
								<img src="<?php echo $plants_img; ?>celebration-plants-pot.webp" alt="器付・皿鉢付き">
							</div>
							<hr>
							<p>観葉植物はすべて、器付・皿鉢付きの価格となっております。</p>
						</div>
					</div>

					<!-- Green Rentalセクション -->
					<div class="plants-rental">
						<div class="rental-header">
							<h3>Green Rental</h3>
						</div>
						<div class="rental-body">
							<div class="rental-sub">
								<span class="label">植物レンタル</span>
								<img src="<?php echo $plants_img; ?>celebration-plants-rental.webp" alt="植物レンタル">
							</div>
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
				<?php elseif ( is_page('celebration-orchid') ) : ?>
					<!-- celebration-orchid専用コンテンツ -->
					<?php
					$orchid_img = get_template_directory_uri() . '/img/page/celebration-orchid/';
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

					<!-- 商品リスト（胡蝶蘭） -->
					<div class="list item-list celebration-orchid-items">
						<div class="item">
							<img src="<?php echo $orchid_img; ?>celebration-orchid-image01.png" alt="小輪白/2本立ち">
							<h5>
								<span class="name">小輪白/2本立ち</span>
								<span class="price">¥8,800円<span class="tax">（税込）</span></span>
							</h5>
							<div class="size">
								<p>胡蝶蘭 H50cm前後 x W30cm前後</p>
								<p>カード H10cm x W19cm</p>
							</div>
						</div>
						<div class="item">
							<img src="<?php echo $orchid_img; ?>celebration-orchid-image02.png" alt="小輪白/3本立ち">
							<h5>
								<span class="name">小輪白/3本立ち</span>
								<span class="price">¥13,200円<span class="tax">（税込）</span></span>
							</h5>
							<div class="size">
								<p>胡蝶蘭 H60cm前後 x W40cm前後</p>
								<p>カード H10cm x W19cm</p>
							</div>
						</div>
						<div class="item orchid-multi">
							<div class="orchid-slider-wrap">
								<div class="orchid-slider">
									<div class="orchid-slider-inner">
										<img src="<?php echo $orchid_img; ?>celebration-orchid-image03-1.png" alt="大輪白/3本立ち ①">
										<img src="<?php echo $orchid_img; ?>celebration-orchid-image03-2.png" alt="大輪白/3本立ち ②">
										<img src="<?php echo $orchid_img; ?>celebration-orchid-image03-3.png" alt="大輪白/3本立ち ③">
									</div>
								</div>
								<span class="orchid-slider-arrow" aria-hidden="true">→</span>
							</div>
							<h5>
								<span class="name">大輪白/3本立ち</span>
							</h5>
							<div class="size orchid-size-small">
								<p><span class="line1">① ¥22,000円（税込） 輪数 30前後</span><span class="line2">　胡蝶蘭 H80cm〜90cm前後 x W45cm前後</span></p>
								<p><span class="line1">② ¥27,500円（税込） 輪数 36前後</span><span class="line2">　胡蝶蘭 H90cm〜100cm前後 x W45cm前後</span></p>
								<p><span class="line1">③ ¥33,000円（税込） 輪数 42前後</span><span class="line2">　胡蝶蘭 H100cm〜110cm前後 x W50cm前後</span></p>
							</div>
						</div>
						<div class="item orchid-multi orchid-five">
							<div class="orchid-images-row">
								<img src="<?php echo $orchid_img; ?>celebration-orchid-image04-1.png" alt="大輪白/5本立ち ①">
								<img src="<?php echo $orchid_img; ?>celebration-orchid-image04-2.png" alt="大輪白/5本立ち ②">
							</div>
							<h5>
								<span class="name">大輪白/5本立ち</span>
							</h5>
							<div class="size orchid-size-small orchid-size-line">
								<p><span class="line1">① ¥49,500円（税込） 輪数 55前後</span><span class="line2">　胡蝶蘭 H90cm〜100cm前後 x W60cm前後</span></p>
								<p><span class="line1">② ¥55,000円（税込） 輪数 60前後</span><span class="line2">　胡蝶蘭 H100cm〜110cm前後 x W65cm前後</span></p>
								<p><span class="line1">③ ¥66,000円（税込） 輪数 70前後</span><span class="line2">　胡蝶蘭 H110cm〜120cm前後 x W65cm前後</span></p>
								<p>（共通）立て札 H13cm x W29.7cm</p>
							</div>
						</div>
					</div>

					<?php if ( $kakaku_html = get_field('kakaku_html', false, false) ) : ?>
						<div class="price">
							<?php echo do_shortcode( $kakaku_html ); ?>
						</div>
					<?php endif; ?>

					<!-- Serviceセクション（胡蝶蘭回収サービス） -->
					<div class="orchid-service">
						<div class="orchid-service-header">
							<h3>Service</h3>
							<div class="orchid-service-sub">
								<span class="label">胡蝶蘭の回収サービス</span>
								<img src="<?php echo $orchid_img; ?>celebration-orchid-car.png" alt="胡蝶蘭の回収サービス">
							</div>
						</div>
						<div class="orchid-service-body">
							<hr>
							<p>ヌボー生花店では、お花が終わった後の「胡蝶蘭回収サービス」を実施しております。店頭にお持ちいただくと無料で回収いたします。回収した胡蝶蘭は、弊社のお客様へ無料でプレゼントし、お客様に育てて楽しんでいただきます。大型鉢が3鉢以上あるお客様は、無償にて訪問回収致します。1〜2鉢の場合は、1,000円/回（税込）で伺います。</p>
						</div>
					</div>

					<!-- 胡蝶蘭の特典 -->
					<div class="tokuten celebration-orchid-tokuten">
						<div class="tokuten-header">
							<h3>胡蝶蘭の特典</h3>
						</div>
						<div class="list tokuten-list">
							<div class="item">
								<img src="<?php echo $orchid_img; ?>celebration-orchid-signboard.png" alt="ラッピング・立て札無料">
								<h5>ラッピング・立て札無料</h5>
							</div>
							<div class="item">
								<img src="<?php echo $orchid_img; ?>celebration-orchid-plate.png" alt="胡蝶蘭用鉢皿を無料で添付">
								<h5>胡蝶蘭用鉢皿を無料で添付</h5>
							</div>
							<div class="item">
								<img src="<?php echo $orchid_img; ?>celebration-orchid-book.png" alt="胡蝶蘭の育て方冊子付">
								<h5>胡蝶蘭の育て方冊子付</h5>
							</div>
						</div>
					</div>

					<!-- Colorsセクション（胡蝶蘭） -->
					<div class="celebration-orchid-colors">
						<div class="colors-header">
							<h3>Colors</h3>
						</div>
						<div class="colors-list">
							<div class="colors-item">
								<img src="<?php echo $orchid_img; ?>celebration-orchid-color-white.png" alt="白">
								<div class="colors-text">
									<h4>白</h4>
									<p>最も人気のあるカラー</p>
								</div>
							</div>
							<div class="colors-item">
								<img src="<?php echo $orchid_img; ?>celebration-orchid-color-pink.png" alt="ピンク">
								<div class="colors-text">
									<h4>ピンク</h4>
									<p>華やかなシーンにオススメ ※要予約</p>
								</div>
							</div>
							<div class="colors-item">
								<img src="<?php echo $orchid_img; ?>celebration-orchid-color-rip.png" alt="リップ">
								<div class="colors-text">
									<h4>リップ</h4>
									<p>紅白で縁起の良い胡蝶蘭 ※要予約</p>
								</div>
							</div>
							<div class="colors-item">
								<img src="<?php echo $orchid_img; ?>celebration-orchid-color-some.png" alt="染め">
								<div class="colors-text">
									<h4>染め</h4>
									<p>変わったお色でインパクトを求める方にオススメ ※要予約</p>
								</div>
							</div>
						</div>
					</div>
				<?php else : ?>
					<!-- その他のサービスページ（既存のACFコンテンツ） -->
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

					<?php if ( $html = get_field('item_list_html', false, false) ) : ?>
						<div class="list item-list">
							<?php echo do_shortcode( $html ); ?>
						</div>
					<?php endif; ?>

					<?php if ( $html = get_field('kakaku_html', false, false) ) : ?>
						<div class="price">
							<?php echo do_shortcode( $html ); ?>
						</div>
					<?php endif; ?>

					<?php if ( $tokuten = get_field('tokuten_html', false, false) ) : ?>
						<div class="tokuten">
							<h3><?php the_title(); ?>の特典</h3>
							<div class="list tokuten-list">
								<?php echo do_shortcode($tokuten); ?>
							</div>
						</div>
					<?php endif; ?>
				<?php endif; ?>

				<?php if ( $other = get_field('other_text_html', false, false) ) : ?>
					<?php if ( !is_page('celebration-bouquet') && !is_page('celebration-arrangement') && !is_page('celebration-orchid') ) : ?>
						<div class="other">
							<?php echo do_shortcode($other); ?>
						</div>
					<?php endif; ?>
				<?php endif; ?>

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