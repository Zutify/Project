<?php
include 'db_connection.php';
session_start();
include 'user_data.php';

if(isset($_POST["submit"]))
{
    
    if(!empty($_POST['carBrand']) and !empty($_POST['carModel']) and !empty($_POST['driverDescription']))
    {
        $car_brand = $_POST['carBrand'];
        $car_model = $_POST['carModel'];
        $driver_desc = $_POST['driverDescription'];
        
        //$userID = intval($id);
        // sprawdzenie czy rekord dla danego użytkownika już istnieje
        $sql = "Select * from UserCar where UserID = $id";
        if($result_car = $conn->query($sql))
        {
            // jeśli istnieje to update
            $sql2 = "Update UserCar SET `Brand` = '$car_brand', `Model` = '$car_model', `Description` = '$driver_desc' where UserID = $id";
            
            $result_car = $conn->query($sql2);
            if(!$result_car)
            {
                $_SESSION['carError'] = "Błąd przy aktualizowaniu danych kierowcy";
                header('Location: ../index.php?page=driverInfo');
                exit();
            }
            else
            {
                // kasowanie zmiennych sesyjnych związanych z dodaniem przejazdu
                if(isset($_SESSION['carError']))
                {
                    unset($_SESSION['carError']);
                }
                header('Location: ../index.php?page=menu');
                exit();
    
            }
        }
        else
        {
            // jeśli nie istnieje to wstawić
            $sql2 = "INSERT into UserCar VALUES ($id ,'$car_brand', '$car_model', '$driver_desc')";
            
            $result_car = $conn->query($sql2);
            if(!$result_car)
            {
                $_SESSION['carError'] = "Błąd przy dodawaniu danych kierowcy";
                header('Location: ../index.php?page=driverInfo');
                exit();
            }
            else
            {
                // kasowanie zmiennych sesyjnych związanych z dodaniem przejazdu
                if(isset($_SESSION['carError']))
                {
                    unset($_SESSION['carError']);
                }
                header('Location: ../index.php?page=menu');
                exit();
    
            }
        }
    }
    else
    { 
        header('Location: ../index.php?page=editProfile');
        exit();
    } 
    
}
?>