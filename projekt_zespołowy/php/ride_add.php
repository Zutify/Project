<?php
include 'db_connection.php';
include 'user_data.php';

// obsługa formularza z rideAdd
if(isset($_POST["submit"]))
{
    if(!empty($_POST['start']) and !empty($_POST['dest']) and !empty($_POST['places']))
    {
        // wyciągnięcie z adresu ulicy i numeru jeśli podano
        $start = $_POST['start'];
        $dest = $_POST['dest'];
    
        $split1 = explode(", ", $start);
        $split2 = explode(", ", $dest);
        
        print_r($split1);
        print_r($split2);
        
        if(sizeof($split1) > 1)
        {
            $street = $split1[0];
            $split = explode(" ", $street);
            if(sizeof($split) > 1)
            {
                $num = intval($split[sizeof($split)-1]);
                if(is_int($num)!= 0)
                {
                    $streetName = "";
                    $_SESSION['startLocal'] = $split[sizeof($split)-1];
                    for($i=0; $i < sizeof($split)-1; $i++)
                    {
                        $streetName .=$split[$i]." "; 
                        $_SESSION['streetStart'] = $streetName;
                    }
                }
            }
            
            $_SESSION['addStart'] = $street;
        }
        
        if(sizeof($split2) > 1)
        {
            $street = $split2[0];
            $split = explode(" ", $street);
            if(sizeof($split) > 1)
            {
                $num = intval($split[sizeof($split)-1]);
                if(is_int($num)!=0)
                {
                    $streetName = "";
                    $_SESSION['destLocal'] = $split[sizeof($split)-1];
                    for($i=0; $i < sizeof($split)-1; $i++)
                    {
                        $streetName .=$split[$i]." "; 
                        $_SESSION['streetDest'] = $streetName;
                    }
                }
            }
            
            $_SESSION['addDest'] = $street;
        }
        
        
        // docelowo pobranie godziny
        $_SESSION['addTime'] = "9:40";
        // docelowo pobranie ilości wolnych miejsc
        $_SESSION['addPlaces'] = intval($_POST['places']);
        
        header('Location: ../index.php?page=rideAddConfirm');
        exit();
    }
    else
    { 
        header('Location: ../index.php?page=rideAdd');
        exit();
    }   
}

//obsługa formularza z rideAddConfirm
if(isset($_POST["rideConfirm"]))
{
    // pobranie informacji z tablicy sesyjnej
    $start = $_SESSION['addStart'];
    $dest = $_SESSION['addDest'];
    $time = $_SESSION['addTime'];
    $places = $_SESSION['addPlaces'];
 
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
            header('Location: ../index.php?page=rideAddConfirm');
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
            header('Location: ../index.php?page=rideAddConfirm');
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
    $sqlRide = "INSERT into RideInfo VALUES (NULL, '$id', '2019-12-01', '".$_SESSION['startID']."', '".$_SESSION['destID']."', '$places', '$places', '$time')";
    $resultRide = $conn->query($sqlRide);
    if(!$resultRide)
    {
        $_SESSION['rideError'] = "Błąd przy dodawaniu przejazdu";
        header('Location: ../index.php?page=rideAddConfirm');
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
    if(isset($_SESSION['addStart']))
        unset($_SESSION['addStart']);
    if(isset($_SESSION['addDest']))
        unset($_SESSION['addDest']);
    if(isset($_SESSION['addTime']))
        unset($_SESSION['addTime']);
    if(isset($_SESSION['addPlaces']))
        unset($_SESSION['addPlaces']);
    if(isset($_SESSION['startID']))
        unset($_SESSION['startID']);
    if(isset($_SESSION['destID']))
        unset($_SESSION['destID']);
    if(isset($_SESSION['rideError']))
        unset($_SESSION['rideError']);
    if(isset($_SESSION['streetStart']))
        unset($_SESSION['streetStart']);
    if(isset($_SESSION['streetDest']))
        unset($_SESSION['streetDest']);
    if(isset($_SESSION['startLocal']))
        unset($_SESSION['startLocal']);
    if(isset($_SESSION['destLocal']))
        unset($_SESSION['destLocal']);
}   

?>