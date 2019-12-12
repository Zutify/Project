<?php
session_start();
#zalaczamy skrypt, które importuje dane użytkownika
include 'db_connection.php';
include 'user_data.php';

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


#zmienna ustawiana na true gdy jakies pole z formularza jest inne niż dane z bazy dannych
$needUpdate = false;
$allCorrect = true;

#sprawdzenie czy przycisk do edycji zostal wcisniety
if(isset($_POST['submitProfile']) == true){
    #sprawdzenie czy input z jest ustawiony w metodzie Post
    if(isset($_POST['profileEmail']) == true) {
        $r->profileEmail['field'] = $_POST['profileEmail'];
        #sprawdzenie czy email z formularza jest identyczny z emailem zapisanym w bazie danych
        if($_POST['profileEmail'] != $Email){
            #sprawdzenie czy mail jest zarejestrowany na domene zut
            if(!preg_match("/^[A-Za-z0-9]+\@zut\.edu\.pl$/D", $_POST["profileEmail"])){
                $r->profileEmail['msg'] = "Podany email musi byc zarejstrowany na domenie zut.edu.pl";
                $r->error = true;
                $allCorrect = false;
            }else{
                $Email = $_POST['profileEmail'];
                $needUpdate = true;
            }
        }
    }
    #sprawdzenie czy input jest ustawiony w metodzie Post
    if(isset($_POST['profileName']) == true){
        $r->profileName['field'] = $_POST['profileName'];
        #sprawdznie czy formularz jest identyczny z imienie zawartym w bazie danych
        if($_POST['profileName'] != $Name){
            #sprawdzenie czy imie zawiera tylko litery i znaki
            if (!preg_match("/^[a-zA-Z ]*$/",$_POST['profileName'])) {
                $r->profileName['msg'] = "Imię moze zawierać tylko litery i spacje.";
                $r->error = true;
                $allCorrect = false;
            }else{
                $needUpdate = true;
                $Name = $_POST['profileName'];
            }
        }
    }
    #sprawdzenie czy input jest ustawiony w metodzie Post
    if(isset($_POST['phoneNumber']) == true){
        $r->phoneNumber['field'] = $_POST['phoneNumber'];
        #zapisujem numer telefonu do zmiennej bez spacji jezeli sa zwarte w formularzu
        $nr = str_replace(' ','',$_POST['phoneNumber']);
        #sprawdzenie czy formularz jest identyczny z nr telefonu zawrtym w bazie dnaych
        if($nr != $PhoneNumber){
            #sprawdzenie czy numer telefonu to liczba
            if (!preg_match("/^[0-9]{9}$/",$nr)) {
                $r->phoneNumber['msg'] = "Numer telefonu musi zawierać 9 cyfry";
                $r->error = true;
                $allCorrect = false;
            }else{
                $PhoneNumber = $nr;
                $needUpdate = true;
            }
        }
    }
    #sprawdzamy czy jakies pole została zmienione i wymaga aktułalizacji w bazie danych
    #sprawdzamy czy jakies pole, które został zmienione jest bledne
    if($needUpdate == true && $allCorrect == true){
        #zapytanie do bazy danych
        $sql = "UPDATE User SET `Name` = '$Name',`Email` = '$Email', `PhoneNumber` = '$PhoneNumber' WHERE `ID` = '$id';";
        $conn->query($sql);
    }

    if(!$r->error){
        if(isset($_SESSION['edit_profile']))
            unset($_SESSION['edit_profile']);
        header('Location: ../index.php?page=editProfile');
        exit();

    }else{
        $_SESSION['edit_profile'] = $r;
        header('Location: ../index.php?page=editProfile');
        exit();

    }



}



?>