<!-- formularz logowania-->
<?php
session_start();
include 'php/check_user_logged.php';
include 'php/driver_data.php';
include 'php/ride_details.php';
include 'php/ride_actual.php';
checkRideInfo();

?>
<div class="container-fluid" style="min-width: 250px;">
    <div class="w-100 d-flex justify-content-between">
        <div class="d-inline-block mt-5 mb-5 ml-5">
            <!-- poprowadzenie linkiem do właściwej strony -->
            <?php
            if(isset($_SESSION['userRideInfo']))
            {
                // do aktualnych przejazdów użytkownika
                unset($_SESSION['userRideInfo']);
                if(isset($_SESSION['ridesProfile']))
                {
                    unset($_SESSION['ridesProfile']);
                    echo '
                    <a href="?page=currentRides" class="h4 text-dark">
                        <i class="fa fa-arrow-left" aria-hidden="true"></i>
                            Wstecz
                    </a>';
                }
                else
                {
                    // do aktualnych wszystkich przejazdów
                    echo '
                    <a href="?page=ridesList" class="h4 text-dark">
                        <i class="fa fa-arrow-left" aria-hidden="true"></i>
                            Wstecz
                    </a>';
                }
            }
            else
            {
                // do wyszukiwania przejazdu
                echo '
                <a href="?page=rideInfo" class="h4 text-dark">
                    <i class="fa fa-arrow-left" aria-hidden="true"></i>
                        Wstecz
                </a>';
            }
            ?>
        </div>
    </div>
    
    <div class="container-fluid mt-5">
        <div class="mx-5">
            <div class="h3 p-4">
                <div id class="d-inline-block">
                    <?php
                        if(isset($_SESSION['start']))
                        {
                            echo $_SESSION['start'];
                        }
                        else
                        {
                            echo 'błąd';
                        }
                    ?>
                </div>
                <i class="fa fa-arrow-right d-inline-block" aria-hidden="true"></i>
                <div id class="d-inline-block">
                    <?php
                        if(isset($_SESSION['dest']))
                        {
                            echo $_SESSION['dest'];
                        }
                        else
                        {
                            echo 'błąd';
                        }
                    ?>
                </div>
                <!-- dolna cześć elementu listy z godziną i ilością miejsc-->
                <div class="d-flex justify-content-between mt-3">
                    <div id="" class="text-primary d-inline-block">
                        <?php
                        if(isset($_SESSION['rideInfo']))
                        {
                            $row = $_SESSION['rideInfo'];
                            echo $row['Date'].'   ';
                            if($row['LeavingTime'][0] == "0")
                                echo substr($row['LeavingTime'], 1, 4);
                            else
                            echo substr($row['LeavingTime'], 0, 5);
                        }           
                        ?>
                    </div>
                    <!-- ilość ikonek w zależności od ilości miejsc -->
                    <div>
                        <?php
                        if(isset($_SESSION['rideInfo']))
                        {
                            $row = $_SESSION['rideInfo'];
                            showCarPlaces($row);
                        }
                        ?>
                    </div>
                </div>
            </div>
            
            <!-- wyświetla informacje o kierowcy  -->
            <?php
            if(isset($_SESSION['rideInfo']))
            {
                $row = $_SESSION['rideInfo'];
                driverInfo($row['Driver'], $row['Status'], $row['ID']);
            }
            ?>
            <div class="border-bottom border-dark"></div>
            <div class="d-flex justify-content-end mt-2">
                <div class="h3">
                    <a id="show" class="text-body">
                        Pokaż trasę na mapie
                    </a>
                </div>
            </div>
            <button type="button" id="navigateBtn" class="w-50 btn btn-success btn-block mb-5" style="height: 80px; position:absolute; top: 90%; left:25%; z-index: 10000; display: none">
                <div class="h3">Nawiguj do punktu startowego</div>
            </button>
        </div>
    </div>
</div>
<input id="start" style="display: none" value="<?php echo $_SESSION['start']; ?>">
            <input id="dest" style="display: none" value="<?php echo $_SESSION['dest']; ?>">
            <div id="mapdiv" style="position: absolute; top: 56%; height: 44%; width: 100%; visibility: hidden;">
                <div id="map" class="container-fluid h-100"></div>
                
            </div>

<script src="js/jquery.js"></script>
<script src="js/showRide.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAjEcMhdQW1b3g9R9JPn1ZNlzfm0WMm9EQ&libraries=places&callback=initMap"
        async defer></script>