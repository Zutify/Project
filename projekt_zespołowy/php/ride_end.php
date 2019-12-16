<?php
include 'db_connection.php';
session_start();
include 'user_data.php';

// obsługuje akcje z przejazdów użytkownika

if(isset($_SESSION['rideEndID']))
{
    // wczytanie id przejazdu z sesji
    $rideID = $_SESSION['rideEndID'];
    $sql = "";
    
    if(isset($_SESSION['rideCancel']))
    {
        // anulowanie przejazdu
        unset($_SESSION['rideCancel']);
        $sql = 'UPDATE RideInfo SET `Status` = 3 WHERE `ID` ='.$rideID.'';
    }
    // zakończenie przejazdu
    else
        $sql = 'UPDATE RideInfo SET `Status` = 2 WHERE `ID` ='.$rideID.'';
    echo $sql;
    $result = $conn->query($sql);
    if(!$result)
    {
        // nie udało się
        header('Location: ../index.php?page=rideList');
        exit();
    }
    else
    {
        // udało sie
        if(isset($_SESSION['rideEndID']))
            unset($_SESSION['rideEndID']);
        header('Location: ../index.php?page=menu');
        exit();
    }
}
?>