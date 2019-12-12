<?php

function showAllRides()
{
    include 'db_connection.php';
    session_start();
    include 'ride_details.php';
    
    if(isset($_SESSION['ridesProfile']))
        unset($_SESSION['ridesProfile']);
    
    // pobranie informacji z bazy danych
    $sql = "SELECT * FROM RideInfo WHERE `PlacesLeft` != '0' ORDER BY `Date`, `LeavingTime` ASC";
            
    // przechowanie wyników startu z bazy danych w tabeli
    $rides = $conn->query($sql);
    if ($rides->num_rows > 0) {
        # dla wszystkich przejazdów w bazie narazie
        echo '<ul class="list-group w-100">';
        
        //ustawienie zmiennej sesyjnej do przekazania do rideDetails
        $_SESSION['userRideInfo'] = $rides;
        
        $tripNum = 0;
        while($row = $rides->fetch_assoc())
        {
            # zapytania do bazy o adresy przejazdu
            $start = "SELECT * FROM Address WHERE `ID` = '".$row['Start']."'";
            $stop = "SELECT * FROM Address WHERE `ID` = '".$row['Destination']."'";
            
            // przechowanie wyników celu z bazy danych w tabeli
            $address = $conn->query($start);
            $addressEnd = $conn->query($stop);
            # sprawdzenie czy dobrze pobrało
            if ($address->num_rows > 0 and $addressEnd->num_rows > 0) {
                $street = $address->fetch_assoc();
                $streetEnd = $addressEnd->fetch_assoc();
                
                echo '
            <li class="my-4 list-group-item shadow">
                <a href="?page=rideDetails&rideID='.$row['ID'].'" class="text-body">
                    <div class="h3 p-4">
                        <div id="" class="d-inline-block">
                            '.$street['Street'].'
                        </div>
                        <i class="fa fa-arrow-right d-inline-block" aria-hidden="true"></i>
                        <div id="" class="d-inline-block">
                            '.$streetEnd['Street'].'
                        </div>
                        <!-- dolna cześć elementu listy z godziną i ilością miejsc-->
                        <div class="d-flex justify-content-between mt-3">
                            <div id="" class="text-primary d-inline-block">';
                                echo $row['Date'].' : ';
                                if($row['LeavingTime'][0] == "0")
                                    echo substr($row['LeavingTime'], 1, 4);
                                else
                                    echo substr($row['LeavingTime'], 0, 5);
                            echo'
                            </div>
                        <!-- ilość ikonek w zależności od ilości miejsc -->
                            <div>';
                            showCarPlaces($row);
                            echo '</div>
                        </div>
                    </div>
                </a>
            </li>
            ';
            $tripNum += 1;
                
            }
            else
               echo "Nie ma rekordów";
        }
        echo '</ul>';
        
    } else {
        echo "Brak przejazdów";
    }
    
}
?>