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
				<h1 class="cmn-title"><?php the_title(); ?></h1>
			</div>
		</div>
		
	</div>
	<div class="main-content">
		<ul class="tab-menu">
			<li class="tab is-active"><a href="<?php echo home_url('/'); ?>shop">店舗一覧</a></li>
			<li class="tab"><a href="<?php echo home_url('/'); ?>shop/nubow-aile">ヌボーエール</a></li>
			<li class="tab"><a href="<?php echo home_url('/'); ?>shop/nubow-adorer">ヌボーアドレ</a></li>
			<li class="tab"><a href="<?php echo home_url('/'); ?>shop/nubow-larbre">ヌボーラルブル</a></li>
		</ul>

		<div class="tab-wrap">
			<!-- 店舗一覧 -->
			<div class="tab-contents">
				<div class="shop-list">
					<h3>店舗一覧</h3>
					<div class="list">
						<div class="item">
							<img src="<?php echo get_template_directory_uri(); ?>/img/page/shop-info_shop-list_img01.png" alt="ヌボーエール ロゴ">
							<div class="text">
							<h4>
								<span class="shop-name-with-icon">
									<a href="https://www.instagram.com/hanasuki_insta/" target="_blank" rel="noopener noreferrer" class="shop-instagram-icon" aria-label="Instagram">Instagram</a>
									<span class="shop-name">ヌボーエール</span>
								</span>
								<span class="shop-location">（長野市西和田）</span>
							</h4>
								<p>
									住所：〒381-0037　長野県長野市西和田2丁目5-25<br>
									営業時間：9:00～18:00<br>
									定休日：不定休
								</p>
								<div class="button">
									<a href="https://maps.app.goo.gl/knx8G9szF6fyk41U9" target="_blank" class="google">Google map</a>
									<a href="<?php echo home_url('/'); ?>shop/nubow-aile" class="more">店舗情報を見る</a>
								</div>
							</div>
						</div>
						<div class="item">
							<img src="<?php echo get_template_directory_uri(); ?>/img/page/shop-info_shop-list_img02.png" alt="ヌボーアドレ ロゴ">
							<div class="text">
							<h4>
								<span class="shop-name-with-icon">
									<a href="https://www.instagram.com/nubow.adorer/" target="_blank" rel="noopener noreferrer" class="shop-instagram-icon" aria-label="Instagram">Instagram</a>
									<span class="shop-name">ヌボーアドレ</span>
								</span>
								<span class="shop-location">(長野市稲里 ツルヤ長野南店隣)</span>
							</h4>
								<p>
									住所：〒381-2217 長野市稲里町中央1-23-1<br>
									ツルヤ長野南店隣<br>
									営業時間：10:00～19:00<br>
									定休日：ツルヤ長野南店に準ずる
								</p>
								<div class="button">
									<a href="https://maps.app.goo.gl/rnsw9xuaTmFjHZx9A" target="_blank" class="google">Google map</a>
									<a href="<?php echo home_url('/'); ?>shop/nubow-adorer" class="more">店舗情報を見る</a>
								</div>
							</div>
						</div>
						<div class="item">
							<img src="<?php echo get_template_directory_uri(); ?>/img/page/shop-info_shop-list_img03.png" alt="ヌボーラルブル ロゴ">
							<div class="text">
							<h4>
								<span class="shop-name-with-icon">
									<a href="https://www.instagram.com/nubow.larbre/" target="_blank" rel="noopener noreferrer" class="shop-instagram-icon" aria-label="Instagram">Instagram</a>
									<span class="shop-name">ヌボーラルブル</span>
								</span>
								<span class="shop-location">(長野駅ビルMIDORI長野1階)</span>
							</h4>
								<p>
									住所：〒380-0823 長野県長野市南千歳1丁目22-6 長野駅ビルMIDORI長野1階<br>
									営業時間：10:00～20:00<br>
									定休日：長野駅ビルMIDORI長野店に準ずる
								</p>
								<div class="button">
									<a href="https://maps.app.goo.gl/XZGBqGDiPhJLqheD6" target="_blank" class="google">Google map</a>
									<a href="<?php echo home_url('/'); ?>shop/nubow-larbre" class="more">店舗情報を見る</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<!-- CTAセクション -->
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
				<!-- CTAセクション -->
			</div>
			<!-- 店舗一覧 -->
			
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