<!--Projekt zespolowy-->
<!DOCTYPE HTML>
<?php 
include 'php/detectmobilebrowser.php';
include 'php/db_connection.php';
include 'php/form_view.php';
//include 'php/reset_session.php';
?>
<HTML>

<head>

    <title>ZUTify</title>
    <meta charset="utf-8">
    <meta name="Description" content="Projekt zespolowy" />
    <meta name="keywords" content="ZUT, bla bla car, student project, transport, car">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--<link rel="stylesheet" type="text/css" href="style/zutify.css">-->
    <link rel="stylesheet" type="text/css" href="style/bootstrap.min.css">
    <script>
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
    </script>


</head>

<body>
    <div class="container-fluid" style="min-width: 250px;">
        <div class="img-fluid">
            <img src="https://upload.wikimedia.org/wikipedia/commons/f/f9/Phoenicopterus_ruber_in_S%C3%A3o_Paulo_Zoo.jpg" style="max-width: 100%; height: auto;"> 
        </div>
        <div class="h-50 w-100 bg-primary text-white ">
            <div class="display-2 text-center">ZUTify</div>
        </div>
        
        <!--Na razie na tej stronie startowej są same buttony, pozniej zrobimy zeby bylo ladniej :)-->
        <div class="container-fluid text-center mt-5">
            <div >
                <div class="mb-3">
                    <button type="button" class="btn btn-success w-50">
                        <a href="page/login.php" class="text-white">Zaloguj</a>
                    </button>
                </div>
            </div>
            <div>
                <div>
                    <button type="button" class="btn btn-success w-50">
                        <a href="page/rejestracja.php" class="text-white">Zarejestruj</a>
                    </button>
                </div>
            </div>
        </div>
    </div>
</body>

</HTML>
