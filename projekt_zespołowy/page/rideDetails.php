<!-- formularz logowania-->
<?php
include 'php/check_user_logged.php';
include 'php/ride_details.php';
include 'php/driver_data.php';
?>
<div class="container-fluid" style="min-width: 250px;">
    <div class="w-100 d-flex justify-content-between">
        <div class="d-inline-block mt-5 mb-5 ml-5">
            <a href="?page=rideInfo" class="h4 text-dark">
                <i class="fa fa-arrow-left" aria-hidden="true"></i>
                Wstecz
            </a>
        </div>
    </div>
    
    <div class="container-fluid mt-5">
        <div class="mx-5">
            <div class="h3 p-4">
                <div id="" class="d-inline-block">
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
                <i class="fa fa-long-arrow-right d-inline-block" aria-hidden="true"></i>
                <div id="" class="d-inline-block">
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
                        Dzisiaj : 
                        <?php
                            if(isset($_SESSION['trip']))
                            {
                                $trip = $_SESSION['trip'];
                                if($trip['LeavingTime'][0] == "0")
                                    echo substr($trip['LeavingTime'], 1, 4);
                                else
                                    echo substr($trip['LeavingTime'], 0, 5);
                            }
                        ?>
                    </div>
                    <!-- ilość ikonek w zależności od ilości miejsc -->
                    <div>
                        <?php
                        if(isset($_SESSION['trip']))
                            showCarPlaces($_SESSION['trip']);
                        ?>
                    </div>
                </div>
            </div>
            
            <!-- wyświetla informacje o kierowcy  -->
            <?php
            if(isset($_SESSION['trip']))
            {
                $trip = $_SESSION['trip'];
                driverInfo($trip['Driver']);
            }
            ?>
            <div class="border-bottom border-dark"></div>
            <div class="d-flex justify-content-end mt-2">
                <div class="h3">
                    <a href="" class="text-body">
                        Pokaż trasę na mapie
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>