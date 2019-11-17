<!-- formularz logowania-->
<?php
session_start();
include '../php/form_view.php';
include '../php/detectmobilebrowser.php';
include '../php/db_connection.php';
?>
<!-- dodane pliki do stylizowania i możliwości używania ikonek  -->
<link rel="stylesheet" type="text/css" href="../style/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- ikonek można szukać na stronie : 
https://fontawesome.com/v4.7.0/icon/
-->

<div class="container-fluid" style="min-width: 250px;">
    <div class="w-100 d-flex justify-content-between">
        <div class="d-inline-block mt-5 mb-5 ml-5">
            <a href="../page/rideMenu.php" class="h4 text-dark">
                <i class="fa fa-arrow-left" aria-hidden="true"></i>
                Wstecz
            </a>
        </div>
        <div class="d-inline-block mr-5 mt-5">
            <button type="button" class="btn">
                <i class="fa fa-bars" aria-hidden="true" style="font-size: 64px;"></i>
            </button>
        </div>
    </div>
    
    <div class="container-fluid mt-5">
        <div class="ml-5">
            <div class="my-3">
                <i class="fa fa-circle-o d-inline-block" style="font-size: 48px; color: green;" aria-hidden="true"></i>
                <div class="h3 ml-3 d-inline-block"  id="start">Wydział Informatyki</div>
            </div>
            <div class="my-3">
                <i class="fa fa-circle-o d-inline-block" style="font-size: 48px; color: blue;" aria-hidden="true"></i>
                <div class="h3 ml-3 d-inline-block" id="destination">Podjuchy</div>
            </div>
            <div id="" class="h3 text-primary ">
                Dzisiaj : 9:45
            </div>
        </div>
        <div class=" mx-5 mt-4 border-bottom border-dark"></div>
        
        <div class="mt-5 mx-5">
            <ul class="list-group w-100">
                <li class="my-4 list-group-item shadow">
                    <a href="../page/rideDetails.php" class="text-body">
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
                    <a href="../page/rideDetails.php" class="text-body">
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
                    <a href="../page/rideDetails.php" class="text-body">
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