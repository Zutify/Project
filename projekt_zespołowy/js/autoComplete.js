$(document).ready(function () {

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
    var address = '';
    if (place.address_components) {
        address = [
            (place.address_components[0] && place.address_components[0].short_name || ''),
            (place.address_components[1] && place.address_components[1].short_name || ''),
            (place.address_components[2] && place.address_components[2].short_name || '')
        ].join(' ');
    }
});

autocompletedest.addListener('place_changed', function() {
    infowindow.close();
    var placedest = autocompletedest.getPlace();
    if (!placedest.geometry) {
        locsetdest = false;
        // User entered the name of a Place that was not suggested and
        // pressed the Enter key, or the Place Details request failed.
        window.alert("No details available for input: '" + placedest.name + "'");
        return;
    }
    var addressdest = '';
    if (placedest.address_components) {
        addressdest = [
            (placedest.address_components[0] && placedest.address_components[0].short_name || ''),
            (placedest.address_components[1] && placedest.address_components[1].short_name || ''),
            (placedest.address_components[2] && placedest.address_components[2].short_name || '')
        ].join(' ');
    }
    
});
});