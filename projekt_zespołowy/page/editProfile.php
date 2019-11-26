<!-- formularz logowania-->
<?php
session_start();
include '../php/form_view.php';
include '../php/detectmobilebrowser.php';
include '../php/db_connection.php';
include '../php/user_data.php';
include '../php/check_user_logged.php';
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
            <a href="../page/sideMenu.php" class="h4 text-dark">
                <i class="fa fa-arrow-left" aria-hidden="true"></i>
                Wstecz
            </a>
        </div>
    </div>
    
     <div class="container-fluid mt-3 mb-5 h2">
        <div class="row">
            <div class="col border-top border-bottom border-dark py-5">
                <div class="text-center">
                    <a href="" class="text-body">
                        Zweryfikuj adres e-mail
                    </a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-8 border-bottom border-dark py-5 pl-5">
                 <div class="pl-3">
                     <div class="row">
                         <div class="col-4">
                             E-mail
                         </div>
                         <div class="col-8">
                             <?php
                                echo '<input id="profileEmail" placeholder="'.$Email.'" class="display-inline-block" style="background: transparent; border:none; font-color: black;">'
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4 border-bottom border-left border-dark py-5">
                <div class="pl-3">
                   <div class="row">
                         <div class="col-4">
                             Imię
                         </div>
                         <div class="col-8">
                             <?php
                             echo '<input id="profileName" placeholder="'.$Name.'" class="display-inline-block w-100" style="background: transparent; border:none; font-color: black;">'
                            ?>
                        </div>    
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col border-bottom border-dark py-5 pl-5">
                 <div class="pl-3">
                    <div class="row">
                         <div class="col-4">
                             Adres zamieszkania
                         </div>
                         <div class="col-8">
                            <input id="profileAddress" placeholder="Wielkopolska 19, Szczecin" class="display-inline-block" style="background: transparent; border:none; font-color: black;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col border-bottom border-dark py-5 pl-5">
                <div class="pl-3">
                    <div>
                        <a href="" class="text-body">
                            Domyślny kierunek podróży
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" style="height: 80px;">
            <div class="col border-bottom border-dark">
                <!-- empty row-->
            </div>
        </div>
        <div class="row">
            <div class="col border-bottom border-dark py-5 pl-5">
                <div class="pl-3">
                    <a href="" class="text-body">
                        Edytuj ulubione miejsca
                    </a>
                </div>
                <div class="text-muted h3 pl-3 pt-2">
                    Zarządzaj ulubionymi miejscami podróży
                </div>
            </div>
        </div>
    </div>
    
    <div class="w-75 mx-auto mt-5">
        <button type="button" class="btn btn-success btn-block mb-5" style="height: 120px;">
            <a href="../page/driverInfo.php" class="text-white h3" >
                JESTEM KIEROWCĄ
            </a>
        </button>
    </div>
    </div><!-- end container fluid - table -->
</div>