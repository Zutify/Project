<!-- formularz logowania-->
<?php
include 'php/db_connection.php';
session_start();
include 'php/check_user_logged.php';
include 'php/reset_ride_search.php';
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
<div class="container-fluid" style="min-width: 250px;">
    <div class="w-100 d-flex justify-content-end">
        <div class="d-inline-block mr-5 mt-5" id="btn-side-menu">
            <button type="button" class="btn">
                <!--<a href="?page=sideMenu" class="text-body">-->
                    <i class="fa fa-bars" aria-hidden="true" style="font-size: 64px;"></i>
                <!--</a>-->
            </button>
        </div>
    </div>
    
    <div class="w-100 h-50" style="min-height: 50vh">
        
        <div class="ml-5 mt-5">
            <div class="display-2" ><strong>Dokąd jedziemy?</strong></div>
        </div>
        
        <!-- kontener zawierający opcje do wyboru pod mapą -->
        <div class="w-75 mx-auto">
            <form action="php/ride_info_handle.php" method="POST">
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
                    <button type="button" id="destbtn" class="btn btn-lg btn-block">
                        <div class="h3 text-left">
                            <div class="col-12">
                                <i class="fa fa-compass" style="font-size: 36px;"></i>
                                <?php
                                if(isset($_GET['address']))
                                {
                                    $destID = $_GET['address'];
                                    $address = "SELECT `Street` FROM Address WHERE `ID` = $destID";
                        
                                    // jeśli istnieją to wyświetlić adresy
                                    $street = $conn->query($address);
                                    if ($street->num_rows > 0) {
                                        $result = $street->fetch_assoc();
                                        echo'
                                        <input name="dest" id="dest" class="ml-2" placeholder="Miejsce docelowe" style="background: transparent; font-size: 40px; border:none; font-color: black; outline: none;">';
                                    }
                                    else
                                        echo "błąd";
                                }
                                else
                                {
                                echo'
                                    <input name="dest" id="dest" class="ml-2" placeholder="Miejsce docelowe" style="background: transparent; font-size: 40px; border:none; font-color: black;outline: none;">';
                                    
                                }
                                ?>
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
                        <!--<div class="h3 text-center pt-2 bg-white rounded-circle" style="width: 60px; height: 60px;">-->
                            <i class="fa fa-sync" id="changeInputs" style="font-size: 44px; transform: rotate(90deg); color: black;"></i>
                        <!--</div>-->
                    </button>
                </div>
                
                <div class="my-5 d-flex justify-content-between">
                    <div class="row">
                        <div class="col-12 h2 mt-3 mr-n3">Data i godzina</div>
                        <input class="col-5 h3 text-primary border-0 mt-3 mr-n5" type="date" id="datePicker" name="tripStartDate" min="2019-01-01" max="2020-12-31">
                        <input class="col-3 h3 text-primary border-0 mt-3 mr-n5"type="time" id="timePicker" name="tripStartTime">
                        <div class="col-8" id="dateError" style="visibility: hidden;">
                            <label id="dateErrorMsg" class="h4 text-danger">Pola nie mogą być puste</label>
                        </div>
                    </div>
                    <div class="mt-5" id="btn-dalej">
                        <input id="dalejDummy" value="SZUKAJ" class="btn text-white btn-lg bg-primary" style="width: 200px; font-size: 28px; border-radius: 30px;">
                        <input id="dalejSubmit" type="submit" value="SZUKAJ" name="submit" class="btn text-white btn-lg bg-primary" style="width: 200px; font-size: 28px; border-radius: 30px; display: none;">
                    </div>
                </div>
            </form>
            
            <div class="border-bottom border-dark"></div>
            
            <table class="table-borderless w-100">
                <tr>
                    <td class="">
                        <div class="h3 my-4">
                            <i class="fa fa-star" aria-hidden="true" style="font-size: 36px;"></i>
                            <a href="?page=favouritePlaces" class="ml-3 text-dark">Ulubione miejsca</a>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="">
                        <div class="h3 my-4 ml-1"> 
                            <i class="fa fa-map-marker-alt" aria-hidden="true" style="font-size: 36px;"></i>
                            <a href="" class="ml-3 text-dark">Ostatnio wyszukiwane</a>
                            </div>
                    </td>
                </tr>
                <tr>
                    <td class="">
                        <div class="h3 my-4">
                            <i class="fa fa-car" aria-hidden="true" style="font-size: 36px;"></i>
                            <a href="?page=ridesList" class="ml-3 text-dark">Aktualne przejazdy</a>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>
        
<script src="js/jquery.js"></script>
<script src="js/openSideMenu.js"></script>
<script src="js/rideMenuForm.js"></script>
<script src="js/focusInputButtons.js"></script>
<script src="js/changeInputsanimation.js"></script>
<script src="js/autoComplete.js"></script>
<script src="js/changeInputsValue.js"></script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAjEcMhdQW1b3g9R9JPn1ZNlzfm0WMm9EQ&libraries=places&callback=initMap"
        async defer></script>