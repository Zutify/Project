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
            Witaj 
            <?php
                if(isset($_SESSION['isLogged']))
                {
                    if(isset($_SESSION['username']))
                    {
                        echo $_SESSION['username'];
                    }
                }
                else
                    echo "BŁĄD";
            ?>
            <div class="float-right mr-5 mt-3">
                <button type="button" class="btn">
                    <a href="../page/sideMenu.php" class="text-body">
                        <i class="fa fa-bars" aria-hidden="true" style="font-size: 64px;"></i>
                    </a>
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
            <a href="../page/rideAdd.php" class="text-white h3">
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
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>