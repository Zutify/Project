<?php
include 'db_connection.php';
session_start();

// pobiera dane o zalogowanym uzytkowniku

if(isset($_SESSION['isLogged']))
{
    if(isset($_SESSION['userID']))
    {
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
    }      
    else
        echo "BŁĄD 1";
}
else
    echo "BŁĄD 2";