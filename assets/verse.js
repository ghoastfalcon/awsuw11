// This is the location of the user we will attempt to use to initialize the map. Let's store a reference to it here so
// that it can be updated in several places.
var centerPoint = null;

// global var for the google geocoder
var geocoder;
var map;

$(document).ready(function() {
<<<<<<< HEAD
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
=======
	
	/*
		geocoder = new google.maps.Geocoder();

		var startCenter = new google.maps.LatLng(34.052234,-118.243685);
		var mapOptions = {
			zoom: 8,
			center: startCenter,
			mapTypeId: google.maps.MapTypeId.ROADMAP
		};

		var map = new google.maps.Map(document.getElementById('map-canvas'),mapOptions);
	*/
>>>>>>> 63092ba33d90af8b314fab247336d6ff645ea250

	// intialize the map
	function initialize() {
	  geocoder = new google.maps.Geocoder();
	  var latlng = new google.maps.LatLng(34.052234,-118.243685);
	  var mapOptions = {
	    zoom: 8,
	    center: latlng,
	    mapTypeId: google.maps.MapTypeId.ROADMAP
	  }
	  map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
	}

<<<<<<< HEAD
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
=======
	// draw the map
	google.maps.event.addDomListener(window, 'load', initialize);

>>>>>>> 63092ba33d90af8b314fab247336d6ff645ea250

});

<<<<<<< HEAD
	// set div parameters
	$('#'+navDiv).width(navWidth).height(navHeight);
	$('#'+mapDiv).width(mapWidth).height(mapHeight);
}
=======
// this function will geocode the address based off of imput from the user
function codeAddress() {
		
  var zipcode = document.getElementById('zipcode').value;
  geocoder.geocode( { 'address': zipcode}, function(results, status) {
    if (status == google.maps.GeocoderStatus.OK) {
    	//console.log("geom info "+results[0].geometry.location);
      var latLong = results[0].geometry.location
      map.setCenter(latLong);
      var marker = new google.maps.Marker({
          map: map,
          position: latLong
      });
    } else {
      alert('Geocode was not successful for the following reason: ' + status);
    }
  });
}


$("#haveAccount").click(function(){
	$("#haveAccount").addClass('hide');
	$("#searchByDonerInput").removeClass('hide');
});

$("#searchByDonerInputGo").click(function(){
	$("#searchByDonerInput").addClass('hide');
	$("#welcomeBack").removeClass('hide');
})

// do the address/zipcode search
$( "#zipcodeSearch" ).click(function() {
	codeAddress();
});





$("#search").click(function() {

	// filtered search will be called here

});

// clear the filters
$("#clearFilters").click(function(){
	$("clearFilters").attr("selected").clear;


});

//$("#e14_init").click(function() { $("#e14").select2(); });
//$("#e14_destroy").click(function() { $("#e14").select2("destroy"); });
   
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
>>>>>>> 63092ba33d90af8b314fab247336d6ff645ea250
