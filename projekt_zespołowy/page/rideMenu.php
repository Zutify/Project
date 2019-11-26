<!-- formularz logowania-->
<?php
session_start();
include '../php/form_view.php';
include '../php/detectmobilebrowser.php';
include '../php/db_connection.php';
include '../php/check_user_logged.php';
?>
<!-- dodane pliki do stylizowania i możliwości używania ikonek  -->
<link rel="stylesheet" type="text/css" href="../style/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- ikonek można szukać na stronie : 
https://fontawesome.com/v4.7.0/icon/
-->
<script src="../js/changeInputsValue.js"></script>

<div class="container-fluid" style="min-width: 250px;">
    <div class="w-100 d-flex justify-content-between">
        <div class="d-inline-block mt-5 mb-5 ml-5">
            <a href="../page/menu.php" class="h4 text-dark">
                <i class="fa fa-arrow-left" aria-hidden="true"></i>
                Wstecz
            </a>
        </div>
        <div class="d-inline-block mr-5 mt-5">
            <button type="button" class="btn">
                <a href="../page/sideMenu.php" class="text-body">
                    <i class="fa fa-bars" aria-hidden="true" style="font-size: 64px;"></i>
                </a>
            </button>
        </div>
    </div>
    
    <div class="w-100 h-50">
        
        <div class="ml-5 mt-5">
            <div class="display-2" ><strong>Dokąd jedziemy?</strong></div>
        </div>
        
        <!-- kontener zawierający opcje do wyboru pod mapą -->
        <div class="w-75 mx-auto">
            <form action="../php/ride_info_handle.php" method="POST">
                <div class=" mt-5 shadow p-3 mb-5 bg-light rounded">
                    <button type="button" class="btn btn-lg btn-block">
                        <div class="h3 text-left">
                            <div class="col-10">
                                <i class="fa fa-search" style="font-size: 36px;"></i>
                                <input name="start" id="start" class="ml-2" placeholder="Miejsce wyjazdu" style="background: transparent; font-size: 24pt; border:none; font-color: black;">
                            </div>
                        </div>
                    </button>
                </div>
                <div class=" mt-5 shadow p-3 mb-5 bg-light rounded">
                    <button type="button" class="btn btn-lg btn-block">
                        <div class="h3 text-left">
                            <div class="col-10">
                                <i class="fa fa-compass" style="font-size: 36px;"></i>
                                <input name="dest" id="dest" class="ml-2" placeholder="Miejsce docelowe" style="background: transparent; font-size: 24pt; border:none; font-color: black;">
                            </div>
                        </div>
                    </button>
                </div>
                
                <!-- przycisk do zmiany kolejności miejsc wyjazdu i docelowego-->
                <div class="position-fixed" style="top: 405; right: 260;">
                    <button type="button" onclick="changeInputsValue()" class="btn btn-lg btn-block">
                        <div class="h3 text-center pt-2 bg-white rounded-circle" style="width: 80px; height: 80px;">
                            <i class="fa fa-exchange text-primary" style="font-size: 64px; transform: rotate(90deg);"></i>
                        </div>
                    </button>
                </div>
                
                <div class="my-5">
                    <div class="h4">
                        <a href=""class="text-dark">
                            Pokaż kierowców w pobliżu
                        </a>
                    </div>
                </div>
                
                <div class="my-5 d-flex justify-content-between">
                    <div>
                        <div class="h2">Data i godzina</div>
                    </div>
                    <div>
                        <input type="submit" value="SZUKAJ" name="submit" class="btn text-white btn-lg bg-primary rounded">
                    </div>
                </div>
            </form>
            
            <div class="border-bottom border-dark"></div>
            
            <table class="table-borderless w-100">
                <tr>
                    <td class="">
                        <div class="h3 my-4">
                            <i class="fa fa-star" aria-hidden="true" style="font-size: 36px;"></i>
                            <a href="" class="ml-3 text-dark">Ulubione miejsca</a>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="">
                        <div class="h3 my-4 ml-2"> 
                            <i class="fa fa-map-marker" aria-hidden="true" style="font-size: 36px;"></i>
                            <a href="" class="ml-3 text-dark">Ostatnio wyszukiwane</a>
                            </div>
                    </td>
                </tr>
                <tr>
                    <td class="">
                        <div class="h3 my-4">
                            <i class="fa fa-car" aria-hidden="true" style="font-size: 28px;"></i>
                            <a href="" class="ml-3 text-dark">Aktualne przejazdy</a>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="">
                        <div class="h3 my-4 ml-2">
                            <i class="fa fa-plus" aria-hidden="true" style="font-size: 28px;"></i>
                            <a href="" class="ml-3 text-dark">Dodaj przejazd</a>
                        </div>
                    </td>
                </tr>
            </table>
            
        </div>
        
        
    </div>
</div>