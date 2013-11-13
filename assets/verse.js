// potrait vs landscape min values
var minNavHeight = 74;
var minNavWidth = 200;
// column ids
var navDiv = 'ux-bar';
var mapDiv = 'map-canvas';

// This is the location of the user we will attempt to use to initialize the map. Let's store a reference to it here so
// that it can be updated in several places.
var centerPoint = null;

// global var for the google geocoder and dynamic map sizing
var totalHeight, totalWidth, widthMode, resizeTimeout;
var geocoder, mapWidth, mapHeight, navWidth, navHeight;

$(document).ready(function() {
	// detect current browser width/height and set environment accordingly
	setLayout();

	// listen for window size change
	$(window).resize(function() {
		if (resizeTimeout) {
			clearTimeout(resizeTimeout);
		}

		// use a timeout so we aren't resizing constantly
		resizeTimeout = setTimeout(function() {
			setLayout();
			google.maps.event.trigger(map, "resize");
			console.log('resize');
		}, 300)
	});

	// instance a geocoder to allow users to set a ma center point via zipcode
	geocoder = new google.maps.Geocoder();

	// get a center location (either from the user or roughtly in the center of LA) then draw the map
	$.when(userLocation()).then(function(point) {
		var centerPoint = new google.maps.LatLng(point.latitude,point.longitude);
		var mapOptions = {
			zoom: 8,
			center: centerPoint,
			mapTypeId: google.maps.MapTypeId.ROADMAP
		};
		var map = new google.maps.Map(document.getElementById('map-canvas'),mapOptions);
	});

	function userLocation() {
		var deferred = new $.Deferred();
		var point = {"latitude":34.052234,"longitude":-118.243685};
		deferred.resolve(point);

		// navigator.geolocation.getCurrentPosition(function(position){
		// 	var point = {"latitude":position.coords.latitude,"longitude":position.coords.longitude};
		// 	deferred.resolve(point);
		// },
		// function(error) {
		// 	if (console)
		// 		console.log('Unable to get user position: '+error);

		// 	var point = {"latitude":34.052234,"longitude":-118.243685};
		// 	deferred.resolve(point);
		// },
		// {
		// 	timeout: 20000,
		// 	enableHighAccuracy: true
		// });

		// return promise so that outside code cannot reject/resolve the deferred
		return deferred.promise();
	};
});

function setLayout() {
	totalWidth = $(window).innerWidth();
	totalHeight = $(window).innerHeight();

	// narrow (portrait) mode
	if (totalWidth <= 640) {
		widthMode = "narrow";
		mapWidth = totalWidth+'px';
		mapHeight = (totalHeight - minNavHeight)+'px';;
		navWidth = totalWidth+'px';
		navHeight = minNavHeight+'px';
	}
	// wide mode
	else {
		widthMode = "wide";
		mapWidth = (totalWidth - minNavWidth)+'px';
		mapHeight = totalHeight+'px';
		navWidth = minNavWidth+'px';
		navHeight = totalHeight+'px';
	}

	// set div parameters
	$('#'+navDiv).width(navWidth).height(navHeight);
	$('#'+mapDiv).width(mapWidth).height(mapHeight);
}