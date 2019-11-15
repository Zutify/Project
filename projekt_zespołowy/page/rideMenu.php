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

<div class="container-fluid" style="min-width: 250px;">
    <div class="w-100 h-50 " id="googleMap">
        <script>
            function myMap() {
            var mapProp= {
              center:new google.maps.LatLng(53.4344,14.5410),
              zoom:13,
            };
            var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
            }
        </script>
        
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAjEcMhdQW1b3g9R9JPn1ZNlzfm0WMm9EQ&callback=myMap"></script>
    </div>
    
    <div class="w-100 h-50">
        
        <div class="ml-5 mt-5">
            <div class="h2">Dokąd jedziemy?</div>
        </div>
        
        <!-- kontener zawierający opcje do wyboru pod mapą -->
        <div class="w-75 mx-auto">
            <div class="text-center mt-5 shadow p-3 mb-5 bg-white rounded">
                <button type="button" class="btn btn-lg btn-block">
                    <div class="h3">
                        <i class="fa fa-search" style="font-size: 36px;"></i>
                        <a href=""class=" ml-3 text-dark">
                            Szukaj miejsca docelowego
                        </a>
                    </div>
                </button>
            </div>
            
            <div class="my-5">
                <div class="h4">
                    <a href=""class="text-dark">
                        Pokaż kierowców w pobliżu
                    </a>
                </div>
            </div>
            
            <table class="table-borderless w-100">
                <tr>
                    <td class="border-bottom border-dark">
                        <div class="h3 my-4">
                            <i class="fa fa-star" aria-hidden="true" style="font-size: 36px;"></i>
                            <a href="" class="ml-3 text-dark">Ulubione miejsca</a>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="border-bottom border-dark">
                        <div class="h3 my-4 ml-2"> 
                            <i class="fa fa-map-marker" aria-hidden="true" style="font-size: 36px;"></i>
                            <a href="" class="ml-3 text-dark">Ostatnio wyszukiwane</a>
                            </div>
                    </td>
                </tr>
                <tr>
                    <td class="border-bottom border-dark">
                        <div class="h3 my-4">
                            <i class="fa fa-car" aria-hidden="true" style="font-size: 28px;"></i>
                            <a href="" class="ml-3 text-dark">Aktualne przejazdy</a>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="border-bottom border-dark">
                        <div class="h3 my-4 ml-2">
                            <i class="fa fa-plus" aria-hidden="true" style="font-size: 28px;"></i>
                            <a href="" class="ml-3 text-dark">Dodaj przejazd</a>
                        </div>
                    </td>
                </tr>
            </table>
            
        </div>
        
        
    </div>
</div>