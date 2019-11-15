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
    <div class="w-100 py-5 pl-5">
        <div class="display-3 font-weight-bold">
            Witaj Rafał
            <div class="float-right mr-5 mt-3">
                <button type="button" class="btn">
                    <i class="fa fa-bars" aria-hidden="true" style="font-size: 64px;"></i>
                </button>
            </div>
        </div>
    </div>
    <div class="w-100 h-50 bg-primary">
        
        
    </div>
    <div class="bg-secondary mb-5">
        <div class="display-2">Co dziś robimy?</div>    
    </div>
    
    <div class="w-75 mx-auto mt-5">
        <button type="button" class="btn btn-success btn-block mb-5" style="height: 120px;">
            <a href="" class="text-white h3">
                DODAJ PRZEJAZD
            </a>
        </button>
        <button type="button" class="btn btn-success btn-block mb-5" style="height: 120px;">
            <a href="../page/rideMenu.php" class="text-white h3" >
                SZUKAJ PRZEJAZDU
            </a>
         </button>
    </div>
</div>