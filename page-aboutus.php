<?php get_header(); ?>

<!-- メインコンテンツ -->
<main id="page" class="about">
	<div class="page-header">
		<div class="links">
			<a href="<?php echo home_url('/'); ?>aboutus" class="is-active"><?php the_title(); ?></a>
			<a href="<?php echo home_url('/'); ?>news">お知らせ</a>
			<a href="<?php echo home_url('/'); ?>contact">お問い合わせ</a>
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
		
	</div>
	<?php
	$section_map = [ 'message' => 0, 'company' => 1, 'staff' => 2 ];
	$current_section = get_query_var( 'aboutus_section', 'message' );
	$initial_tab = isset( $section_map[ $current_section ] ) ? $section_map[ $current_section ] : 0;
	$section_slugs = [ 0 => 'message', 1 => 'company', 2 => 'staff' ];
	?>
	<div class="main-content">
		<ul class="tab-menu">
			<li class="tab<?php echo $initial_tab === 0 ? ' is-active' : ''; ?>">代表<br class="sp-only">挨拶</li>
			<li class="tab<?php echo $initial_tab === 1 ? ' is-active' : ''; ?>">会社<br class="sp-only">概要</li>
			<li class="tab<?php echo $initial_tab === 2 ? ' is-active' : ''; ?>">スタッフ<br class="sp-only">紹介</li>
		</ul>

		<div class="tab-wrap">
			<!-- 代表挨拶 -->
			<div class="tab-contents">
				<div class="greeting">
					<h2 class="greeting-main-title">変化の激しい時代だからこそ、常に「新しい（ヌボー）」感動と、普遍的な「癒やし」を。</h2>
					<div class="box greeting-intro">
						<img src="<?php echo get_template_directory_uri(); ?>/img/page/about_greeting_img01.png" alt="" class="greeting-img">
						<div class="text-block">
							<h3>変化の激しい時代だからこそ、常に「新しい（ヌボー）」感動と、普遍的な「癒やし」を。創業50年、名前に込めた「革新」のDNA</h3>
							<p>ヌボー生花店は1974年にその歩みを始め、おかげさまで創業50年という大きな節目を迎えることができました。社名にある「ヌボー」とは、フランス語で「新しい」や「新鮮な」を意味する言葉をもじって名付けられたものです。</p>
						</div>
					</div>

					<p>「地域の皆様に新鮮なお花を提供し、新しい提案をし続けられる花屋でありたい」。創業時のこの願いは、半世紀を経た今も私たちの根底に流れる変わらぬ精神です。地域の皆様に支えられ、今では地域一番店として認めていただける存在へと成長できましたことに、心より感謝申し上げるとともに、これからも地域に根差し貢献できる企業であり続けたいと思います。</p>

					<h3>激動の時代に求められる「自然への回帰」</h3>
					<p>振り返ればこの10年は、私たち花屋を取り巻く環境が劇的に変化した時代でした。コロナ禍によるライフスタイルや消費行動の変容、そして温暖化による生産環境の厳しさなど、かつてない試練に直面しました。さらに現在、AIをはじめとするテクノロジーの進化は加速し、これから先の10年は、過去とは比較にならないほどの激動の日々となることが予想されます。しかし、世の中がデジタル化し、効率や速度が重視されるようになればなるほど、逆説的に人々の心が求めているものがあります。それは、生命の温かさであり、自然の息吹です。人間が本能的に求める「安らぎ」や「生命力」が、花や緑には宿っています。</p>

					<h3>「お花のある生活」で、未来の心を豊かに</h3>
					<p>時代が変わっても、一輪の花が持つ「癒やしの力」は普遍です。言葉にできない想いを伝え、心を解きほぐすその価値は、いつの世も色褪せることはありません。そして、AIや効率化が進む現代社会において、もう一つ私たちが大切にしたい価値があります。それは、花に想いを乗せて届ける「人の温もり」です。お客様一人ひとりの背景にある物語に耳を傾け、その想いに寄り添いながら花を束ねる。この「人」でしか成し得ない接客こそが、花の持つ力を何倍にも高めると信じています。私たちは、普遍的な「花の力」と、心を通わせる「人の力」。この両輪で、地域の皆様に幸福感あふれる「お花のある生活」を提案し続けてまいります。</p>

					<h3>〜経営理念〜</h3>
					<p>ヌボー生花店はお花のある生活という生活スタイルを提案することで、より多くの人達に幸福感を提供していきます。</p>

					<p class="signature"><em>株式会社ヌボー生花店 代表取締役社長 山﨑 年起</em></p>

					<!-- 代表プロフィール（h3で分離） -->
					<h3 class="greeting-extra-h3">代表プロフィール</h3>
					<div class="greeting-extra profile-block">
						<p class="sns-link">
							<span class="sns-name">代表取締役　山﨑 年起<br class="sp-only">（Toshiki Yamasaki）</span>
							<span class="sns-icon-desc-wrap">
								<a href="https://www.instagram.com/nubow.tyamazaki/" target="_blank" rel="noopener noreferrer" class="about-instagram-icon" aria-label="Instagram">Instagram</a>
								<span class="sns-desc">（日々の活動や経営の裏側を発信中）</span>
							</span>
						</p>
						<p>1974年創業の株式会社ヌボー生花店2代目社長。システムエンジニアを経て2006年に入社、2013年に代表就任。「三方よし」の理念のもと、ファンマーケティングとDX（デジタルトランスフォーメーション）を融合させた独自の経営スタイルを確立。</p>
						<p>従業員の「働きがい」を最優先に掲げ、テレワークや柔軟な勤務制度を導入。その成果は、総務省「テレワークトップランナー2024」選定をはじめ、数多くの賞を受賞。現在は自身の経験を活かし、全国で働き方改革やDX推進に関する講演活動も精力的に行っています。</p>
					</div>

					<!-- 花屋の未来をつくる活動（h3で分離） -->
					<h3 class="greeting-extra-h3">花屋の未来をつくる活動</h3>
					<div class="greeting-extra activity-block">
						<p class="activity-company">
							<span class="activity-company-icon"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/page/hanayanomikata_icon.webp" alt="はなやのミカタ"></span>
							株式会社はなやのミカタ
						</p>
						<p>「花屋さんの力になりたい、業界を活性化させたい」という強い想いから、2025年1月に花屋専門の経営コンサルティング会社を設立。長年培った経営ノウハウを全国の仲間に共有し、業界全体の持続可能な発展を支援しています。</p>
						<div class="activity-logo">
							<a href="#" class="activity-link" target="_blank" rel="noopener noreferrer">公式サイトはこちら</a>
						</div>
					</div>
				</div>
			</div>
			<!-- 代表挨拶 -->

			<!-- 会社概要 -->
			<div class="tab-contents">
				<div class="company">
					<h3>経営理念</h3>
					<p>ヌボー生花店は「お花のある生活」という生活スタイルを提案することで、より多くの人達に幸福感を提供していきます。</p>

					<h3>行動指針</h3>
					<p>
						1.花空間を提案することで、楽しくて幸せな時間を提供しています<br>
						2.花贈り文化を更に広めることで、良好な人間関係の構築に貢献しています<br>
						3.花の効能を伝え続けることで、人々の健康増進に貢献しています
					</p>

					<h3>コンセプト</h3>
					<p>
						お花のある生活、それは幸せな生活<br>
						- Flower Life = Happy Life –
					</p>

					<div class="overview">
						<h2>会社概要</h2>
						<table>
							<tr>
								<th>社名</th>
								<td>株式会社 ヌボー生花店</td>
							</tr>
							<tr>
								<th>所在地</th>
								<td>〒381-0014　長野県長野市北尾張部715-7</td>
							</tr>
							<tr>
								<th>TEL</th>
								<td>0120-878-718</td>
							</tr>
							<tr>
								<th>FAX</th>
								<td>026-244-6583</td>
							</tr>
							<tr>
								<th>MAIL</th>
								<td>info@nubow.co.jp</td>
							</tr>
							<tr>
								<th>代表者</th>
								<td>代表取締役社長　山﨑年起</td>
							</tr>
							<tr>
								<th>設立</th>
								<td>1988年4月</td>
							</tr>
							<tr>
								<th>資本金</th>
								<td>1,000万円</td>
							</tr>
							<tr>
								<th>事業内容</th>
								<td>生花ギフト事業、空間装飾事業、ウエディング装飾事業、葬祭装飾事業、グリーンレンタル事業、Café事業</td>
							</tr>
							<tr>
								<th>店舗</th>
								<td>長野市に3店舗<a href="<?php echo home_url('/'); ?>shop">店舗一覧を見る</a></td>
							</tr>
							<tr class="map">
								<td colspan="2">
									<h3>所在地マップ</h3>
									<div id="map_area" style="width: 100%; height: 400px;"></div>
								</td>
							</tr>
						</table>
					</div>

					<div class="history">
						<h2>会社沿革</h2>
						<div class="list">
							<div class="item">
								<h3 class="title">
									1974年（昭和49年）
								</h3>
								<p class="content">
									長野アメ横あおぞら市場にて「フラワーショップヌボー」開業
								</p>
							</div>
							<div class="item">
								<h3 class="title">
									1976年（昭和51年）
								</h3>
								<p class="content">
									松代ショッピングセンターに松代店OPEN
								</p>
							</div>
							<div class="item">
								<h3 class="title">
									1979年（昭和54年）
								</h3>
								<p class="content">
									ホテル・農協会館へウェディング装飾事業開始
								</p>
							</div>
							<div class="item">
								<h3 class="title">
									1981年（昭和56年）
								</h3>
								<p class="content">
									地元スーパーへの卸売販売事業開始
								</p>
							</div>
							<div class="item">
								<h3 class="title">
									1988年（昭和63年）
								</h3>
								<p class="content">
									有限会社ヌボー生花店設立
								</p>
							</div>
							<div class="item">
								<h3 class="title">
									1989年（平成元年）
								</h3>
								<p class="content">
									本社屋完成（長野市北尾張部）
								</p>
							</div>
							<div class="item">
								<h3 class="title">
									1990年（平成02年）
								</h3>
								<p class="content">
									善光寺忠霊殿にて大規模葬儀装飾を担当、葬儀花祭壇事業開始
								</p>
							</div>
							<div class="item">
								<h3 class="title">
									1997年（平成09年）
								</h3>
								<p class="content">
									フラワーギフトの5日間鮮度保証開始
								</p>
							</div>
							<div class="item">
								<h3 class="title">
									1998年（平成10年）
								</h3>
								<p class="content">
									長野冬季五輪にてホワイトリンク、エムウェーブの会場装飾を担当
								</p>
							</div>
							<div class="item">
								<h3 class="title">
									2001年（平成13年）
								</h3>
								<p class="content">
									長野南バイパス店OPEN（長野市稲里町）
								</p>
							</div>
							<div class="item">
								<h3 class="title">
									2004年（平成16年）
								</h3>
								<p class="content">
									篠ノ井店OPEN（マツヤ篠ノ井店内）
								</p>
							</div>
							<div class="item">
								<h3 class="title">
									2005年（平成17年）
								</h3>
								<p class="content">
									株式会社ヌボー生花店に組織変更
								</p>
							</div>
							<div class="item">
								<h3 class="title">
									2006年（平成18年）
								</h3>
								<p class="content">
									ホテル国際21店OPEN（ホテル国際21内）
								</p>
							</div>
							<div class="item">
								<h3 class="title">
									2006年（平成18年）
								</h3>
								<p class="content">
									MIDORI長野店OPEN（長野駅ミドリ改札口前）
								</p>
							</div>
							<div class="item">
								<h3 class="title">
									2007年（平成19年）
								</h3>
								<p class="content">
									長野南バイパス店大規模改装
								</p>
							</div>
							<div class="item">
								<h3 class="title">
									2009年（平成21年）
								</h3>
								<p class="content">
									長野市役所へのロビー装飾ボランティア活動に長野市より感謝状
								</p>
							</div>
							<div class="item">
								<h3 class="title">
									2011年（平成23年）
								</h3>
								<p class="content">
									長野県北部地震の被災地へ花を届けるボランティア活動
								</p>
							</div>
							<div class="item">
								<h3 class="title">
									2012年（平成24年）
								</h3>
								<p class="content">
									社員が技能五輪全国大会に参加し、フラワー装飾職種で第３位（１名）
								</p>
							</div>
							<div class="item">
								<h3 class="title">
									2013年（平成25年）
								</h3>
								<p class="content">
									長野市役所へのロビー装飾ボランティア活動に長野市長より表彰
								</p>
							</div>
							<div class="item">
								<h3 class="title">
									2013年（平成25年）
								</h3>
								<p class="content">
									社員が技能五輪全国大会に参加し、フラワー装飾職種で第２位（２名）
								</p>
							</div>
							<div class="item">
								<h3 class="title">
									2015年（平成26年）
								</h3>
								<p class="content">
									MIDORI長野店をNubow×L’arbreとしてRenewalOPEN（長野駅ビル改装に伴い）
								</p>
							</div>
							<div class="item">
								<h3 class="title">
									2016年（平成28年）
								</h3>
								<p class="content">
									室内緑化事業開始
								</p>
							</div>
							<div class="item">
								<h3 class="title">
									2016年（平成28年）
								</h3>
								<p class="content">
									元国会議員 小坂憲次氏 お別れ会生花祭壇を担当
								</p>
							</div>
							<div class="item">
								<h3 class="title">
									2018年（平成30年）
								</h3>
								<p class="content">
									グリーンポケットFC事業（レンタルグリーン事業）開始
								</p>
							</div>
							<div class="item">
								<h3 class="title">
									2019年（平成31年）
								</h3>
								<p class="content">
									長野南バイパス店をNubow×AdoreとしてRenewalOPEN（店舗拡張に伴い）
								</p>
							</div>
							<div class="item">
								<h3 class="title">
									2019年（平成31年）
								</h3>
								<p class="content">
									Adore CaféをOPEN（Nubow×Adoreに併設）
								</p>
							</div>
						</div>
					</div>
					
				</div>
			</div>
			<!-- 会社概要 -->

			<!-- スタッフ紹介 -->
			<div class="tab-contents">
				<div class="staff">
					<div class="list">
						<div class="box">
							<div class="image">
								<img src="<?php echo get_template_directory_uri(); ?>/img/page/about_staff_sample.jpg" alt="">
							</div>
							<div class="text">
								<h3 class="name">常務取締役<br>Sugita.N （本店）</h3>
								<p>花の魅力に惹かれて入社。長年ありとあらゆる装花技術を磨き続け、ヌボー生花店の装飾技術の根底を支えている。趣味はツーリング。長野市出身。</p>
							</div>
						</div>

						<div class="box">
							<div class="image">
								<img src="<?php echo get_template_directory_uri(); ?>/img/page/about_staff_sample.jpg" alt="">
							</div>
							<div class="text">
								<h3 class="name">法人事業担当マネージャー<br>Yamamoto.K （本店）</h3>
								<p>パン屋のアルバイトから花屋へ転身。長年店舗販売を担当し、愛嬌のある接客でファンが多い。現在は本店のムードメーカー。須坂市出身。</p>
							</div>
						</div>
						
						<div class="box">
							<div class="image">
								<img src="<?php echo get_template_directory_uri(); ?>/img/page/about_staff_sample.jpg" alt="">
							</div>
							<div class="text">
								<h3 class="name">婚礼事業担当マネージャー<br>Kitahara.K （本店）</h3>
								<p>農業大学から新卒で入社。長年杉田の元で技術力を磨き、現在は婚礼装飾の責任者としてその腕をふるっている。小柄だが芯が強い。伊那市出身。</p>
							</div>
						</div>
						
						<div class="box">
							<div class="image">
								<img src="<?php echo get_template_directory_uri(); ?>/img/page/about_staff_sample.jpg" alt="">
							</div>
							<div class="text">
								<h3 class="name">お庭や担当マネージャー<br>Nishizawa.N （本店）</h3>
								<p>植物をこよなく愛する直樹先生。ガーデニングやお庭のメンテナンスのプロとして専門教室を開催している。天然な性格で愛されキャラ。中野市出身。</p>
							</div>
						</div>
						
						<div class="box">
							<div class="image">
								<img src="<?php echo get_template_directory_uri(); ?>/img/page/about_staff_sample.jpg" alt="">
							</div>
							<div class="text">
								<h3 class="name">ヌボーアドレ 店長<br>Kubota.R （ヌボーアドレ）</h3>
								<p>花好きが高じて入社。新店舗の立ち上げに数多く携わり、店舗ディスプレイは抜群のセンスを誇る。アンスリウムをこよなく愛している。飯山市出身。</p>
							</div>
						</div>
						
						<div class="box">
							<div class="image">
								<img src="<?php echo get_template_directory_uri(); ?>/img/page/about_staff_sample.jpg" alt="">
							</div>
							<div class="text">
								<h3 class="name">ヌボーラルブル 店長<br>Yanagisawa.Y （ヌボーラルブル）</h3>
								<p>就職氷河期を経験し偶然出会った花屋へ就職。現場で多くの笑顔に触れ、花屋の仕事に魅了される。自然と周りを笑顔にする天賦の才を持つ。佐久市出身。</p>
							</div>
						</div>
						
						<div class="box">
							<div class="image">
								<img src="<?php echo get_template_directory_uri(); ?>/img/page/about_staff_sample.jpg" alt="">
							</div>
							<div class="text">
								<h3 class="name">支援事業担当マネージャー<br>Matukura.Y （本店）</h3>
								<p>電話受注から総務や経理など事務方全般を担当し、ヌボー生花店の縁の下の力持ちとして活躍している。電話の対応は天下一品。白馬村出身。</p>
							</div>
						</div>
						
					</div>
				</div>
			</div>
			<!-- スタッフ紹介 -->
		</div>

		<!-- その他リンク -->
		<?php get_template_part('parts/parts-otherlinks'); ?>
		<!-- その他リンク -->
	</div>
</main>
<!-- メインコンテンツ -->

<script type="text/javascript">
$(window).on('load', function() {
	var sectionSlugs = ['message', 'company', 'staff'];
	var initialTab = <?php echo (int) $initial_tab; ?>;

	// 初期タブを表示（PHP側でis-activeは付与済み）
	$(".tab-contents").hide();
	$(".tab-contents").eq(initialTab).show();

	$(".tab").click(function() {
		var num = $(".tab").index(this);
		$(".tab-contents").hide();
		$(".tab-contents").eq(num).show();
		$(".tab").removeClass('is-active');
		$(this).addClass('is-active');
		// URL を切り替え（リロードなし）
		history.pushState(null, '', '<?php echo esc_js( home_url('/aboutus/') ); ?>' + sectionSlugs[num]);
	});
});
</script>

<script>
function googleMap() {
  const coordinate = new google.maps.LatLng(36.654658, 138.234933); // 座標

  // マップ設定
  const mapOptions = {
    zoom: 17,
    center: coordinate,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  };
  const map = new google.maps.Map(document.getElementById('map_area'), mapOptions);

  // マップスタイル
  const styleOptions = [
    { featureType: "poi.business", elementType: "all", stylers: [] },
    { featureType: "all", elementType: "all", stylers: [
      { saturation: -74 },
      { hue: "#d1c0a5" },
      { lightness: 30 }
    ] }
  ];
  const styleType = new google.maps.StyledMapType(styleOptions);
  map.mapTypes.set('genius', styleType);
  map.setMapTypeId('genius');

  // アイコン設定（モダンな書き方）
  const icon = {
    url: "<?php echo get_template_directory_uri(); ?>/img/page/pin.png",
    size: new google.maps.Size(45, 75),
    scaledSize: new google.maps.Size(45, 75),
    anchor: new google.maps.Point(22, 75) // 中央下を基点に
  };

  // マーカー描画
  new google.maps.Marker({
    position: coordinate,
    map: map,
    icon: icon,
    title: "NUBOW"
  });
}
</script>



<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB8JximS_BMUAn-ndp1Kmxmxed-PkEtgIY&callback=googleMap"></script>

<?php get_footer(); ?>