<?php

//sprawdza czy użytkonik jest kierowcą
function isUserDriver(){
    include 'db_connection.php';
    $sql = "SELECT * FROM UserCar WHERE `UserID`=".$_SESSION['userID'].";";
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
    session_start();
    include 'user_data.php';
    
    // true - wyświetla przejazdy w których jesteś kierowcą, false - pasażerem
    if($val){
        $sql = "SELECT * FROM RideInfo WHERE `Driver`=".$_SESSION['userID']." ORDER BY `Date` DESC, `LeavingTime` DESC LIMIT 10";
    }else{
        $sql = "SELECT * FROM RideInfo WHERE `ID` IN(SELECT `RideInfoID` FROM Ride WHERE `UserID`=".$_SESSION['userID'].") ORDER BY `Date` DESC, `LeavingTime` DESC LIMIT 10";
    }
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        # dla wszystkich przejazdów w bazie narazie
        echo '<ul class="list-group w-75 mx-auto mt-5">';
        // zapisanie zapytania do zmiennej sesyjnej
        $_SESSION['userRideInfo'] = $result;
        $_SESSION['ridesProfile'] = $result;
        
        $num = 0;
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
                
            // sprawdzenie statusu przejazdu
            // 0 - dodany do bazy
            // 1 - trwający
            // 2 - zakończony
            // 3 - odwołany
            if($row['Status'] == 0)
                echo '<li class="my-4 list-group-item shadow"';
            else if($row['Status'] == 1)
                echo '<li class="my-4 list-group-item shadow border border-success"';
            else if($row['Status'] == 2)//($row['Date'] < date("Y-m-d")){
                    echo '<li class="my-4 list-group-item shadow" style="filter: drop-shadow(2px 2px 2px gray) invert(25%)"';
            else if($row['Status'] == 3)
                echo '<li class="my-4 list-group-item shadow border border-danger"';
            
            echo '>';
            echo '    <a href="?page=rideDetails&rideID='.$row['ID'].'" class="text-body">
                    <div class="h3 p-4">
                        <div id="" class="d-inline-block">
                            '.$street['Street'].'
                        </div>
                        <i class="fa fa-arrow-right d-inline-block" aria-hidden="true"></i>
                        <div id="" class="d-inline-block">
                            '.$streetEnd['Street'].'
                        </div>';
                        
                        // do zakończenia przejazdu
                        if($row['Status'] == 1 and $row['Driver'] == $id)
                        {
                            // zapisanie ID przejazdu w sesji
                            $_SESSION['rideEndID'] = $row['ID'];
                            echo 
                            '<div class="h4" style="float:right";>ZAKOŃCZ PRZEJAZD</div><div style="clear:both";></div>';
                        }
                        // do anulowania przejazdu
                        else if($row['Status'] == 0 and $row['Driver'] == $id)
                        {
                            echo 
                            '<div class="h4" style="float:right";>ANULUJ PRZEJAZD</div><div style="clear:both";></div>';
                        }
                        
                        echo '
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
                                echo ' style="filter: grayscale(20%);">';
                            }else
                            echo '>';
                            showCarPlaces($row);
                            echo '</div>
                        </div>
                    </div>
                </a>
            </li>
            ';
            $num = $num +1;
                
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
