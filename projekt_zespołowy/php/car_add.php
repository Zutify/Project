<?php
include 'db_connection.php';
session_start();
include 'user_data.php';

if(isset($_POST["submit"]))
{
    if(!empty($_POST['carBrand']) and !empty($_POST['carModel']) and !empty($_POST['phoneNumber']) and !empty($_POST['driverDescription']))
    {
        $car_barnd = $_POST['carBrand'];
        $car_model = $_POST['carModel'];
        $phone_number = $_POST['phoneNumber'];
        $driver_desc = $_POST['driverDescription'];
        $sql = "INSERT into UserCar VALUES ('$id', '$car_barnd', '$car_model', '$driver_desc')";
        $result_car = $conn->query($sql);
        if(!$result_car)
        {
            $_SESSION['carError'] = "Błąd przy dodawaniu przejazdu";
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
<<<<<<< HEAD
=======
            header('Location: ../index.php?page=menu');
>>>>>>> f7d0003541ea5ad7d993d972e91729cab71dd585
            exit();

        }
    }
    else
    { 
<<<<<<< HEAD
        header('Location: ../index.php?page=driverInfo');
=======
        header('Location: ../index.php?page=rideAdd');
>>>>>>> f7d0003541ea5ad7d993d972e91729cab71dd585
        exit();
    } 
}
?>