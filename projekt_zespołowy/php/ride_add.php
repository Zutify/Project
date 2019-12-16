
<?php
include 'db_connection.php';
session_start();
include 'user_data.php';

//obsługa formularza z rideAdd
if(isset($_POST["rideConfirm"]))
{
    // pobranie informacji z tablicy sesyjnej
    $start = $_POST['start'];
    $dest = $_POST['dest'];
    $time = $_POST['tripStartTime'];
    $date = $_POST['tripStartDate'];
    $places = $_POST['places'];
 
    // widełki 15 minutowe od czasu wpisanego do przejazdu
    // sprawdzenie czasu przejazdów wpisanych i tych z bazy
    // subtract Time
    $T = strtotime($time);
    $T = $T - (15*60);
    $timeBefore = date("H:i:s.u", $T);
    // add Time
    $T = strtotime($time);
    $T = $T + (15*60);
    $timeAfter = date("H:i:s.u", $T);
    
    // sprawdzenie czy użytkownik nie ma już dodanego przejazdu o tej porze żeby nie kolidowało
    $rideSql = "SELECT * from RideInfo where `Driver` = $id AND `Date` = '$date'";
    
    $rideRes = $conn->query($rideSql);
    if($rideRes->num_rows > 0)
    {
        // sprawdzenie dla wszystkich przejazdów
        while($res = $rideRes->fetch_assoc())
        {
            // sprawdzenie czy istnieje przejazd w widełkach 15 minutowych
            if(($timeBefore < $res['LeavingTime']) and ($res['LeavingTime'] < $timeAfter))
            {
                $_SESSION['addError'] = "Nie można dodać przejazdu - nakłada sie na istniejący przejazd";
                header('Location: ../index.php?page=rideAdd');
                exit();
            }
        }
        
    }
    // dodanie przejazdu do bazy danych
    
    // dodanie adresów do bazy danych
    // pobranie informacji z bazy danych
    $sql = "SELECT * FROM Address WHERE `Street` like '$start%'";
        
    // jeśli adres już istnieje w bazie danych to nie dodawać znowu
    $startR = $conn->query($sql);
    if ($startR->num_rows > 0) {
        $row = $startR->fetch_assoc();
        // ustawienie start id
        $_SESSION['startID'] = $row['ID'];
    } else {
        // jeśli adres nie istnieje w bazie danych
       $sql2 = "INSERT into Address VALUES (NULL, '$start', 0, 50, 50)";
       $result = $conn->query($sql2);
       if(!$result)
       {
            $_SESSION['rideError'] = "Błąd przy dodawaniu adresu startowego";
            header('Location: ../index.php?page=rideAdd');
            exit();
       }
        else
        {
            // pobranie ID po wstawieniu rekordu
            $sql = "SELECT * FROM Address WHERE `Street` like '$start%'";
            $startR = $conn->query($sql);
            if ($startR->num_rows > 0) {
                $row = $startR->fetch_assoc();
                // ustawienie start id
                $_SESSION['startID'] = $row['ID'];
                }
        }
    }
         
    // sprawdzenie czy istnieje w bazie    
    $sql = "SELECT * FROM Address WHERE `Street` like '$dest%'";
    
    // przechowanie wyników celu z bazy danych w tabeli
    $destR = $conn->query($sql);
    if ($destR->num_rows > 0) {
        $row = $destR->fetch_assoc();
        $_SESSION['destID'] = $row['ID'];
        
    } else {
        // jeśli adres nie istnieje w bazie danych
       $sql = "INSERT into Address VALUES (NULL, '$dest', 0, 48, 49)";
       $result = $conn->query($sql);
       if(!$result)
       {
            $_SESSION['rideError'] = "Błąd przy dodawaniu adresu dest";
            header('Location: ../index.php?page=rideAdd');
            exit();
       }
        else
        {
            // pobranie ID po wstawieniu rekordu
            $sql = "SELECT * FROM Address WHERE `Street` like '$dest%'";
            $destR = $conn->query($sql);
            if ($destR->num_rows > 0) {
                $row = $destR->fetch_assoc();
                // ustawienie dest id
                $_SESSION['destID'] = $row['ID'];
                }
        }
    }
    
    // dodanie przejazdu do bazy RideInfo
    // $id - id zalogowanego użytkownika, z user_data.php
    $sqlRide = "INSERT into RideInfo VALUES (NULL, '$id', '$date', '".$_SESSION['startID']."', '".$_SESSION['destID']."', '$places', '$places', '$time', 0)";
    $resultRide = $conn->query($sqlRide);
    if(!$resultRide)
    {
        $_SESSION['rideError'] = "Błąd przy dodawaniu przejazdu";
        header('Location: ../index.php?page=rideAdd');
        exit();
    }
    else
    {
        // kasowanie zmiennych sesyjnych związanych z dodaniem przejazdu
        unsetRideAddVariables();
        header('Location: ../index.php?page=menu');
        exit();
    }
}

function unsetRideAddVariables()
{
    // kasowanie zmiennych sesyjnych związanych z dodaniem przejazdu
    /*if(isset($_SESSION['addStart']))
        unset($_SESSION['addStart']);
    if(isset($_SESSION['addDest']))
        unset($_SESSION['addDest']);
    if(isset($_SESSION['addTime']))
        unset($_SESSION['addTime']);
    if(isset($_SESSION['addPlaces']))
        unset($_SESSION['addPlaces']);*/
    if(isset($_SESSION['startID']))
        unset($_SESSION['startID']);
    if(isset($_SESSION['destID']))
        unset($_SESSION['destID']);
    if(isset($_SESSION['rideError']))
        unset($_SESSION['rideError']);
    /*if(isset($_SESSION['streetStart']))
        unset($_SESSION['streetStart']);
    if(isset($_SESSION['streetDest']))
        unset($_SESSION['streetDest']);
    if(isset($_SESSION['startLocal']))
        unset($_SESSION['startLocal']);
    if(isset($_SESSION['destLocal']))
        unset($_SESSION['destLocal']);*/
}   


?>