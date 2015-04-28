<?php header("Content-type: text/html; charset=utf-8"); ?>

<?
// This script provides a way of adding markers to the DB based on the overlayed map
// EXCEPT
// Overlaying turned out to be hard, so markers were in fact traced off a separate image...
// ... appended to the DOM ...
// ... and copied and pasted out of the console.

// It was hard, OK.
// Wine was involved.
?>

<html xmlns:xlink="http://www.w3.org/1999/xlink">
<head>
<title>Cameras: Tracing</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.css" />
	<script src="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.js"></script>
	<style>
	html, body, #map { height: 100%; width: 100%; padding:0px; margin:0px; }
	</style>

</head>
<body width="100%">

<div id="container">

<div id="map"></div>

<div id="markers" style="display:none"></div>

<script>
	var map = L.map('map').setView([51.505, -0.09], 11);
	L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
	    attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
		}).addTo(map);

	// Is actually pretty nigh on impossible to overlay a flat map usefully like this, so...
/*
	var imageUrl = 'LEZ_Layout_Circled.jpg',
    imageBounds = L.latLngBounds([
        [51.73132, -0.809],
        [51.21958, 0.32842]]);
	map.fitBounds(imageBounds);
    var overlay = L.imageOverlay(imageUrl, imageBounds, {opacity: 0.5})
    	.addTo(map);
*/
	map.on("click",function(e) {
		var newMarker = new L.marker(e.latlng).addTo(map);
		console.log(e.latlng.lat,e.latlng.lng);
		$('#markers').append('['+e.latlng.lat+','+e.latlng.lng+'],')
		});
</script>

</div><!-- container -->

</body>
</html>