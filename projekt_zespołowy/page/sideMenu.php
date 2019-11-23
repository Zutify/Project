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
    <div class="h-25 bg-light" style="padding-top: 175px;">
        <div class="w-75 mx-auto">
            <i class="fa fa-user-circle-o" class="d-inline-block" style="color:green; font-size: 150px; " aria-hidden="true"></i>
            <div class="d-inline-block ml-5">
                <div class="h1" id="userName">
                    <?php
                        if( isset($_SESSION['isLogged']))
                        {
                            if(isset($_SESSION['username']))
                            {
                                echo $_SESSION['username'];
                            }
                        }
                        else
                            echo "BŁĄD";
                    ?>
                </div>
                <div class="py-2">
                    <a href="../page/editProfile.php" class="h3 text-body">
                        Edytuj profil
                    </a>
                </div>
                <div class="py-2">
                    <a href="../php/logout.php" class="h3 text-body">
                        Wyloguj
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="border-bottom border-dark"></div>
    
    <div class="w-50 mx-auto">
        <div class="row w-100">
            <div class="col-12 my-5">
                <div class="display-4">
                    <strong>
                        <a href="../page/menu.php" class="text-body">Menu główne</a>
                    </strong>
                </div>
            </div>
            <div class="col-12 my-5">
                <div class="display-4">
                    <strong>
                        <a href="../page/rideAdd.php" class="text-body">Dodaj przejazd</a>
                    </strong>
                </div>
            </div>
            <div class="col-12 my-5">
                <div class="display-4">
                    <strong>
                        <a href="../page/rideMenu.php" class="text-body">Szukaj przejazdu</a>
                    </strong>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>