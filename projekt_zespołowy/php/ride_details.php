<?php
include 'db_connection.php';
session_start();

// jesli zmienne sa ustawione
if(isset($_SESSION['start']) and isset($_SESSION['dest']))
{
    $start = $_SESSION['start'];
    $dest = $_SESSION['dest'];
        
    // pobranie informacji z bazy danych
    $sql = "SELECT * FROM Address WHERE `Street` like '$start%'";
        
    // przechowanie wyników startu z bazy danych w tabeli
    $start = $conn->query($sql);
    if ($start->num_rows > 0) {
        $row = $start->fetch_assoc();
        $startID = $row['ID'];
        // całe info o adresie
        $_SESSION['startAddress'] = $row;
        
    } else {
        $_SESSION['addressError'] = "Brak przejazdów z podanego miejsca";
    }
         
        
    $sql = "SELECT * FROM Address WHERE `Street` like '$dest%'";
    
    // przechowanie wyników celu z bazy danych w tabeli
    $dest = $conn->query($sql);
    if ($dest->num_rows > 0) {
        $row = $dest->fetch_assoc();
        $destID = $row['ID'];
        // całe info o adresie
        $_SESSION['destAddress'] = $row;
        
    } else {
        $_SESSION['addressError'] = "Brak przejazdów do podanego miejsca";
    }
        
    $sql = "SELECT * FROM RideInfo WHERE `Start` = '$startID' and `Destination` = '$destID' and `PlacesLeft` != 0";
    // przechowanie wyników celu z bazy danych w tabeli
    $trip = $conn->query($sql);
    if ($trip->num_rows > 0) {
        //$row = $trip->fetch_assoc();
        // całe info o podróżach z miejsca do miejsca
        $_SESSION['trip'] = $trip;
    } else {
        $_SESSION['addressError'] = "Brak przejazdów o podanych lokalizacjach";
    }
}

// funkcja pokazująca przejazdy o podanym starcie i destynacji
function showRides()
{
    if(isset($_SESSION['trip']))
    {  
    $trip = $_SESSION['trip'];
   
        $tripNum = 0;
        while($row = $trip->fetch_assoc())
        {
        echo '
        <li class="my-4 list-group-item shadow">
            <a href="?page=rideDetails&tripNumber='.$tripNum.'" class="text-body">
                <div class="h3 p-4">
                    <div id="" class="d-inline-block">
                        '.$_SESSION['start'].'
                    </div>
                    <i class="fa fa-arrow-right d-inline-block" aria-hidden="true"></i>
                    <div id="" class="d-inline-block">
                        '.$_SESSION['dest'].'
                    </div>
                    <!-- dolna cześć elementu listy z godziną i ilością miejsc-->
                    <div class="d-flex justify-content-between mt-3">
                        <div id="" class="text-primary d-inline-block">
                            Dzisiaj : ';
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
    }
    else if(isset($_SESSION['addressError']))
        echo '<div class="h2 text-danger">'.$_SESSION['addressError'].'</div>';
}

// pokazuje miejsca na zielono i czerwono w zależności od ich ilości
function showCarPlaces($trip)
{
    if(is_array($trip))
    {
        for($i = 1; $i <= $trip['Places']; $i++)
        {
            // jeśli wolne to na zielono
            if($i <= $trip['PlacesLeft'])
            {
                echo'
                <i class="fa fa-male d-inline-block mx-1" aria-hidden="true" style="font-size: 52px; color:green;"></i>';
            }
            // jeśli zajęte to na czerwono
            else
            {
                echo'
                <i class="fa fa-male d-inline-block mx-1" aria-hidden="true" style="font-size: 52px; color:red;"></i>';
            }
        }
    }
    else if(is_int($trip))
    {
        for($i = 1; $i <= $trip; $i++)
        {
            echo'
            <i class="fa fa-male d-inline-block mx-1" aria-hidden="true" style="font-size: 52px; color:green;"></i>';
           
        }
    }
}

// pobiera informacje wybranym o przejezdzie do tablicy sesyjnej 
function checkRideInfo()
{
    include 'db_connection.php';
    session_start();
    
    // dla obsługi aktualne przejazdy użytkownika i dla aktualnych przejazdów wszystkich
    if(isset($_SESSION['userRideInfo'] ))
    {
        // pobranie z tabeli RideInfo id przejazdu z get'a
        if(isset($_GET['rideID']))
        {
            $rideID = $_GET['rideID'];
            
            // zapytanie do uzyskania informacji o przejeździe
            $sql = "SELECT * from RideInfo WHERE `ID` = $rideID";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) 
            {
                // pobranie informacji o przejeździe
                $row = $result->fetch_assoc();   
                // przekazanie informacji w formie tablicy do tablicy sesyjnej
                $_SESSION['rideInfo'] = $row;
                
                // ustawienie startu i stopu przejazdu w tablicy sesyjnej
                $sqlS = "SELECT * from Address WHERE `ID`= ".$row['Start']."";
                $sqlD = "SELECT * from Address WHERE `ID`=".$row['Destination']."";
                
                $resS = $conn->query($sqlS);
                $resD = $conn->query($sqlD);
                // jeśli istnieją rekordy
                if($resS->num_rows > 0 and $resD->num_rows > 0)
                {
                    // pobranie danych i ustawienie startu i destynacji w sesji
                    $start = $resS->fetch_assoc();
                    $dest = $resD->fetch_assoc();
                    $_SESSION['start'] = $start['Street'];
                    $_SESSION['dest'] = $dest['Street'];
                }
                else
                    echo "Brak adresów w bazie";
                
            }
            else
                echo "Brak takiego przejazdu w bazie";
        }   
    }
    else
    {
        // dla akcji z wyszukiwania przejazdów
        if(isset($_GET['tripNumber']))
        {
            $trip = $_SESSION['trip'];
            $num = 0;
            while($row = $trip->fetch_assoc())
            {
                if($num == $_GET['tripNumber'])
                {
                    // zawiera dane o przejezdzie w formie tablicy
                    $_SESSION['rideInfo'] = $row;
                    break;
                }
                $num += 1;
            }
        }
    }
}

?>