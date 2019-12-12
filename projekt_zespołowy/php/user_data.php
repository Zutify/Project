<?php
include 'db_connection.php';

// pobiera dane o zalogowanym uzytkowniku

if(isset($_SESSION['isLogged']))
{
    if(isset($_SESSION['userID']))
    {
        // pobieranie zmiennych z tabeli User
        $id = $_SESSION['userID'];
        $sql = "SELECT * FROM User WHERE `ID`='$id'";
        $result = $conn->query($sql);
        $user = $result->fetch_assoc();
        
        // zmienne do wykorzystania na stronach po załączeniu pliku
        // zmienne jak nazwa kolumny w tabeli żeby uniknąć powtórzeń zmiennych 
        $Name = $user['Name'];
        $Surname = $user['Surname'];
        $Login = $user['Login'];
        //$Password = $user['Password'];
        $Email = $user['Email'];
        $PhoneNumber = $user['PhoneNumber'];
        
        // pobieranie zmiennych o samochodzie Uzytkownika o ile posiada
        $sql = "SELECT * FROM UserCar WHERE `UserID`='$id'";
        $result = $conn->query($sql);
        $user = $result->fetch_assoc();
        // jeśli istnieje jakiś rekord
        if($user)
        {
            $carBrand = $user['Brand'];
            $carModel = $user['Model'];
            $description = $user['Description'];
        }
            
    }      
    else
        echo "Nie ustawione ID";
}
else
    echo "Nie zalogowany";
?>