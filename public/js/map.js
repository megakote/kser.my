var image = "img/map_marker.png";

function initMap() {

	if( document.getElementById("map_1") ) {

		var map = new google.maps.Map(document.getElementById('map_1'), {
							center: {lat: 56.0080264, lng: 37.4422701},
							scrollwheel: false,
							scaleControl: false,
							zoom: 16
						});

		var contentString = '<div class="map_tooltip">'+
								'<div class="inner">'+
								'<h3>ООО «Сервис Принт» <br />Филиал «На Ленина»</h3>'+
								'<ul class="info">'+
									'<li><i class="map-mark_2"></i>123123 Российская Федерация,<br /> г. Москва, ул. Ленина, д. 121</li>'+
								'</ul>'+
								'</div>'+
							'</div>';

		var infowindow = new google.maps.InfoWindow({
			content: contentString,
			pixelOffset: new google.maps.Size(11, 32),
			disableAutoPan: false,
			zIndex: null,
			enableEventPropagation: false
		});

		var marker = new google.maps.Marker({
			position: {lat: 56.0070264, lng: 37.4422701},
			map: map,
			icon: image,
			title: 'Sevice Print'
		});

		infowindow.open(map, marker);

		google.maps.event.addListener(infowindow, 'domready', function(){
		    $(".gm-style-iw").prev("div").hide();
		    $(".gm-style-iw").next("div").hide();
		});

	}

	if( document.getElementById("map_2") ) {

		var map2 = new google.maps.Map(document.getElementById('map_2'), {
							center: {lat: 56.0080264, lng: 37.4422701},
							scrollwheel: false,
							scaleControl: false,
							zoom: 16
						});

		var contentString2 = '<div class="map_tooltip">'+
								'<div class="inner">'+
								'<h3>ООО «Сервис Принт» <br />Филиал «На Ленина»</h3>'+
								'<ul class="info">'+
									'<li><i class="map-mark_2"></i>123123 Российская Федерация,<br /> г. Москва, ул. Ленина, д. 121</li>'+
								'</ul>'+
								'</div>'+
							'</div>';

		var infowindow2 = new google.maps.InfoWindow({
			content: contentString2,
			pixelOffset: new google.maps.Size(11, 32),
			disableAutoPan: false,
			zIndex: null,
			enableEventPropagation: false
		});

		var marker2 = new google.maps.Marker({
			position: {lat: 56.0070264, lng: 37.4422701},
			map: map2,
			icon: image,
			title: 'Sevice Print'
		});

		infowindow2.open(map2, marker2);

		google.maps.event.addListener(infowindow2, 'domready', function(){
		    $(".gm-style-iw").prev("div").hide();
		    $(".gm-style-iw").next("div").hide();
		});

	}

	if( document.getElementById("map_3") ) {

		var map3 = new google.maps.Map(document.getElementById('map_3'), {
							center: {lat: 56.0080264, lng: 37.4422701},
							scrollwheel: false,
							scaleControl: false,
							zoom: 16
						});

		var contentString3 = '<div class="map_tooltip">'+
								'<div class="inner">'+
								'<h3>ООО «Сервис Принт» <br />Филиал «На Ленина»</h3>'+
								'<ul class="info">'+
									'<li><i class="map-mark_2"></i>123123 Российская Федерация,<br /> г. Москва, ул. Ленина, д. 121</li>'+
								'</ul>'+
								'</div>'+
							'</div>';

		var infowindow3 = new google.maps.InfoWindow({
			content: contentString3,
			pixelOffset: new google.maps.Size(11, 32),
			disableAutoPan: false,
			zIndex: null,
			enableEventPropagation: false
		});

		var marker3 = new google.maps.Marker({
			position: {lat: 56.0070264, lng: 37.4422701},
			map: map3,
			icon: image,
			title: 'Sevice Print'
		});

		infowindow3.open(map3, marker3);

		google.maps.event.addListener(infowindow3, 'domready', function(){
		    $(".gm-style-iw").prev("div").hide();
		    $(".gm-style-iw").next("div").hide();
		});


	}

}