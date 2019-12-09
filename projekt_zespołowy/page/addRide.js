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
  	}
    else {
    	marker.setVisible(true);
      markerdest.setVisible(true);
    }
  });
}