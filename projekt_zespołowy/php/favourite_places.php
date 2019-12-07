<?php
include 'db_connection.php';
include 'ride_details.php';
include 'user_data.php';

    // pobranie informacji z bazy danych
    $sql = "SELECT `RideInfoID` FROM Ride WHERE `UserID` = $id";
            
    // wszystkie wyniki gdzie użytkownik brał udział w przejeździe
    $rides = $conn->query($sql);
    if ($rides->num_rows > 0) {
       
       #echo "Jestem";
       #print_r($rides);
       // dla każdego przejazdu
        if($row = $rides->fetch_assoc())
        {
            # zapytania do bazy o adresy przejazdu
            $destination = "SELECT COUNT(`ID`), Destination as dest FROM RideInfo WHERE `ID` in (SELECT `RideInfoID` from Ride WHERE `UserID` = $id) GROUP BY `Destination`ORDER BY COUNT(`ID`) DESC LIMIT 3";
            
            $result = $conn->query($destination);
            # sprawdzenie czy istnieją rekordy
            if ($result->num_rows > 0 ) {
                echo '<ul class="list-group w-100">';
            //wypisanie wszystkich adresów docelowych ograniczonych do 3
                while($row2 = $result->fetch_assoc())
                {
                    $destID = $row2['dest'];
                    // wyciagniecie z bazy adresu o danym ID
                    $address = "SELECT `Street` FROM Address WHERE `ID` = $destID";
                    
                    // jeśli istnieją to wyświetlić adresy
                    $street = $conn->query($address);
                    if ($street->num_rows > 0) {
                        $row3 = $street->fetch_assoc();
                        #echo "Udało sie";
                        echo '<li class="my-4 list-group-item shadow"><div class="h2">';
                            echo $row3['Street'];
                        echo '</div></li>';
                    }
                }
                echo '<ul>';
            }
            else
               echo '<div class="h2 text-danger">Błąd</div>';
        }
        
    } else {
        echo '<div class="h2 text-danger">Nie brałeś udziału w żadnym przejeździe</div>';
    }



?>