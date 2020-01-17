$(document).ready( function() {
    var test = "Szczecin, Polska";
    var startval = 0;
    var destval = 0;
    var directionsService = new google.maps.DirectionsService();
    // ustawienie aktualnej daty i czasu
    var date = new Date();
    document.getElementById('datePicker').valueAsDate = date;
    $('#timePicker').val(date.toLocaleString('pl-PL', { timeZone: 'Europe/Warsaw' , timeStyle: 'short'}));
    //$('#datePicker').val(date.toLocaleString('pl-PL', { timeZone: 'Europe/Warsaw' , dateStyle: 'short'}));
    // walidacja wypełnienia pól
    $('#checkdeststart').on('click', function(){
        var requeststart = {
            origin: {query:document.getElementById('start').value},
            destination: {query:test},
            travelMode: 'DRIVING'
        };
        if (!$('#start').val()){
            document.getElementById("startErrorMsg").innerHTML = "Pole nie może być puste";
            document.getElementById("startError").style.display = "block";   
        }
        else {
            directionsService.route(requeststart, function(result, status) {
                if (status == 'OK') {
                    startval = 1;
                    document.getElementById("startError").style.display = "none";
                }
                else{
                    startval = 0;
                    document.getElementById("startErrorMsg").innerHTML = "Miejsce należy wybrać z rozwijanej listy";
                    document.getElementById("startError").style.display = "block";
                }
            });
        }
        var requestdest = {
            origin: {query:test},
            destination: {query:document.getElementById('dest').value},
            travelMode: 'DRIVING'
        };
        if (!$('#dest').val()){
            document.getElementById("startErrorMsg").innerHTML = "Pole nie może być puste";
            document.getElementById("destError").style.display = "block";
        }
        else{
            directionsService.route(requestdest, function(result, status) {
                if (status == 'OK') {
                    destval = 1;
                    document.getElementById("destError").style.display = "none";
                }
                else{
                    destval = 0;
                    document.getElementById("destErrorMsg").innerHTML = "Miejsce należy wybrać z rozwijanej listy";
                    document.getElementById("destError").style.display = "block";
                }
            });
        }
        if (!$('#datePicker').val() && !$('#timePicker').val()){
            document.getElementById("dateError").style.visibility = "visible";
            document.getElementById("dateErrorMsg").innerHTML = "Pola nie mogą być puste";
        }
        else if (!$('#datePicker').val()){
            document.getElementById("dateError").style.visibility = "visible";
            document.getElementById("dateErrorMsg").innerHTML = "Pole data nie może być puste";
        }
        else if (!$('#timePicker').val()){
            document.getElementById("dateError").style.visibility = "visible";
            document.getElementById("dateErrorMsg").innerHTML = "Pole czas nie może być puste";
        }
        else{
            document.getElementById("dateError").style.visibility = "hidden";
        }
        if (!$('#seatsNumber').val()){
            document.getElementById("seatsError").style.visibility = "visible";
            document.getElementById("seatsErrorMsg").innerHTML = "Pole czas nie może być puste";
        }
        else if($('#seatsNumber').val() <= 0 || $('#seatsNumber').val() >10) {
            document.getElementById("seatsError").style.visibility = "visible";
            document.getElementById("seatsErrorMsg").innerHTML = "Niepoprawna ilość miejsc";
        } 
        else {
            document.getElementById("seatsError").style.visibility = "hidden";
        }
        // po poprawnej walidacji
        if($('#dest').val() && $('#start').val() && $('#seatsNumber').val() && $('#datePicker').val() && $('#timePicker').val() && startval && destval){
            document.getElementById("mapdiv").style.visibility = "visible";
            document.getElementById("searchDiv").style.display = "none";
            document.getElementById("recordDiv").style.display = "block";
            document.getElementById("rideSubmitDummy").style.display = "block";
            $('#startRecord').html($("#start").val());
            $('#destRecord').html($("#dest").val());
            $('#timeRecord').html($("#timePicker").val());
            $('#dateRecord').html($("#datePicker").val());
            for(var i = 0; i < $("#seatsNumber").val(); i++){
                $('#seatsNumberRecord').append("<i class='fa fa-male d-inline-block mx-1' aria-hidden='true' style='font-size: 52px; color:green;'></i>")
            }
        }
    });
    $('#recordDiv').on('click', function(){
        document.getElementById("mapdiv").style.visibility = "hidden";
        document.getElementById("searchDiv").style.display = "block";
        document.getElementById("recordDiv").style.display = "none";
        document.getElementById("rideSubmitDummy").style.display = "none";
        for(var i = 0; i < $("#seatsNumber").val(); i++){
                $('#seatsNumberRecord *').detach();
        }
    });
    $('#rideSubmitDummy').on('click', function(){
        document.getElementById("rideSubmit").click();
    });
});