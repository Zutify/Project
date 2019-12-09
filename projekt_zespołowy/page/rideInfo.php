<!-- formularz logowania-->
<?php
include 'php/check_user_logged.php';
include 'php/ride_details.php';
?>

<div class="container-fluid" style="min-width: 250px;">
    <div class="w-100 d-flex justify-content-end">
        <div class="d-inline-block mr-5 mt-5" id="btn-side-menu">
            <button type="button" class="btn">
                <!--<a href="?page=sideMenu" class="text-body">-->
                    <i class="fa fa-bars" aria-hidden="true" style="font-size: 64px;"></i>
                <!--</a>-->
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
                <!-- każdy item ma link to informacji o przejeździe rideDetails.php-->
                <?php showRides(); ?>
            </ul>
        </div>
    </div>
</div>

<script src="js/jquery.js"></script>
<script src="js/openSideMenu.js"></script>