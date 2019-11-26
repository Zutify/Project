<!-- formularz logowania-->
<?php
include 'php/check_user_logged.php';
//include '../php/ride_details.php'; - w trakcie robienia, nie zmieniać
?>

<div class="container-fluid" style="min-width: 250px;">
    <div class="w-100 d-flex justify-content-between">
        <div class="d-inline-block mt-5 mb-5 ml-5">
            <a href="?page=rideMenu" class="h4 text-dark">
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
    
    <div class="container-fluid mt-5">
        <div class="ml-5">
            <div class="my-3">
                <i class="fa fa-circle-o d-inline-block" style="font-size: 48px; color: green;" aria-hidden="true"></i>
                <div class="h3 ml-3 d-inline-block"  id="start">
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
            </div>
            <div class="my-3">
                <i class="fa fa-circle-o d-inline-block" style="font-size: 48px; color: blue;" aria-hidden="true"></i>
                <div class="h3 ml-3 d-inline-block" id="destination">
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
            </div>
            <div id="" class="h3 text-primary ">
                Dzisiaj : 9:45
            </div>
        </div>
        <div class=" mx-5 mt-4 border-bottom border-dark"></div>
        
        <div class="mt-5 mx-5">
            <ul class="list-group w-100">
                <li class="my-4 list-group-item shadow">
                    <a href="?page=rideDetails" class="text-body">
                        <div class="h3 p-4">
                            <div id="" class="d-inline-block">
                                Wydział Informatyki
                            </div>
                            <i class="fa fa-long-arrow-right d-inline-block" aria-hidden="true"></i>
                            <div id="" class="d-inline-block">
                                Rondo Zdroje
                            </div>
                            <!-- dolna cześć elementu listy z godziną i ilością miejsc-->
                            <div class="d-flex justify-content-between mt-3">
                                <div id="" class="text-primary d-inline-block">
                                    Dzisiaj : 9:45
                                </div>
                                <!-- ilość ikonek w zależności od ilości miejsc -->
                                <div>
                                    <i class="fa fa-male d-inline-block mx-1" aria-hidden="true" style="font-size: 52px; color:red;"></i>
                                    <i class="fa fa-male d-inline-block mx-1" aria-hidden="true" style="font-size: 52px; color:red;"></i>
                                    <i class="fa fa-male d-inline-block mx-1" aria-hidden="true" style="font-size: 52px; color:green;"></i>
                                    <i class="fa fa-male d-inline-block mx-1" aria-hidden="true" style="font-size: 52px; color:green;"></i>
                                </div>
                            </div>
                        </div>
                    </a>
                </li>
                <li class="my-4 list-group-item shadow">
                    <a href="?page=rideDetails" class="text-body">
                        <div class="h3 p-4">
                            <div id="" class="d-inline-block">
                                Wydział Informatyki
                            </div>
                            <i class="fa fa-long-arrow-right d-inline-block" aria-hidden="true"></i>
                            <div id="" class="d-inline-block">
                                Rondo Zdroje
                            </div>
                            <!-- dolna cześć elementu listy z godziną i ilością miejsc-->
                            <div class="d-flex justify-content-between mt-3">
                                <div id="" class="text-primary d-inline-block">
                                    Dzisiaj : 9:45
                                </div>
                                <!-- ilość ikonek w zależności od ilości miejsc -->
                                <div>
                                    <i class="fa fa-male d-inline-block mx-1" aria-hidden="true" style="font-size: 52px; color:red;"></i>
                                    <i class="fa fa-male d-inline-block mx-1" aria-hidden="true" style="font-size: 52px; color:red;"></i>
                                    <i class="fa fa-male d-inline-block mx-1" aria-hidden="true" style="font-size: 52px; color:green;"></i>
                                    <i class="fa fa-male d-inline-block mx-1" aria-hidden="true" style="font-size: 52px; color:green;"></i>
                                </div>
                            </div>
                        </div>
                    </a>
                </li>
                <li class="my-4 list-group-item shadow">
                    <a href="?page=rideDetails" class="text-body">
                        <div class="h3 p-4">
                            <div id="" class="d-inline-block">
                                Wydział Informatyki
                            </div>
                            <i class="fa fa-long-arrow-right d-inline-block" aria-hidden="true"></i>
                            <div id="" class="d-inline-block">
                                Rondo Zdroje
                            </div>
                            <!-- dolna cześć elementu listy z godziną i ilością miejsc-->
                            <div class="d-flex justify-content-between mt-3">
                                <div id="" class="text-primary d-inline-block">
                                    Dzisiaj : 9:45
                                </div>
                                <!-- ilość ikonek w zależności od ilości miejsc -->
                                <div>
                                    <i class="fa fa-male d-inline-block mx-1" aria-hidden="true" style="font-size: 52px; color:red;"></i>
                                    <i class="fa fa-male d-inline-block mx-1" aria-hidden="true" style="font-size: 52px; color:red;"></i>
                                    <i class="fa fa-male d-inline-block mx-1" aria-hidden="true" style="font-size: 52px; color:green;"></i>
                                    <i class="fa fa-male d-inline-block mx-1" aria-hidden="true" style="font-size: 52px; color:green;"></i>
                                </div>
                            </div>
                        </div>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>