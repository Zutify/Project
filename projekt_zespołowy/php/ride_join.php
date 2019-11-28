<?php
include 'db_connection.php';
session_start();
include 'user_data.php';

// sprawdza czy jest ustawione rideInfo w tablicy sesyjnej i dodaje 
// użytkownika do przejazd po czym przenosi do menu 
// w user data informacje o zalogowanym uzytkowniku
// ustawiane w ride_details zawiera info o przejezdzie z tabli rideInfo
if(isset($_SESSION['rideInfo']))
{
    $ride = $_SESSION['rideInfo'];
    // zmniejszenie ilosci wolnych miejsc w przejezdzie
    // dodanie rekordu do tabeli ride gdzie łączymy id uzytkownika z id przejazdu
    $rideID = $ride['ID'];
    // sprawdzenie czy uzytkownik nie jest juz w przejezdzie
    $sql = "Select * FROM Ride WHERE `UserID`='$id' AND `RideInfoID` ='$rideID'";
    $result = $conn->query($sql);
    $exist = $result->fetch_assoc();
        
    // jesli już dodany tam to nie dodawać znowu
    if($exist)
    {
        $_SESSION['rideJoinMessage']= "Wcześniej dodany do tego przejazdu";
        header('Location: ../index.php?page=rideDetails');
        exit();
    }
    else
    {
        // update dostępnych miejsc
        $placesLeft = $ride['PlacesLeft'] -1;
        $sql = "Update RideInfo SET `PlacesLeft`='$placesLeft' WHERE `ID` ='$rideID'";
        // błędnie zakończony update
        if(!$result = $conn->query($sql))
        {
            $_SESSION['rideJoinMessage'] = "Błąd przy aktualizowaniu miejsc";
            header('Location: ../index.php?page=rideDetails');
            exit();
        }
        else
        {
            // dodanie do tabeli ride
            $sqlInsert = "Insert INTO Ride VALUES ('$id', '$rideID')";
            // dodano do przejadu
            if($result2 = $conn->query($sqlInsert))
            {
                $_SESSION['rideJoinSuccess'] =  "Dodano do przejazdu";
                header('Location: ../index.php?page=rideDetails');
                exit();
            }
            else
            {
            // błąd przy dodawaniu
                $_SESSION['rideJoinMessage'] = "Błąd przy dodawaniu do przejazdu";
                header('Location: ../index.php?page=rideDetails');
                exit();
            }
        }
    }
}
else
// echo "Nie ustawione info o przejezdzie";
   header('Location: ../index.php?page=rideInfo');
?>