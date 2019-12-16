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
        <div id="searchDiv" class="w-75 mx-auto">
            <form action="php/ride_add.php" method="POST">
                <div class=" my-5 shadow p-3 bg-light rounded">
                    <button id="startbtn" type="button" class="btn btn-lg btn-block">
                        <div class="h3 text-left">
                            <div class="col-12">
                                <i class="fa fa-search" style="font-size: 36px;"></i>
                                <input name="start" id="start" class="ml-2" placeholder="Miejsce wyjazdu" style="background: transparent; font-size: 40px; border:none; font-color: black; outline: none;">
                            </div>
                        </div>
                    </button>
                </div>
                <div class="mt-n5" id="startError" style="position: fixed; display: none;">
                    <label class="h4 text-danger" id="startErrorMsg">Pole nie może być puste</label>
                </div>
                <div class=" my-5 shadow p-3 bg-light rounded">
                    <button id="destbtn" type="button" class="btn btn-lg btn-block">
                        <div class="h3 text-left">
                            <div class="col-12">
                                <i class="fa fa-compass" style="font-size: 36px;"></i>
                                <input name="dest" id="dest" class="ml-2" placeholder="Miejsce docelowe" style="background: transparent; font-size: 40px; border:none; font-color: black; outline: none;">
                            </div>
                        </div>
                    </button>
                </div>
                <div class="mt-n5" id="destError" style="position: fixed; display: none;">
                    <label class="h4 text-danger" id="destErrorMsg">Pole nie może być puste</label>
                </div>
                
                <!-- przycisk do zmiany kolejności miejsc wyjazdu i docelowego-->
                <div style="top: 430px; right: 250px; position: absolute;">
                    <button type="button" onclick="changeInputsValue()" class="btn btn-lg btn-block">
                            <i class="fa fa-sync" id="changeInputs" style="font-size: 44px; transform: rotate(90deg); color: black;"></i>
                    </button>
                </div>
                
                <div class="mt-5 mb-2 d-flex justify-content-between">
                    <div class="row">
                        <div class="col-8 h2 mt-3">Ilość wolnych miejsc</div>
                        <div class="d-inline-block col-2 w-25 h3 mt-3">
                            <input id="seatsNumber" class="text-primary" type="number" min="0" max="10" name="places" placeholder="Ilość" style="border:none;">
                        </div>
                        <div class="col-8" id="seatsError" style="visibility: hidden;">
                            <label class="h4 text-danger">Pole nie może być puste</label>
                        </div>
                        
                        <div class="col-6 h2 mt-3 mr-n3">Data i godzina</div>
                        <input class="d-inline-block col-5 h3 text-primary border-0 mt-3 mr-n5" type="date" id="datePicker" name="tripStartDate" min="2019-01-01" max="2020-12-31">
                        <input class="d-inline-block col-3 h3 text-primary border-0 mt-3 mr-n5"type="time" id="timePicker" name="tripStartTime">
                        <div class="col-8" id="dateError" style="visibility: hidden;">
                            <label id="dateErrorMsg" class="h4 text-danger">Pola nie mogą być puste</label>
                        </div>
                    </div>
                    <div class="mt-5" id="btn-dalej">
                        <input id="checkdeststart" type="button" value="DALEJ" class="btn text-white btn-lg bg-primary py-2" style="width: 200px; font-size: 28px; border-radius: 30px;">
                        <input id="rideSubmit" type="submit" name="rideConfirm" class="mx-auto btn text-white btn-lg bg-primary py-2" style="width: 200px; font-size: 28px; border-radius: 30px; position: absolute; top: 80%; display: none;">
                    </div>
                </div>
            </form>
            
            <div class="border-bottom border-dark"></div>
            
            <div class="text-danger h3 mt-3">
                <?php
                session_start();
                if(isset($_SESSION['addError']))
                    {
                        echo $_SESSION['addError'];
                        unset($_SESSION['addError']);
                    }
                ?>
            </div>
            
        </div>
        <div id="recordDiv" class="w-75 mx-auto" style="display: none;">
            <li class="my-4 list-group-item shadow">
                    <div class="h3 p-4">
                        <div id="startRecord" class="d-inline-block">
                            
                        </div>
                        <i class="fa fa-arrow-right d-inline-block" aria-hidden="true"></i>
                        <div id="destRecord" class="d-inline-block">
                            
                        </div>
                        <!-- dolna cześć elementu listy z godziną i ilością miejsc-->
                        <div class="d-flex justify-content-between mt-3">
                            <div>
                                <div id="timeRecord" class="text-primary d-inline-block mr-4"></div>
                                <div id="dateRecord" class="text-primary d-inline-block">
                                </div>
                            </div>
                        <!-- ilość ikonek w zależności od ilości miejsc -->
                            <div id="seatsNumberRecord">
                                
                            </div>
                        </div>
                    </div>
            </li>
        </div>
    </div>
    <div>
    </div>
    <div id="mapdiv" style="position: absolute; top: 30%; height: 70%; width: 100%; visibility: hidden;">
        <div id="map" class="container-fluid h-100"></div>
        <button type="button" id="rideSubmitDummy" class="w-50 btn btn-success btn-block mb-5" style="height: 120px; position:absolute; top: 80%; left:25%; z-index: 10000;">
            <div class="h3">ZATWIERDŹ PRZEJAZD</div>
        </button>
    </div>
</div>

        
<script src="js/jquery.js"></script>
<script src="js/openSideMenu.js"></script>
<script src="js/changeInputsanimation.js"></script>
<script src="js/changeInputsValue.js"></script>
<script src="js/addRideForm.js"></script>
<script src="js/focusInputButtons.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAjEcMhdQW1b3g9R9JPn1ZNlzfm0WMm9EQ&libraries=places&callback=initMap"
        async defer></script>