<?php

//sprawdza czy użytkonik jest kierowcą
function isUserDriver(){
    include 'db_connection.php';
    $sql = "SELECT * FROM usercar WHERE `UserID`=".$_SESSION['userID'].";";
    $result = $conn->query($sql);
    //zwraca true jeżeli użytkownik jest kierowcą, a false gdy nim nie jest
    if($result->num_rows > 0){
        return true;
    } else{
        return false;
    }
}

//Sprawdza czy kierowca ma lub miał jakieś przejazdy
function doesDriverHaveRides(){
    include 'db_connection.php';
    $sql = "SELECT * FROM RideInfo WHERE `Driver`=".$_SESSION['userID'].";";
    $result = $conn->query($sql);
    //zwraca true jeżeli użytkownik jest kierowcą, a false gdy nim nie jest
    if($result->num_rows > 0){
        return true;
    } else{
        return false;
    }
}
require_once('ride_details.php');
//Wypisuje przejazdy kierowcy
function printRides($val){
    include 'db_connection.php';
    // true - wyświetla przejazdy w których jesteś kierowcą, false - pasażerem
    if($val){
        $sql = "SELECT * FROM RideInfo WHERE `Driver`=".$_SESSION['userID']." ORDER BY `Date` DESC, `LeavingTime` DESC LIMIT 10";
    }else{
        $sql = "SELECT * FROM RideInfo WHERE `ID` IN(SELECT `RideInfoID` FROM Ride WHERE `UserID`=".$_SESSION['userID'].") ORDER BY `Date` DESC, `LeavingTime` DESC LIMIT 10";
    }
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        # dla wszystkich przejazdów w bazie narazie
        echo '<ul class="list-group w-100">';
        
        while($row = $result->fetch_assoc())
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
                   
                   
                # wyświetlenie
                #echo $street['Street'].' -> '.$streetEnd['Street'].'<br>Places left : '.$row['PlacesLeft'].'<br>';
                #echo $row['LeavingTime'].' '.$row['Date'].'<br><br>';
                
            
            echo '<li class="my-4 list-group-item shadow"';
            if($row['Date'] < date("Y-m-d")){
                echo ' style="filter: invert(100%);">';
            }else
            echo '>';
            echo '    <a href="?page=rideDetails" class="text-body">
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
                        <!-- ilość ikonek w zależności od ilości miejsc -->';
                            echo '<div';
                            if($row['Date'] < date("Y-m-d")){
                                echo ' style="filter: invert(100%);">';
                            }else
                            echo '>';
                            showCarPlaces($row);
                            echo '</div>
                        </div>
                    </div>
                </a>
            </li>
            ';
                
                
            }
            else
               echo "Nie ma rekordów";
        }
        echo '</ul>';
        
    } else {
        echo "Brak przejazdów";
    }
}

function doesPassengerHaveRides(){
    include 'db_connection.php';
    $sql = "SELECT * FROM Ride WHERE `UserID`=".$_SESSION['userID'].";";
    $result = $conn->query($sql);
    //zwraca true jeżeli użytkownik jest kierowcą, a false gdy nim nie jest
    if($result->num_rows > 0){
        return true;
    } else{
        return false;
    }
}
