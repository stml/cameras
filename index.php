<?php header("Content-type: text/html; charset=utf-8"); ?>
<html xmlns:xlink="http://www.w3.org/1999/xlink">
<head>
<title>Cameras: ANPR in London</title>
	<style type="text/css" media="screen">
		@import url( styles.css );
	</style>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.css" />
	<script src="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.js"></script>
	<script src="cameras.js"></script>

<meta content='width=device-width,maximum-scale=1.0,initial-scale=1.0,user-scalable=0' name='viewport'>
</head>
<body>

<div id="container">

<div id="header_o">
	<div id="header_i">
		<h1>Cameras</h1>
	</div>
</div>

<div id="content">

<div id="map"></div>

</div><!-- content -->

</div><!-- container -->

</body>
</html>