<?php
include 'db_connection.php';

// W TRAKCIE ROBIENIA, PROSZE NIE ZMIENIAĆ

// jesli zmienne sa ustawione
if(isset($_SESSION['start']) and isset($_SESSION['dest']))
{
    $start = $_SESSION['start'];
    $dest = $_SESSION['dest'];
    
    // pobranie informacji z bazy danych
    $sql = "SELECT ID FROM Address WHERE `Street` like '$start%'";
    
    // przechowanie wyników startu z bazy danych w tabeli
    $start = $conn->query($sql);
    if ($start->num_rows > 0) {
        while($row = $start->fetch_assoc()) {
            $startID = $row['ID'];
        }
    } else {
        echo "0 results start";
    }
    
    
    $sql = "SELECT ID FROM Address WHERE `Street` like '$dest%'";
    
    // przechowanie wyników celu z bazy danych w tabeli
    $dest = $conn->query($sql);
    if ($dest->num_rows > 0) {
        while($row = $dest->fetch_assoc()) {
            $destID = $row['ID'];
        }
    } else {
        echo "0 results dest";
    }
    
    $sql = "SELECT * FROM RideInfo WHERE `Start` = '$startID' and `Destination` = '$destID'";
    // przechowanie wyników celu z bazy danych w tabeli
    $trip = $conn->query($sql);
    if ($trip->num_rows > 0) {
        while($row = $trip->fetch_assoc()) {
            echo $row['ID']." ";
            echo $row['Driver']." ";
            echo $row['Date']." ";
            echo $row['Start']." ";
            echo $row['Destination']." ";
            echo $row['Places']." ";
            echo $row['LeavingTime']." ";
        }
    } else {
        echo "0 results ride info";
    }
}
?>