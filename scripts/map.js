$(document).ready(function(){

	const postalCode = $('.card__info--postal').html();
	let latLng, lat, lng;

	$.ajax({ // Get lat & long from postal code
		async: false,
		url: 'https://www.mapquestapi.com/geocoding/v1/address?key='+mapquestapi+'&postalCode='+postalCode+'&country=finland',
        success: function(obj) {
			latLng = obj.results[0].locations[0].latLng;
			lat    = JSON.stringify(latLng.lat);
			lng    = JSON.stringify(latLng.lng);
        }
	});
	
    const map = L.map('mapid').setView([lat, lng], 13); // Create map from previous ajax request with lat & long

	L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token='+mapboxapi, {
		maxZoom: 18,
		id: 'mapbox/streets-v11',
		tileSize: 512,
		zoomOffset: -1
	}).addTo(map);

	const circle = L.circle([lat, lng], { // Map out area of the postal code
		color: 'rgb(218, 65, 103)',
		fillColor: 'rgb(218, 65, 103)',
		fillOpacity: 0.5,
		radius: 500
	}).addTo(map);

	$.ajax({ // POI 
		url: 'https://api.digitransit.fi/geocoding/v1/reverse?point.lat='+lat+'&point.lon='+lng+'&lang=sv&layers=venue',
		success: function(obj) {
			for (let i = 0; i < 3; i++) {
				let randPOI = obj.features[Math.floor(Math.random() * obj.features.length)].properties.name;
				$('.card__poi-list').append('<li>'+randPOI+'</li>');
			}
		}
	});
});