<!-- formularz logowania-->
<?php
include 'php/check_user_logged.php';
include 'php/user_data.php';
?>

<div id="sideMenu" style="width:70%; position: absolute; left:30%; background-color: #f8f9fa; height: 100%; display: none; z-index: 10000">
    </div>
    
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
        <button type="button" class="btn btn-success btn-block mb-5" style="height: 120px;" id="btn-action">
            <!--<a href="?page=driverInfo" class="text-white h3" >-->
                <span class="text-white h3">JESTEM KIEROWCĄ</span>
            <!--</a>-->
        </button>
    </div>
    
    <div id="driverInfo">
    </div>
</div>
<script src="js/jquery.js"></script>
<script>
    $(document).ready(function () {
        $('#btn-action').click(function(){
            document.getElementById('btn-action').style.display = "none";
            $('#driverInfo').hide().load( 'https://zutify.000webhostapp.com/index.php?page=driverInfo' ).fadeIn("slow");
            $('body').bind('touchmove', function(e){e.preventDefault()})
            document.getElementById('sideMenu').style.height = "130%";
        });
    });
</script>
        
<script src="js/jquery.js"></script>
<script src="js/openSideMenu.js"></script>