<!-- formularz logowania-->
<?php
include 'php/check_user_logged.php';
//include 'php/reset_ride_search.php';
include 'php/ride_add.php';
unsetRideAddVariables();
?>
<script src="js/addRide.js"></script>
<script src="js/changeInputsValue.js"></script>
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
<div id="sideMenu" style="width:70%; position: absolute; left:30%; background-color: #f8f9fa; height: 100%; display: none; z-index: 10000;">
    </div>
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
        
        <!-- kontener zawierający treść pod nagłówkiem -->
        <div class="w-75 mx-auto">
            <form action="php/ride_add.php" method="POST">
                <div class=" my-5 shadow p-3 bg-light rounded">
                    <button type="button" class="btn btn-lg btn-block">
                        <div class="h3 text-left">
                            <div class="col-10">
                                <i class="fa fa-search" style="font-size: 36px;"></i>
                                <input name="start" id="start" class="ml-2" placeholder="Miejsce wyjazdu" style="background: transparent; font-size: 40px; border:none; font-color: black;">
                            </div>
                        </div>
                    </button>
                </div>
                <div class=" my-5 shadow p-3 bg-light rounded">
                    <button type="button" class="btn btn-lg btn-block">
                        <div class="h3 text-left">
                            <div class="col-10">
                                <i class="fa fa-compass" style="font-size: 36px;"></i>
                                <input name="dest" id="dest" class="ml-2" placeholder="Miejsce docelowe" style="background: transparent; font-size: 40px; border:none; font-color: black;">
                            </div>
                        </div>
                    </button>
                </div>
                
                <!-- przycisk do zmiany kolejności miejsc wyjazdu i docelowego-->
                <div class="position-fixed" style="top: 430px; right: 250px;">
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
            
            <table class="table-borderless w-100">
                <tr>
                    <td class="">
                        <div class="h3 my-4">
                            <i class="fa fa-star" aria-hidden="true" style="font-size: 36px;"></i>
                            <a href="" class="ml-3 text-dark">Ulubione miejsca</a>
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
                            <a href="" class="ml-3 text-dark">Aktualne przejazdy</a>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="">
                        <div class="h3 my-4 ml-1">
                            <i class="fa fa-plus" aria-hidden="true" style="font-size: 36px;"></i>
                            <a href="" class="ml-3 text-dark">Dodaj przejazd</a>
                        </div>
                    </td>
                </tr>
            </table>
            <div id="map"></div>
        </div>
        
        
    </div>
    <div id="XD"></div>
</div>
<script>
    var button = document.getElementById('btn-dalej');
    button.addEventListener("click", function(){
        alert("Hello World!"); 
        document.getElementById("XD").innerHTML='<object type="type/php" data="rideAdd.php" ></object>';
    });
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAjEcMhdQW1b3g9R9JPn1ZNlzfm0WMm9EQ&libraries=places&callback=initMap"
        async defer></script>
        
<script src="js/jquery.js"></script>
<script src="js/openSideMenu.js"></script>
<script src="js/changeInputsanimation.js"></script>