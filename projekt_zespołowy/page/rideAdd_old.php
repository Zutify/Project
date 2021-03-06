<!-- formularz logowania-->
<?php
include 'php/check_user_logged.php';
?>
<script src="js/addRide.js"></script>

<div class="container-fluid h-100" style="min-width: 250px;">
    <div class="w-100" style="height: 40%; max-height: 40%;">
        <div class="w-100 d-flex justify-content-between">
            <div class="d-inline-block mt-5 mb-5 ml-5">
                <a href="?page=menu" class="h4 text-dark">
                    <i class="fa fa-arrow-left" aria-hidden="true"></i>
                    Wstecz
                </a>
            </div>
            <div class="d-inline-block mr-5 mt-5">
                <button type="button" class="btn">
                    <a href="?page=sideMenu" class="text-body">
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
            <form action="../php/ride_add.php" method="post">
            <div class="w-75 mx-auto">
                <div class="mt-5 shadow p-3 mb-5 bg-light rounded">
                    <button type="button" class="btn btn-lg btn-block">
                        <div class="h3 text-left">
                            <div class="col-10">
                                <i class="fa fa-compass" style="font-size: 36px;"></i>
                                <input id="start" class="ml-3" placeholder="Miejsce wyjazdu" style="background: transparent; font-size: 40px; border:none; font-color: black;">
                            </div> 
                        </div>
                    </button>
                </div>
                <div class=" mt-5 shadow p-3 mb-5 bg-light rounded">
                    <button type="button" class="btn btn-lg btn-block">
                        <div class="h3 text-left">
                            <div class="col-10">
                                <i class="fa fa-search" style="font-size: 36px;"></i>
                                <input id="dest" class="ml-2" placeholder="Miejsce docelowe" style="background: transparent; font-size: 40px; border:none; font-color: black;">
                            </div>
                        </div>
                    </button>
                </div>
                <input type="submit" name="submit" id="addride" class="btn btn-success btn-block mb-5 justify-content-center" style="height: 120px; position: absolute; top:85%; width: 50%; left: 25%; z-index:2; font-size: 36px; display: none;" value="DODAJ PRZEJAZD">
            </div>
            </form>
        </div>
    </div>
    <div class="w-100" style="height: 60%; max-height: 60%;">
        <div id="map" class="container-fluid h-100"></div>
    </div>
</div>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAjEcMhdQW1b3g9R9JPn1ZNlzfm0WMm9EQ&libraries=places&callback=initMap"
        async defer></script>