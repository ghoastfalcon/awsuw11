// This is the location of the user we will attempt to use to initialize the map. Let's store a reference to it here so
// that it can be updated in several places.
var userLocation = null;

// global var for the google geocoder
var geocoder;

$(document).ready(function() {
	geocoder = new google.maps.Geocoder();

	var startCenter = new google.maps.LatLng(34.052234,-118.243685);
	var mapOptions = {
		zoom: 8,
		center: startCenter,
		mapTypeId: google.maps.MapTypeId.ROADMAP
	};

	var map = new google.maps.Map(document.getElementById('map-canvas'),mapOptions);
});

/*if (navigator.geolocation) {
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
			timeout: (5 * 1000),
			enableHighAccuracy: true
		}
	);
}*/