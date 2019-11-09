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


    <link rel="stylesheet" type="text/css" href="style/zutify.css">

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
    <!--Na razie na tej stronie startowej są same buttony, pozniej zrobimy zeby bylo ladniej :)-->
    <div class=spButtonsContainer>

        <div class="row">
            <div class="column c1"> <a class="spButtons" href="page/rejestracja.php"> Zarejestruj się </a></div>
            <div class="column c2"><a class="spButtons" href="page/login.php"> Zaloguj się </a></div>
        </div>
    </div>




</body>

</HTML>
