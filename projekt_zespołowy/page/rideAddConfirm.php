<!-- formularz logowania-->
<?php
include 'php/check_user_logged.php';
include 'php/ride_details.php';
session_start();
?>
<script src="js/addRide.js"></script>

<div class="container-fluid h-100" style="min-width: 250px;" style="height: 100vh;">
    <!-- przycisk wstecz -->
    <div style="position: absolute; z-index:2;">
        <a href="?page=rideAdd">
            <div class="mt-5 ml-5 bg-light pb-5 pt-3" style="border-radius: 15px; height: 30px;">
                <div class="text-dark h4 px-3">
                    <i class="fa fa-arrow-left" aria-hidden="true"></i>
                    Wstecz
                </div>
            </div>
        </a>
    </div>
    <!-- mapa -->
    <div class="w-100 bg-primary" style="height: 55%!important;">
        <div class="container-fluid h-100 w-100" id="map">
        </div>
    </div>
    
    <!-- content pod mapą -->
     <div class="w-100" style="height: 40%!important;">
        <div class="h3 p-4">
            
            <div class="mx-auto my-5 p-3 list-item-group shadow rounded" style="height: 90%!important;">
                <div id="" class="d-inline-block">
                <?php
                    if(isset($_SESSION['addStart']))
                        echo $_SESSION['addStart'];
                    else
                        echo "Błąd";
                ?>
                </div>
                <i class="fa fa-long-arrow-right d-inline-block" aria-hidden="true"></i>
                <div id="" class="d-inline-block">
                <?php
                if(isset($_SESSION['addDest']))
                    echo $_SESSION['addDest'];
                else
                    echo "Błąd";
                ?>
                </div>
                <!-- dolna cześć elementu listy z godziną i ilością miejsc-->
                <div class="d-flex justify-content-between mt-3">
                    <div id="" class="text-primary d-inline-block">
                        Dzisiaj : 
                        <?php
                        if(isset($_SESSION['addTime']))
                            echo $_SESSION['addTime'];
                        else
                            echo "Błąd";
                        ?>
                    </div>
                    <!-- ilość ikonek w zależności od ilości miejsc -->
                    <div>
                        <?php
                        if(isset($_SESSION['addPlaces']))
                        {
                            showCarPlaces($_SESSION['addPlaces']);
                        }
                        ?>
                    </div>
                </div>
            </div> <!-- koniec boxa z informacją o przejeżdzie -->
            
            
            <div class="w-100 row pl-5 mt-5">
                <div class="col-12 mb-3">Opis trasy:</div>
                <div class="col-12">
                    <textarea rows="3" cols="60" placeholder="Szczegóły dotyczące przejazdu" style="border: none;"></textarea>
                </div>
            </div>
            
            <!-- przycisk potwierdzający przejazd -->
            <?php
            if(isset($_SESSION['rideError']))
            {
                echo '
                <div class="w-50 mx-auto" style="margin-top: 150px;">
                    <div class="h2 text-danger">
                        '.$_SESSION['rideError'].'
                    </div>
                </div>
                ';
            }
            else
            {
            echo '
            <form action="php/ride_add.php" method="POST">
                <div class="w-50 mx-auto" style="margin-top: 150px;">
                    <input type="submit" class="btn btn-success btn-block mb-5" style="height: 80px; border-radius: 40px; font-size: 36px;" value="POTWIERDŹ" name="rideConfirm">
                </div>
            </form>';
            }
            ?>
            
        </div>
    </div>
    
</div>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAjEcMhdQW1b3g9R9JPn1ZNlzfm0WMm9EQ&libraries=places&callback=initMap"
        async defer></script>
        
        <!--
        
        -->