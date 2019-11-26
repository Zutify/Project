<!--Projekt zespolowy-->
<!DOCTYPE HTML>
<?php 
session_start();
include 'php/detectmobilebrowser.php';
include 'php/db_connection.php';
include 'php/form_view.php';
include 'php/reset_session.php';
?>

<HTML>

<head>

    <title>ZUTify</title>
    <meta charset="utf-8">
    <meta name="Description" content="Projekt zespolowy" />
    <meta name="keywords" content="ZUT, bla bla car, student project, transport, car">
    <!-- to nie działa na innych stronach niż index -->
    <?php if(!(isset($_GET['page']) && !empty($_GET['page']))) :?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php endif;?>
    <!--<link rel="stylesheet" type="text/css" href="style/zutify.css">-->
    <link rel="stylesheet" type="text/css" href="style/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- ikonek można szukać na stronie : 
    https://fontawesome.com/v4.7.0/icon/
    -->
    
   <!-- <script>
        function przedWyslaniem() {
            /*to taki niby kawalek walidacji do rejestracji, proszę nie zwracać uwagi bo to tylko tak na próbę :)*/


            var passwordField = document.getElementById('password');
            var passwordLength = passwordField.value.length;
            if (passwordLength < 8) {
                var passwordError = document.getElementById('passwordError');

                passwordError.innerHTML = 'Hasło powinno zawierać co najmniej 8 znaków';
                return false;
            } else {
                return true;
            }

        }
    </script>-->


</head>

<body style="height: 100vh">
    <?php
        //sprawdzenie czy $_GET posiada 'page' i czy $_GET['page'] nie jest puste
        //zamiast '{}' używam : aby generować kod html poza znacznikami php / taki tip jakby ktoś nie wiedział
        if (isset($_GET['page']) && !empty($_GET['page'])) :
            //jeżeli posiada 'page'
            //przypisanie ścieżki do pliku
            $dir = "page/$_GET[page].php";
            //sprawdzenie czy plik istnieje
            if (file_exists($dir)) {
                //jeżeli istnieje dodanie zawartości tego pliku
                include $dir;
            }else{
                //jeżeli nie komunikat
                echo "<p>Taka strona nie istnieje!</p>";
            }
        // to samo co wyżej
        else :?>
        <div class="h-100 container-fluid" style="min-width: 250px;">
            <div class="w-100 h-50 ">
                <div class="pt-5 mt-5">
                    <div class="display-2 text-center text-white">ZUTify</div>
                </div>
            </div>
            
            <div class="h-50 w-100">
                <div class="container-fluid text-center mt-5">
                    <div>
                        <div class="mb-3">
                            <!-- linkowanie do innego pliku   tu /page/login.php -->
                            <a href="?page=login" class="text-white">
                                <button type="button" class="btn btn-success w-50">
                                    Zaloguj
                                </button>
                            </a>
                        </div>
                    </div>
                    <div>
                        <div>
                            <a href="?page=rejestracja" class="text-white">
                                <button type="button" class="btn btn-success w-50">
                                    Zarejestruj
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
            <!--<div style="background-image:url('../style/img/rysunek.svg');width: 100%; height: 100%; background-size: cover; position: absolute;top:0; left:0; z-index:-1;background-color:#fff;">
        --><div style="background-image:url('style/img/rysunek.svg');width: 100%; height: 100%; background-size: cover; position: absolute;top:0; left:0; z-index:-1;background-color:#fff;">
            </div>
            
        </div>
        <?php 
        //zamknięcie else ( jeżeli nie ma $_GET('page') )
        endif;?>
</body>

</HTML>
