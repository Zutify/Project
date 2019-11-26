<!-- formularz logowania-->
<?php
session_start();
include '../php/form_view.php';
include '../php/detectmobilebrowser.php';
include '../php/db_connection.php';
include '../php/check_user_logged.php';
include '../php/user_data.php';
?>
<!-- dodane pliki do stylizowania i możliwości używania ikonek  -->
<link rel="stylesheet" type="text/css" href="../style/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- ikonek można szukać na stronie : 
https://fontawesome.com/v4.7.0/icon/
-->

<div class="container-fluid" style="min-width: 250px; height: 1000px; max-height: 1000px;">
    <div class="h2 ml-5 my-5">
        Opis kierowcy
    </div>
    
     <div class="container-fluid mt-3 mb-5 h2">
        <div class="row">
            <div class="col-8 border-bottom border-top border-dark py-5 pl-5">
                 <div class="pl-3">
                     <div class="row">
                         <div class="col-4">
                             Marka auta
                         </div>
                         <div class="col-8">
                            <?php
                            echo '<input id="carBrand" ';
                            if(isset($carBrand))
                                echo 'placeholder="'.$carBrand.'"';
                            echo ' class="display-inline-block" style="background: transparent; border:none; font-color: black;">'
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4 border-bottom border-top border-left border-dark py-5">
                <div class="pl-3">
                   <div class="row">
                         <div class="col-4">
                             Model
                         </div>
                         <div class="col-8">
                            <?php
                            echo '<input id="carModel"';
                            if(isset($carModel))
                                echo 'placeholder="'.$carModel.'"';
                            echo 'class="display-inline-block w-100" style="background: transparent; border:none; font-color: black;">'
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
                         <div class="col-12">
                             <div class="row">
                                 <div class="col-6">
                                     Numer kontaktowy
                                 </div>
                                 <div class="col-6">
                                    <?php
                                    echo '<input id="phoneNumber"';
                                    if(isset($PhoneNumber))
                                        echo ' placeholder="'.$PhoneNumber.'"';
                                    echo 'class="display-inline-block w-100" style="background: transparent; border:none; font-color: black;">'
                                    ?>
                                </div>    
                            </div>
                         </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col py-5 pl-5">
                <div class="pl-3">
                    <div class="row">
                        <div class="col-4">
                            Opis
                        </div>
                        <div class="col-6">
                            <?php
                            echo '<textarea id="driverDescription" rows="8" cols="35" style="border: none;">';
                            if(isset($description))
                                echo $description;
                            echo '</textarea>';
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- end container fluid - table -->
    
    <div class="w-75 mx-auto" style="margin-top: 200px;">
        <button type="button" class="btn btn-success btn-block mb-5" style="height: 80px; border-radius: 40px;">
            <a href="../page/driverInfo.php" class="text-white h3" >
                POTWIERDŹ
            </a>
        </button>
    </div>
    
    <div class="text-center" style="margin-top: 100px;">
        <a href="../page/editProfile.php"><i class="fa fa-times-circle" style="font-size: 80px; color: grey; opacity: 0.5;" aria-hidden="true"></i>
        </a>
    </div>
    
</div>