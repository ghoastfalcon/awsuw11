<?php
	// mobile detection. This class allows for much more robust mobile testing if time it taken to impliment
	require('Mobile_Detect.php');
	$detect = new Mobile_Detect;
	if ($detect->isMobile()) {
		$hasGPS = 'TRUE';
	}
	else {
		$hasGPS = 'false';
	}

	// for development. Set the protocol (http:// or https://) and domain of the static assets
	$assetProto = '';
	$assetDomain = '';


?>
<!DOCTYPE html>
<html>
  <head>
  	<meta charset="UTF-8">
    <title>United Way Team 11!</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="<?=$assetProto.$assetDomain?>/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <style type="text/css">
    	body, html {
    		height: 100%;
    		margin: 0px;
    		padding: 0px;
    	}
      	.full {
      		height: 100%
      	}
      	#ux-bar {
      		background-color: #0F0;
      	}
      	#map-canvas {
      		width: 100%;
      		height: 100%;
      	}
    </style>
  </head>
  <body>
  	<div class="row full">
        <div class="col-md-2 full" id="ux-bar">Test content</div>
        <div class="col-md-10 full">
        	<div id="map-canvas"></div>
        </div>
    </div>
    

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?=$assetProto.$assetDomain?>/jquery-2.0.2%2Cjs"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?=$assetProto.$assetDomain?>/bootstrap/js/bootstrap.js"></script>
    <!-- Google Maps -->
    <<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAPNqNLrWRSdshfgppSteYx_8qmO6lqtk4&sensor=<?=$hasGPS?>" type="text/javascript"></script>
    <script type="text/javascript">
    	// This is the location of the user we will attempt to use to initialize the map. Let's store a reference to it here so
		// that it can be updated in several places.
		var userLocation = null;

		function initialize() {
			if (userLocation) {
				// user's location if we have it
				var latitude = userLocation.latitude;
				var longitude = userLocation.longitude;
			}
			else {
				// downtown LA as a default
				var latitude = 34.052234;
				var longitude = -118.243685;
			}
			var mapOptions = {
				zoom: 8,
				center: new google.maps.LatLng(latitude, longitude),
				mapTypeId: google.maps.MapTypeId.ROADMAP
			};

			var map = new google.maps.Map(document.getElementById('map-canvas'),mapOptions);
		}

		if (navigator.geolocation) {
			// Get the location of the user's browser using the native geolocation service. When we invoke this method
			// only the first callback is requied. The second callback - the error handler - and the third
			// argument - our configuration options - are optional.
			navigator.geolocation.getCurrentPosition(
				function(position) {
				 
					// Check to see if there is already a location. There is a bug in FireFox where this gets
					// invoked more than once with a cahced result.
					if (userLocation) {
						return userLocation;
					}
		 
					// Add a marker to the map using the position.
					userLocation = {
						"latitude" : position.coords.latitude,
						"longitude" : position.coords.longitude
					};
		 
				},
				function(error) {
					if (console) {
						console.log( "Something went wrong: ", error );
					}
				},
				{
					timeout: (2 * 1000),
					maximumAge: (1000 * 60 * 15),
					enableHighAccuracy: true
				}
			);
		}

		window.onload = initialize;
	</script>
  </body>
</html>