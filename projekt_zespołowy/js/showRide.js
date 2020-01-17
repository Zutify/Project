$(document).ready(function () {
    $('#show').on('click', function(){
        document.getElementById('mapdiv').style.visibility = "visible";
        document.getElementById('show').style.display = "none";
        document.getElementById('navigateBtn').style.display = "block";
        initMap();
    });
    $('#navigateBtn').on('click', function(){
        userstartroute();
    });
});
var m;
function initMap() {
        var directionsService = new google.maps.DirectionsService();
        var directionsRenderer = new google.maps.DirectionsRenderer();
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 7,
          center: {lat: 41.85, lng: -87.65}
        });
        m = map;
        directionsRenderer.setMap(map);


        calculateAndDisplayRoute(directionsService, directionsRenderer);
      }

function calculateAndDisplayRoute(directionsService, directionsRenderer) {
    directionsService.route(
        {
              origin: {query: document.getElementById('start').value},
              destination: {query: document.getElementById('dest').value},
              travelMode: 'DRIVING'
            },
            function(response, status) {
              if (status === 'OK') {
                directionsRenderer.setDirections(response);
              } else {
                window.alert('Directions request failed due to ' + status);
              }
            });
      }


function userstartroute()	{
  var userloc;
  
  if (navigator.geolocation) {
  	navigator.geolocation.getCurrentPosition(function(position) {
			userloc = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
      draw_user_route(userloc);
    });
    setInterval(function() {
    	var last_marker;
    	var userloc_marker_pos;
			navigator.geolocation.getCurrentPosition(function(position) {
				userloc_marker_pos = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
    		var userloc_marker = new google.maps.Marker({
    			map: m,
    			anchorPoint: userloc_marker_pos,
    			icon: "https://i.imgur.com/i5ESgbh.png"
  			});
    		userloc_marker.setPosition(userloc_marker_pos);
        if(typeof last_marker !== 'undefined') {
        	last_marker.setMap(null)
        }
        last_marker = userloc_marker;
        //document.getElementById("debug").innerHTML = "OK";
        //document.getElementById("debug2").innerHTML = userloc_marker.getPosition();
        m.setCenter(userloc_marker.getPosition());
        m.setZoom(17);
			});
    }, 2000);
  } 
  else {
  	// Browser doesn't support Geolocation
  	handleLocationError(false, infoWindow, map.getCenter());
  }
}

function draw_user_route(ul){

	var directionsService = new google.maps.DirectionsService();
	var directionsDisplay = new google.maps.DirectionsRenderer();
	var request = {
    origin: ul,
    destination: {query: document.getElementById('start').value},
    travelMode: 'WALKING'
  };
  directionsService.route(request, function(result, status){
   if (status == "OK") {
     directionsDisplay.setDirections(result);
     directionsDisplay.setMap(m);
    }
  })
}

function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(browserHasGeolocation ?
                              'Error: The Geolocation service failed.' :
                              'Error: Your browser doesn\'t support geolocation.');
        infoWindow.open(map);
      }