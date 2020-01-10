<?php

include 'db_connection.php';
session_start();
include 'user_data.php';
    
    $hour = intval(date("H")) + 1;

    $sql = "SELECT * from RideInfo Where `Date` = '".date("Y-m-d")."' and  `LeavingTime` = '".date($hour.":i:00.u")."'";
    
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
       
        while($row = $result->fetch_assoc())
        {
            $sqlStatus = 'UPDATE RideInfo SET `Status` = 1 WHERE `ID` ='.$row['ID'].'';
            $result2 = $conn->query($sqlStatus);
            // sprawdzenie statusu przejazdu
            // 0 - dodany do bazy
            // 1 - trwający
            // 2 - zakończony
            // 3 - odwołany
        }
    }
?>