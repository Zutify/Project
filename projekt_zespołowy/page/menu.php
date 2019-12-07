<!-- formularz logowania-->
<?php
include 'php/check_user_logged.php';
?>

    <div id="sideMenu" style="width:70%; position: absolute; left:30%; background-color: #f8f9fa; height: 100%; display: none; z-index: 10000">
    </div>
    <div class="container-fluid" style="min-width: 250px;">
        <div class="w-100 py-5 pl-5 bg-light">
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
                <div class="float-right mr-5" id="btn-side-menu">
                    <!--<a href="?page=sideMenu" class="text-body">-->
                        <button type="button" class="btn">
                            <i class="fa fa-bars" aria-hidden="true" style="font-size: 64px;"></i>
                        </button>
                    <!--</a>-->
                </div>
            </div>
        </div>
        <div class="w-100 h-50 pt-5" style="min-height: 50vh">
            <div class="text-center pt-5">
                <div class="display-1 text-white pt-5">Co dziś robimy?</div>    
            </div>
        </div>
        
        <div class="w-75 mx-auto mt-5">
            <a href="?page=rideAdd" class="text-white">
                <button type="button" class="btn btn-success btn-block mb-5" style="height: 120px;">
                    <div class="h3">DODAJ PRZEJAZD</div>
                </button>
            </a>
            <a href="?page=rideMenu" class="text-white" >
                <button type="button" class="btn btn-success btn-block mb-5" style="height: 120px;">
                    <div class="h3">SZUKAJ PRZEJAZDU</div>
                </button>
            </a>
            <a href="?page=currentRides" class="text-white" >
                <button type="button" class="btn btn-success btn-block mb-5" style="height: 120px;">
                    <div class="h3">TWOJE PRZEJAZDY(NA RAZIE TU BUTTON)</div>
                </button>
            </a>
        </div>
        
        <div style="background-image:url('style/img/rysunek.svg');width: 100%; height: 100%; background-size: cover; position: absolute;top:0; left:0; z-index:-1;background-color:#fff;">
            </div>
        
    </div>
    <!--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="js/jquery.js"></script>
<script src="js/openSideMenu.js"></script>