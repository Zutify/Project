<!-- formularz logowania-->
<?php
include 'php/check_user_logged.php';
include 'php/user_details.php';
?>

<style>

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
        <?php if(isUserDriver()) :?>
        <ul class="nav nav-tabs justify-content-center" id="myTab" >
            <li class="nav-item ">
                <a class="nav-link h3 active" data-id="passenger-tab" href="#" >Pasażer</a>
            </li>
            <li class="nav-item">
                <a class="nav-link h3" data-id="driver-tab" href="#">Kierowca</a>
            </li>
        </ul>
        <?php endif;?>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="passenger-tab">
                <!-- Nie ma tabel w bazie danych aby określić kto jest pasażerem -->
                <?php if(!isUserDriver()):?> 
                <p class="text-center h1">Twoje przejazdy</p>
                <?php endif;?>
                <?php if(doesPassengerHaveRides()){
                    printRides(0);
                }else{
                    echo '<p class="text-center h3 mt-5">Nie masz żadnych przejazdów</p>';
                }
                ?>
            </div>
            <?php if(isUserDriver()) :?>
            <div class="tab-pane fade" id="driver-tab">
            <?php 
                if(isUserDriver()){
                    if(doesDriverHaveRides()){
                        printRides(1);
                    }else{
                        echo '<p class="text-center h3 mt-5">Nie masz żadnych przejazdów</p>';
                    }
                }
            ?>
            </div>
            <?php endif;?>
        </div>
    </div>
</div>
        
<script src="js/jquery.js"></script>
<script src="js/openSideMenu.js"></script>
<script>
    const linkItems = $('.nav-link');
    const tabItems = $('.tab-pane');
    
    $("#myTab .nav-link").on('click', e => {
        e.preventDefault();
        const element = e.currentTarget;
        const target = $(element).data('id');
        
        linkItems.removeClass('active');
        $(element).addClass('active');
        tabItems.removeClass('show active');
        $(`#${target}`).addClass('show active');
    });

</script>