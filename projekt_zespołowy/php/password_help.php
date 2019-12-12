<?php
include 'db_connection.php';
include 'user_data.php';
session_start();

$r = new stdClass;
$r->error = 0;
$errorMsg = "Te pole nie może być puste!";


foreach($_POST as $key => $val) {
    if (empty($val)) {
        $r->$key['msg'] = $errorMsg;
        $r->$key['field'] = '';
        $r->error = true;
    }
}


# do przypomnienia hasła
if(isset($_POST['submitForget']))
{

    #sprawdzenie czy został podany mail i nie jest pusty
    if(!isset($r->email)){
        $r->email['field'] = $_POST['email'];
        $email = $_POST['email'];
        # wyszukanie w bazie danych konta o podanym emailu
        $sql = "SELECT * FROM `User` WHERE `Email` LIKE '$email';";
        $result = $conn->query($sql);
        if($result->num_rows == 1){
            # przypadek gdy znajdziemy w bazie tylko 1 uzytkownika o podanym mailu
            $row = $result->fetch_assoc();
            # generowanie klucza na podstawie maila oraz czasu, ktory jest zapisany w bazie danych
            $vkey = md5(time().$row['Email']);
            $date = date("Y-m-d H:i:s");
            # dodanie rekordu do bazy z dotyczacy uzytkownika, ktory zapomniał hasła
            $sql = "INSERT INTO ForgotPasswordKey VALUES (NULL , '$row[ID]' ,'$vkey' ,'$date','0');";
            $conn->query($sql);
            # wysyłanie maila z linkiem do storny z zmiana hasła
            #https://www.tempmailaddress.com/ tutaj tworzy sie 5min maila
            $reciver = "jaxel.zameer@iiron.us";
            $subject  = "Przypomnienie hasła";
            $link = "<a href = 'http://zutify.000webhostapp.com/index.php?page=passwordReset&vkod=$vkey&email=$email'>Link</a>";
            $text = "Aby przypomnieć hasło prosze kliknąć w link : </br>".$link;
            if(mail($reciver, $subject, $text, $reciver)){

            }
            # przeniesienie do strony z logowaniem
            header('Location: ../index.php?page=login');
        }else{
            #przypadek gdy w bazie danych nie znajdziemy uzytkownika o podanym mailu
            $r->email['msg'] = "Nie istnieje użytkownik o podanym mailu.";
            $r->error = true;
        }
    }
    if(!$r->error){
        unset($_SESSION['forgot_password']);
    }else{
        $_SESSION['forgot_password'] = $r;
        header('Location: ../index.php?page=passwordForget');
    }
}




# do resetowania hasła
if(isset($_POST['submitReset']))
{
    #sprawdzenie czy użytkownik jest zalogowany
    if(isset($_SESSION['isLogged']) == true){
        #zmienna, która ustawiamy na false gdy mail lub kod weryfikacyjny jest zły lub podane hasło
        $readyReset = false;
        #sprawdzamy czy inputy istnieja w tablicy Post
        if(!isset($r->newPassword) && !isset($r->repeatPassword)){
            #sprawdzamy czy hasła podane są identyczne
            if(strcmp($_POST['newPassword'],$_POST['repeatPassword']) == 0){
                $password = $_POST["newPassword"];
                $r->password['field'] = $password;
                #sprawdzenie czy podane hasło spełnia wymagania
                if (!preg_match("/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,20}$/",$password) && !empty($password)) {
                    $r->newPassword['msg'] = "Hasło musi zawierac od 8 do 20 znaków";
                    $r->error = true;
                }else{
                    $readyReset = true;
                }
            }else{
                $r->newPassword['msg'] = "Podane hasła są rózne";
                $r->repeatPassword['msg'] = "Podane hasła są rózne";
                $r->error = true;
            }
        }else{
            $r->newPassword['msg'] = "Formularz hasło lub Powtórz hasło jest puste";
            $r->repeatPassword['msg'] = "Formularz hasło lub Powtórz hasło jest puste";
            $r->error = true;
        }
        #zmiana hasła
        if($readyReset == true){
            $password = md5($_POST["newPassword"]);
            $sql = "UPDATE User SET `Password` = '$password' WHERE `ID` = '$ID';";
            $conn->query($sql);
        }
        #przeniesienie do edycji profilu gdy sie uda zmienic hasło lub wraca do formularza zmiany hasła
        if(!$r->error){
            unset($_SESSION['reset_password']);
            header('Location: ../index.php?page=editProfile');
        }else{
            $_SESSION['reset_password'] = $r;
            header('Location: ../index.php?page=passwordReset');
        }
    }
    #sprawdzenie czy użytkownik nie jest zalogowany
    if(isset($_SESSION['isLogged']) == false) {

        $readyReset = false;
        #zmienna, która ustawiamy na false gdy mail lub kod weryfikacyjny jest zły lub podane hasło
        if (!isset($r->newPassword) && !isset($r->repeatPassword)) {
            if (strcmp($_POST['newPassword'], $_POST['repeatPassword']) == 0) {
                $password = $_POST["newPassword"];
                $r->password['field'] = $password;
                if (!preg_match("/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,20}$/", $password) && !empty($password)) {
                    $r->newPassword['msg'] = "Hasło musi zawierac od 8 do 20 znaków";
                    $r->error = true;
                } else {
                    $readyReset = true;
                }
            } else {
                $r->newPassword['msg'] = "Podane hasła są rózne";
                $r->repeatPassword['msg'] = "Podane hasła są rózne";
                $r->error = true;
            }
        } else {
            $r->newPassword['msg'] = "Formularz hasło lub Powtórz hasło jest puste";
            $r->repeatPassword['msg'] = "Formularz hasło lub Powtórz hasło jest puste";
            $r->error = true;
        }


        #sprawdzenie czy mail jest przekazany w Get i czy nie jest pusty
        if (isset($_GET['email']) == true && empty($_GET['email']) == false) {
            $email = $_GET['email'];
        } else {
            if ($r->error == false) {
                $r->repeatPassword['msg'] = "Nastapił błąd w generowaniu linku do zmiany hasła, wygeneruj link ponownie.";
                $r->error = true;
                $readyReset = false;
            }

        }
        #sprawdzenie czy kod weryfikacyjny jest przekazywany w Get i czy nie jest pusty
        if (isset($_GET['vkod']) == true && empty($_GET['vkod']) == false) {
            $vkey = $_GET['vkod'];
        } else {
            if ($r->error == false) {
                $r->repeatPassword['msg'] = "Nastapił błąd w generowaniu linku do zmiany hasła, wygeneruj link ponownie.";
                $r->error = true;
                $readyReset = false;
            }
        }
        #mail i kod przekazany w linku jest poprawny
        if ($readyReset == true) {
            # wyszukanie z bazy dnaych rekordu z uzytkownikem o podanym mailu aby uzyskac id
            $sql = "SELECT * FROM `User` WHERE `Email` LIKE '$email';";
            $result = $conn->query($sql);
            if ($result->num_rows == 1) {
                $user = $result->fetch_assoc();

            } else {
                #przypadek gdy baza danych zwroci nie poprawne dane (nie moze byc 2 uzytkonikow o jednakowym mailu)
                if ($r->error == false) {
                    $r->repeatPassword['msg'] = "Nastapił błąd w generowaniu linku do zmiany hasła, wygeneruj link ponownie.";
                    $r->error = true;
                    $readyReset = false;
                }
            }
            #przypisanie do zmiennej daty wytworzenia linku z bazy danych
            $dateCreate = $user['ExpirationTime'];
            $dateEnd = $user['ExpirationTime'];
            #utowrzenie daty konca waznosci linku porzez dodanie 15 minut do daty pobranej z bazy danych
            date_add($dateEnd, date_interval_create_from_date_string('15 minutes'));
            $dateNow = $date = date("Y-m-d H:i:s");
            #sprawdzenie czy data konca waznosci linku jest wczesnijesz od obecnej w tej chwili daty
            if($dateEnd < $dateNow){
                $r->repeatPassword['msg'] = "Link wygasł wygeneruj nowy";
                $r->error = true;
                $readyReset = false;

            }

            if ($readyReset == true) {
                #zapytanie do bazy danych sprawdzajace czy kod weryfikacyjny jest prawdziwy i nie zostal wykorzystany
                $sql = "SELECT * FROM ForgotPasswordKey WHERE `VerificationKey` LIKE '$vkey' AND `WasUsed` = '0' AND `UserID` = '$user[ID]'
            LIMIT 1;";
                $result = $conn->query($sql);
                if ($result->num_rows == 1) {
                    #ustawienie w bazie danych kodu weryfikacyjnego na uzyty
                    $sql = "UPDATE ForgotPasswordKey SET `WasUsed` = 1 WHERE `VerificationKey` LIKE '$vkey' AND `WasUsed` = '0' AND `UserID` = '$user[ID]';";
                    $conn->query($sql);

                    $password = md5($_POST["newPassword"]);
                    $sql = "UPDATE User SET `Password` = '$password' WHERE `ID` = '$user[ID]';";
                    $conn->query($sql);
                } else {
                    #przypek gdy jest kilka takich samych kodów weryfikacyjnych (na razie nie mozliwe)
                    if ($r->error == false) {
                        $r->repeatPassword['msg'] = "Nastapił błąd w generowaniu linku do zmiany hasła, wygeneruj link ponownie.";
                        $r->error = true;
                        $readyReset = false;
                    }
                }
            }


        } else {
            #Przypadek gdy link jest uszkodzony nie ma w sobie poprawnego maila lub kodu
            if ($r->error == false) {
                $r->repeatPassword['msg'] = "Nastapił błąd w generowaniu linku do zmiany hasła, wygeneruj link ponownie.";
                $r->error = true;
                $readyReset = false;
            }
        }

        if (!$r->error) {
            unset($_SESSION['reset_password']);
            header('Location: ../index.php?page=login');
        } else {
            $_SESSION['reset_password'] = $r;
            if (isset($_GET['email']) && isset($_GET['vkod'])) {
                $vkey = $_GET['vkod'];
                $email = $_GET['email'];
                header("Location: ../index.php?page=passwordReset&vkod=$vkey&email=$email");
            } else {
                header('Location: ../index.php?page=passwordReset');
            }

        }
    }
}

?>