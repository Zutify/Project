<!-- formularz logowania-->
<?php
include 'php/check_user_logged.php';
?>

<style>
.pac-item{
    height: 40px;
    font-size: 26px;
    padding-top: 7px;
}
.pac-item-query{
    font-size: 26px;
}
.pac-icon{

}
</style>


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
    
    <div class="w-100 h-50" style="min-height: 50vh">
        
        <div class="ml-5 my-5">
            <div class="display-2" ><strong>Ulubione miejsca</strong></div>
        </div>
        
        <!-- kontener zawierający opcje do wyboru pod mapą -->
        <div class="w-75 mx-auto">
            <?php include 'php/favourite_places.php'; ?>
        </div>
        
        
        
    </div>
</div>
    
<script src="js/jquery.js"></script>
<script src="js/openSideMenu.js"></script>
