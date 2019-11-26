<!-- formularz logowania-->
<?php
session_start();
include '../php/form_view.php';
include '../php/detectmobilebrowser.php';
include '../php/db_connection.php';
include '../php/check_user_logged.php';
?>
<!-- dodane pliki do stylizowania i możliwości używania ikonek  -->
<link rel="stylesheet" type="text/css" href="../style/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- ikonek można szukać na stronie : 
https://fontawesome.com/v4.7.0/icon/
-->
<script src="../js/addRide.js"></script>
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