$(document).ready( function() {
    // ustawienie aktualnej daty i czasu
    var date = new Date();
    document.getElementById('datePicker').valueAsDate = date;
    $('#timePicker').val(date.toLocaleString('pl-PL', { timeZone: 'Europe/Warsaw' , timeStyle: 'short'}));
    //$('#datePicker').val(date.toLocaleString('pl-PL', { timeZone: 'Europe/Warsaw' , dateStyle: 'short'}));
    // walidacja wypełnienia pól
    $('#checkdeststart').on('click', function(){
        if (!$('#start').val()){
            document.getElementById("startError").style.display = "block";   
        }
        else {
            document.getElementById("startError").style.display = "none";   
        }
        if (!$('#dest').val()){
            document.getElementById("destError").style.display = "block";
        }
        else{
            document.getElementById("destError").style.display = "none";
        }
        if (!$('#datePicker').val() && !$('#timePicker').val()){
            document.getElementById("dateError").style.visibility = "visible";
            document.getElementById("dateErrorMsg").innerHTML = "Pola nie mogą być puste";
        }
        else{
            document.getElementById("dateError").style.visibility = "hidden";
        }
        if (!$('#datePicker').val()){
            document.getElementById("dateError").style.visibility = "visible";
            document.getElementById("dateErrorMsg").innerHTML = "Pole data nie może być puste";
        }
        else{
            document.getElementById("dateError").style.visibility = "hidden";
        }
        if (!$('#timePicker').val()){
            document.getElementById("dateError").style.visibility = "visible";
            document.getElementById("dateErrorMsg").innerHTML = "Pole czas nie może być puste";
        }
        else{
            document.getElementById("dateError").style.visibility = "hidden";
        }
        if (!$('#seatsNumber').val()){
            document.getElementById("seatsError").style.visibility = "visible";
        }
        else{
            document.getElementById("seatsError").style.visibility = "hidden";
        }
        // po poprawnej walidacji
        if($('#dest').val() && $('#start').val() && $('#seatsNumber').val() && $('#datePicker').val() && $('#timePicker').val()){
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