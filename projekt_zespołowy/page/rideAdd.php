<!-- formularz logowania-->
<?php
include 'php/check_user_logged.php';
//include 'php/reset_ride_search.php';
include 'php/ride_add.php';
unsetRideAddVariables();
?>

<style>
.pac-item{
    height: 40px;
    font-size: 26px;
    padding-top: 7px;
}
.pac-item-query{
    font-size: 26px;
}
.pac-icon{

}
</style>
<script src="js/addRide.js"></script>
<div class="container-fluid" style="min-width: 250px;">
    <div class="w-100 d-flex justify-content-end">
        <div class="d-inline-block mr-5 mt-5" id="btn-side-menu">
            <button type="button" class="btn">
                    <i class="fa fa-bars" aria-hidden="true" style="font-size: 64px;"></i>
            </button>
        </div>
    </div>
    
    <div class="w-100 h-50" style="min-height: 50vh">
        
        <div class="ml-5 mt-5">
            <div class="display-2" ><strong>Dokąd jedziemy?</strong></div>
        </div>
        
        <!-- kontener zawierający treść pod nagłówkiem -->
        <div class="w-75 mx-auto">
            <form action="php/ride_add.php" method="POST">
                <div class=" my-5 shadow p-3 bg-light rounded">
                    <button type="button" class="btn btn-lg btn-block">
                        <div class="h3 text-left">
                            <div class="col-12">
                                <i class="fa fa-search" style="font-size: 36px;"></i>
                                <input name="start" id="start" class="ml-2" placeholder="Miejsce wyjazdu" style="background: transparent; font-size: 40px; border:none; font-color: black;">
                            </div>
                        </div>
                    </button>
                </div>
                <div class=" my-5 shadow p-3 bg-light rounded">
                    <button type="button" class="btn btn-lg btn-block">
                        <div class="h3 text-left">
                            <div class="col-12">
                                <i class="fa fa-compass" style="font-size: 36px;"></i>
                                <input name="dest" id="dest" class="ml-2" placeholder="Miejsce docelowe" style="background: transparent; font-size: 40px; border:none; font-color: black;">
                            </div>
                        </div>
                    </button>
                </div>
                
                <!-- przycisk do zmiany kolejności miejsc wyjazdu i docelowego-->
                <div style="top: 430px; right: 250px; position: absolute;">
                    <button type="button" onclick="changeInputsValue()" class="btn btn-lg btn-block">
                            <i class="fa fa-sync" id="changeInputs" style="font-size: 44px; transform: rotate(90deg); color: black;"></i>
                    </button>
                </div>
                
                <div class="my-5 d-flex justify-content-between">
                    <div class="row">
                        <div class="col-8 h2">Ilość wolnych miejsc</div>
                        <div class="d-inline-block col-2 w-25 h2">
                            <input type="number" min="0" max="10" name="places" placeholder="Ilość" style="border:none;">
                        </div>
                        
                        <div class="col-8 h2">Data i godzina</div>
                        <div class="col-8 h3 text-primary">
                            Dzisiaj : <div class="d-inline-block" id="hour" name="hour">9:27</div>
                        </div>
                    </div>
                    <div class="mt-3" id="btn-dalej">
                        <input type="submit" value="DALEJ" name="submit" class="btn text-white btn-lg bg-primary py-2" style="width: 200px; font-size: 28px; border-radius: 30px;">
                    </div>
                </div>
            </form>
            
            <div class="border-bottom border-dark"></div>
            
            
            
        </div>
    </div>
    <div id="mapdiv" style="position: absolute; top: 40%; height: 60%; width: 100%; display: none;">
        <div id="map" class="container-fluid h-100"></div>
    </div>
</div>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAjEcMhdQW1b3g9R9JPn1ZNlzfm0WMm9EQ&libraries=places&callback=initMap"
        async defer></script>
        
<script src="js/jquery.js"></script>
<script src="js/openSideMenu.js"></script>
<script src="js/changeInputsanimation.js"></script>

<script src="js/changeInputsValue.js"></script>