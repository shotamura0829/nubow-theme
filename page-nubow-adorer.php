<?php get_header(); ?>

<!-- メインコンテンツ -->
<main id="page" class="shop-info">
	<div class="page-header">
		<div class="links">
			<a href="<?php echo home_url('/'); ?>aboutus" class="is-active">店舗紹介</a>
			<a href="<?php echo home_url('/'); ?>reservation">店舗来店予約</a>
		</div>
		<div class="inner">
			<ul class="breadcrumbs">
				<li><a href="<?php echo home_url('/'); ?>">ホーム</a></li>
				<li class="arrow">&#62;</li>
				<li>店舗紹介</li>
			</ul>
			<div class="main-title">
				<h1 class="cmn-title">店舗紹介</h1>
			</div>
		</div>
		
	</div>
	<div class="main-content">
		<ul class="tab-menu">
			<li class="tab"><a href="<?php echo home_url('/'); ?>shop">店舗一覧</a></li>
			<li class="tab"><a href="<?php echo home_url('/'); ?>shop/nubow-aile">ヌボーエール</a></li>
			<li class="tab is-active"><a href="<?php echo home_url('/'); ?>shop/nubow-adorer">ヌボーアドレ</a></li>
			<li class="tab"><a href="<?php echo home_url('/'); ?>shop/nubow-larbre">ヌボーラルブル</a></li>
		</ul>

		<div class="tab-wrap">
			<!-- ヌボーアドレ -->
			<div class="tab-contents">
				<div class="honten">
					<h3>
						<span class="shop-name-with-icon">
							<span class="shop-name">ヌボーアドレ</span>
							<span class="shop-location">（長野市稲里 ツルヤ長野南店隣）</span>
							<a href="https://www.instagram.com/nubow.adorer/" target="_blank" rel="noopener noreferrer" class="shop-instagram-icon" aria-label="Instagram">Instagram</a>
						</span>
					</h3>
					<div class="shop-image-wrap">
						<img src="<?php echo get_template_directory_uri(); ?>/img/page/shop-info_nubow-adorer_img01.jpg" alt="">
						<div class="shop-logo-wrap">
							<img src="<?php echo get_template_directory_uri(); ?>/img/page/shop-info_shop-list_img02.png" alt="ヌボーアドレ ロゴ" class="shop-logo">
						</div>
					</div>

					<div class="box">
						<h4>ヌボーアドレについて</h4>
						<p>
							「大好きな花屋に出会う」をコンセプトにした店舗。花屋としては店舗面積が長野市最大級、お花に関わるギフト商品の品揃えは地域No.1！県内外の高品質産地から取り寄せる生花を中心に、花好きで溢れる花屋です。大切な方へのプレゼントはこの店でじっくり選んで選んでくださいね。
						</p>
					</div>

					<div class="box">
						<h4>アクセス</h4>
						<p>
							ツルヤ長野南店隣 SHOPING PARK内
						</p>
						<div class="map">
							<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3202.932554397913!2d138.1726488!3d36.603933399999995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x601d841319686045%3A0xf854e84321c7bcc!2z44OM44Oc44O844Ki44OJ44Os!5e0!3m2!1sja!2sjp!4v1755664255999!5m2!1sja!2sjp" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
						</div>
					</div>

					<div class="box">
						<h4>店舗情報</h4>
						<p>
							住所：〒381-2217 長野市稲里町中央1-23-1 ツルヤ長野南店隣<br>
							営業時間：10:00～19:00<br>
							定休日 ：ツルヤ長野南店に準ずる
						</p>
					</div>

					<div class="list links">
						<div class="box tel">
							<a href="tel:0120878718">
								<img src="<?php echo get_template_directory_uri(); ?>/img/page/shop-info_honten_img02.png" alt="電話番号">
								<span><img src="<?php echo get_template_directory_uri(); ?>/img/page/shop-info_icon-tel.png" alt="" class="icon">0120-878-718</span>
							</a>
						</div>
						<div class="box reserve">
							<a href="<?php echo home_url('/'); ?>reservation">
								<img src="<?php echo get_template_directory_uri(); ?>/img/page/shop-info_honten_img03.png" alt="店舗への来店予約">
								<span>店舗への来店予約はこちら</span>
							</a>
						</div>
					</div>
				</div>
			</div>
			<!-- ヌボーアドレ -->
		</div>

		
	</div>
</main>
<!-- メインコンテンツ -->

<script>
  function googleMap() {
        var coordinate = new google.maps.LatLng(36.654658, 138.234933);/*座標の指定*/

        /*マップの設定*/
        var mapOptions = {
            zoom: 17, /*Map表示時の拡大倍率を調整。*/
            center: coordinate, /*中心点をどこにするか。この場合は、目的地と同じ*/
            mapTypeId: google.maps.MapTypeId.ROADMAP/*地図の表示タイプの指定。*/
        };

        /*マップをID area-google-mapに埋め込む記述*/
        var map = new google.maps.Map(document.getElementById('map_area'), mapOptions);

        /*マップのデザインの指定*/
        var styleOptions = [
          { featureType: "poi.business", elementType: "all", stylers: [ ] },
          { featureType: "all", elementType: "all", stylers: [ { saturation: -74 },
          { hue: "#d1c0a5" },
          { lightness: 30 } ] }
        ];

        /*マップのデザインを適用させる記述*/
        var styleType = new google.maps.StyledMapType(styleOptions);
        map.mapTypes.set('genius', styleType);
        map.setMapTypeId('genius');

        /*アイコンの表示設定*/
        var icon = new google.maps.MarkerImage('<?php echo get_template_directory_uri(); ?>/img/page/pin.png',/*アイコンのパス*/
        new google.maps.Size(45,75),/*アイコンのサイズ*/
        new google.maps.Point(0,0)/*座標からのアイコンの位置*/
    );
    var markerOptions = {
      position: coordinate,/*表示場所と同じ位置に設置*/
      map: map,
      icon: icon,
  };

  /*アイコンを表示させる記述*/
  var marker = new google.maps.Marker(markerOptions);
    }

</script>

<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB8JximS_BMUAn-ndp1Kmxmxed-PkEtgIY&callback=googleMap"></script>

<?php get_footer(); ?>