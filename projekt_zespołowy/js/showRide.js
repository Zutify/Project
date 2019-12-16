$(document).ready(function () {
    $('#show').on('click', function(){
        document.getElementById('mapdiv').style.visibility = "visible";
        document.getElementById('show').style.display = "none";
        initMap();
    });
      
});
function initMap() {
        var directionsService = new google.maps.DirectionsService();
        var directionsRenderer = new google.maps.DirectionsRenderer();
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 7,
          center: {lat: 41.85, lng: -87.65}
        });
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