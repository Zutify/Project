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
            <a href="../page/rideInfo.php" class="h4 text-dark">
                <i class="fa fa-arrow-left" aria-hidden="true"></i>
                Wstecz
            </a>
        </div>
    </div>
    
    <div class="container-fluid mt-5">
        <div class="mx-5">
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
            
            <div class=" my-3 border-bottom border-dark"></div>
            <div class="h2">Informacje o kierowcy:</div>
            <div class=" my-3 border-bottom border-dark"></div>
            <div class="h4 mx-5 h-50">
                <div class="my-2 h3">
                    Auto <div class="d-inline-block ml-2" id="car">Toyota Avensis kombi</div>
                </div>
                <div class="my-2 h3">
                    Telefon <div class="d-inline-block ml-2" id="phone">123 456 789</div>
                </div>
                <div class="my-2 h3">
                    Opis <div class="d-inline-block ml-2" id="description">Nie wpuszczam pasażerów z jedzeniem</div>
                </div>
            </div>
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