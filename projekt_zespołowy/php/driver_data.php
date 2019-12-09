<?php

// pobiera dane o konkretnym kierowcy
// driver id z zapytania o podróż z tabeli RideInfo
function driverInfo($driverID)
{
    include 'db_connection.php';
    session_start();
    
    $sql = "SELECT * FROM User WHERE `ID`='$driverID'";
    $result = $conn->query($sql);
    $user = $result->fetch_assoc();
    if($user)
    {
        $Name = $user['Name'];
        $Surname = $user['Surname'];
        $PhoneNumber = $user['PhoneNumber'];
    }
    
    // pobieranie zmiennych o samochodzie Uzytkownika o ile posiada
    $sql = "SELECT * FROM UserCar WHERE `UserID`='$driverID'";
    $result2 = $conn->query($sql);
    $user2 = $result2->fetch_assoc();

    // jeśli istnieje jakiś rekord
    if($user2)
    {
        $carBrand = $user2['Brand'];
        $carModel = $user2['Model'];
        $description = $user2['Description'];
    }
    
     // wyświetlenie informacji
    if($user and $user2)
    {
        echo '
        <div class=" my-3 border-bottom border-dark"></div>
        <div class="h2">Informacje o kierowcy: ';
        echo $Name." ".$Surname;
        echo '</div>
        <div class=" my-3 border-bottom border-dark"></div>
        <div class="h4 mx-5 h-50" style="min-height: 50vh";>
            <div class="my-3 h3">
                Auto <div class="d-inline-block ml-2" id="car">';
                echo $carBrand." ".$carModel;
                echo'</div>
            </div>
            <div class="my-3 h3">
                Telefon 
                <div class="d-inline-block ml-2" id="phone">';
                echo $PhoneNumber;                    
                echo '</div>
            </div>
            <div class="my-3 h3">
                Opis: <div class="d-inline-block mt-3" id="description">';
                echo $description;
                echo '</div>
            </div>';
            
            if(isset($_SESSION['rideJoinMessage']))
            {
                echo'
                <div class="text-center" style="margin-top: 80px;">
                    <div class="text-danger h1">';
                        echo $_SESSION['rideJoinMessage'];
                        unset($_SESSION['rideJoinMessage']);
                    echo '</div>
                </div>';
            }
            else if(isset($_SESSION['rideJoinSuccess']))
            {
                echo'
                <div class="text-center" style="margin-top: 80px;">
                    <div class="text-success h1">';
                        echo $_SESSION['rideJoinSuccess'];
                        unset($_SESSION['rideJoinSuccess']);
                    echo '</div>
                </div>';
            }
            else
            {
                echo'
                <!-- przycisk dołączania do przejazdu -->
                <a href="../php/ride_join.php" class="text-white" >
                    <button type="button" class="btn btn-success btn-block" style="height: 120px; margin-top: 80px;">
                        <div class="h3">DOŁĄCZ DO PRZEJAZDU</div>
                    </button>
                </a>';
            }
        echo '</div>';        
    }
    else
    {
        echo '
        <div class=" my-3 border-bottom border-dark"></div>
        <div class="h2">Informacje o kierowcy: </div>
        <div class=" my-3 border-bottom border-dark"></div>
        <div class="h4 mx-5 h-50" style="min-height: 50vh";>
            <div class="my-3 h3">
                Auto 
                <div class="d-inline-block ml-2" id="car">
                </div>
            </div>
            <div class="my-3 h3">
                Telefon 
                <div class="d-inline-block ml-2" id="phone">
                </div>
            </div>
            <div class="my-3 h3">
                Opis: 
                <div class="d-inline-block ml-2" id="description">
                </div>
            </div>';
            
            if(isset($_SESSION['rideJoinMessage']))
            {
                echo'
                <div class="text-center" style="margin-top: 80px;">
                    <div class="text-danger h1">';
                        echo $_SESSION['rideJoinMessage'];
                        unset($_SESSION['rideJoinMessage']);
                    echo '</div>
                </div>';
            }
            else if(isset($_SESSION['rideJoinSuccess']))
            {
                echo'
                <div class="text-center" style="margin-top: 80px;">
                    <div class="text-success h1">';
                        echo $_SESSION['rideJoinSuccess'];
                        unset($_SESSION['rideJoinSuccess']);
                    echo '</div>
                </div>';
            }
            else
            {
                echo'
                <!-- przycisk dołączania do przejazdu -->
                <a href="../php/ride_join.php" class="text-white" >
                    <button type="button" class="btn btn-success btn-block" style="height: 120px; margin-top: 80px;">
                        <div class="h3">DOŁĄCZ DO PRZEJAZDU</div>
                    </button>
                </a>';
            }
        echo '</div>'; 
    }

}
?>