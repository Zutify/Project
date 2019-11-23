<!-- formularz logowania-->
<?php
session_start();
include '../php/form_view.php';
include '../php/detectmobilebrowser.php';
include '../php/db_connection.php';
?>
<!-- dodane pliki do stylizowania i możliwości używania ikonek  -->
<link rel="stylesheet" type="text/css" href="../style/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- ikonek można szukać na stronie : 
https://fontawesome.com/v4.7.0/icon/
-->
<script>
    function initMap() {
	var locsetstart, locsetdest;
	var directionsService = new google.maps.DirectionsService();
	var directionsDisplay = new google.maps.DirectionsRenderer();
  var map = new google.maps.Map(document.getElementById('map'), {
    center: {lat: 53.42795, lng: 14.553189},
    zoom: 13
  });
  var input = document.getElementById('start');
	var inputdest = document.getElementById('dest');
  
  var autocomplete = new google.maps.places.Autocomplete(input);
	var autocompletedest = new google.maps.places.Autocomplete(inputdest);
  // Bind the map's bounds (viewport) property to the autocomplete object,
  // so that the autocomplete requests use the current map bounds for the
  // bounds option in the request.
  // Set the data fields to return when the user selects a place.
  autocomplete.setFields(
      ['address_components', 'geometry', 'icon', 'name']);
	autocompletedest.setFields(['address_components', 'geometry', 'icon', 'name']);
  
  var infowindow = new google.maps.InfoWindow();
  var infowindowContent = document.getElementById('infowindow-content');
  infowindow.setContent(infowindowContent);
  var marker = new google.maps.Marker({
    map: map,
    anchorPoint: new google.maps.Point(0, -29)
  });

	var markerdest = new google.maps.Marker({
    map: map,
    anchorPoint: new google.maps.Point(0, -29)
  }); 
  m = map;
  autocomplete.addListener('place_changed', function() {
    infowindow.close();
    //marker.setVisible(false);
    var place = autocomplete.getPlace();
    if (!place.geometry) {
    	locsetstart = false;
      // User entered the name of a Place that was not suggested and
      // pressed the Enter key, or the Place Details request failed.
      window.alert("No details available for input: '" + place.name + "'");
      return;
    }
    locsetstart = true;
    // If the place has a geometry, then present it on a map.
    if (place.geometry.viewport) {
      map.fitBounds(place.geometry.viewport);
    } else {
      map.setCenter(place.geometry.location);
      map.setZoom(14);  // Why 17? Because it looks good.
    }
    marker.setPosition(place.geometry.location);
    
    mark = marker;
    
    var address = '';
    if (place.address_components) {
      address = [
        (place.address_components[0] && place.address_components[0].short_name || ''),
        (place.address_components[1] && place.address_components[1].short_name || ''),
        (place.address_components[2] && place.address_components[2].short_name || '')
      ].join(' ');
    }
    if (locsetstart && locsetdest) {
    	marker.setVisible(false);
      markerdest.setVisible(false);
  		var request = {
    		origin: marker.position,
      	destination: markerdest.position,
      	travelMode: 'DRIVING'
    	};
    	directionsService.route(request, function(result, status){
    		if (status == "OK") {
      		directionsDisplay.setDirections(result);
          directionsDisplay.setMap(map);
     	 }
    	})
    	document.getElementById('addride').style.display="block";
    	//show_button();
  	}
    else	{
    	marker.setVisible(true);
      markerdest.setVisible(true);
    }
  });

	autocompletedest.addListener('place_changed', function() {
    infowindow.close();
    //marker.setVisible(false);
	
  	var placedest = autocompletedest.getPlace();
    if (!placedest.geometry) {
    	locsetdest = false;
      // User entered the name of a Place that was not suggested and
      // pressed the Enter key, or the Place Details request failed.
      window.alert("No details available for input: '" + placedest.name + "'");
      return;
    }
    
    locsetdest = true;
     // If the place has a geometry, then present it on a map.
    if (placedest.geometry.viewport) {
      map.fitBounds(placedest.geometry.viewport);
    } else {
      map.setCenter(placedest.geometry.location);
      map.setZoom(14);  // Why 17? Because it looks good.
    }
    markerdest.setPosition(placedest.geometry.location);
    //marker.setVisible(true);
    //directionsDisplay.setMap(map);
		var addressdest = '';
    if (placedest.address_components) {
      addressdest = [
        (placedest.address_components[0] && placedest.address_components[0].short_name || ''),
        (placedest.address_components[1] && placedest.address_components[1].short_name || ''),
        (placedest.address_components[2] && placedest.address_components[2].short_name || '')
      ].join(' ');
    }
    
		if (locsetstart && locsetdest) {
    	marker.setVisible(false);
      markerdest.setVisible(false);
  		var request = {
    		origin: marker.position,
      	destination: markerdest.position,
      	travelMode: 'DRIVING'
    	};
    	directionsService.route(request, function(result, status){
    		if (status == "OK") {
      		directionsDisplay.setDirections(result);
          directionsDisplay.setMap(map);
     	 }
    	})
    	document.getElementById('addride').style.display="block";
    	//show_button();
  	}
    else {
    	marker.setVisible(true);
      markerdest.setVisible(true);
    }
  });
}
</script>   
<div class="container-fluid h-100" style="min-width: 250px;">
    <div class="w-100" style="height: 40%; max-height: 40%;">
        <div class="w-100 d-flex justify-content-between">
            <div class="d-inline-block mt-5 mb-5 ml-5">
                <a href="../page/menu.php" class="h4 text-dark">
                    <i class="fa fa-arrow-left" aria-hidden="true"></i>
                    Wstecz
                </a>
            </div>
            <div class="d-inline-block mr-5 mt-5">
                <button type="button" class="btn">
                    <a href="../page/sideMenu.php" class="text-body">
                        <i class="fa fa-bars" aria-hidden="true" style="font-size: 64px;"></i>
                    </a>
                </button>
            </div>
        </div>
        
        <div class="w-100 ">
            
            <div class="ml-5 mt-5">
                <div class="display-2" ><strong>Dodaj przejazd</strong></div>
            </div>
            
            <!-- kontener zawierający opcje do wyboru pod mapą -->
            <div class="w-75 mx-auto">
                <div class="mt-5 shadow p-3 mb-5 bg-light rounded">
                    <button type="button" class="btn btn-lg btn-block">
                        <div class="h3 text-left">
                            <div class="col-10">
                                <i class="fa fa-compass" style="font-size: 36px;"></i>
                                <input id="start" class="ml-3" placeholder="Miejsce wyjazdu" style="background: transparent; font-size: 24pt; border:none; font-color: black;">
                            </div> 
                        </div>
                    </button>
                </div>
                <div class=" mt-5 shadow p-3 mb-5 bg-light rounded">
                    <button type="button" class="btn btn-lg btn-block">
                        <div class="h3 text-left">
                            <div class="col-10">
                                <i class="fa fa-search" style="font-size: 36px;"></i>
                                <input id="dest" class="ml-2" placeholder="Miejsce docelowe" style="background: transparent; font-size: 24pt; border:none; font-color: black;">
                            </div>
                        </div>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="w-100" style="height: 60%; max-height: 60%;">
        <div id="map" class="container-fluid h-100"></div>
    </div>
    <button type="button" id="addride" class="btn btn-success btn-block mb-5 justify-content-center" style="height: 120px; position: absolute; top:85%; width: 50%; left: 25%; display: none;">
        <a href="../page/rideAdd.php" class="text-white h3">
        DODAJ PRZEJAZD
        </a>
    </button>
</div>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAjEcMhdQW1b3g9R9JPn1ZNlzfm0WMm9EQ&libraries=places&callback=initMap"
        async defer></script>