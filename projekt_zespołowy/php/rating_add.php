<?php
include 'db_connection.php';
session_start();
include 'user_data.php';

if(isset($_POST["submitRate"]))
{
    if(isset($_POST['star']))
    {
        $rate = $_POST['star'];

        $sql = "INSERT into Rating VALUES (NULL, '1', $id, '$rate')";
            
            $result_rate = $conn->query($sql);
            $result = $result_rate->fetch_assoc();
            if(!$result->num_rows == 0)
            {
                $_SESSION['RateError'] = "Błąd przy dodawaniu oceny przejazdu";
                header('Location: ../index.php?page=route_rating');
                exit();
            }
            else
            {
                // kasowanie zmiennych sesyjnych związanych z dodaniem przejazdu
                if(isset($_SESSION['RateError']))
                {
                    unset($_SESSION['RateError']);
                }
                header('Location: ../index.php?page=menu');
                exit();
    
            }
    }
    else
    { 
        header('Location: ../index.php?page=rideRate');
        exit();
    } 
}



?>
?>