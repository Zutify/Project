<?php
include 'db_connection.php';
session_start();
include 'user_data.php';

if (isset($_POST["submitRate"])) {
    if (isset($_POST['star'])) {
        $rate = $_POST['star'];

        $sql = "INSERT into Rating VALUES (NULL, '1', '$id', '$rate')";

        if (!empty($_POST['rideDescription'])) {
            $rideDesc = $_POST['rideDescription'];
            $sql2 = "INSERT INTO Notification VALUES (NULL, '1', '$id', '$rideDesc')";
            $result_rate_2 = $conn->query($sql2);
            $result_2 = $result_rate_2->fetch_assoc();
        }

        $result_rate = $conn->query($sql);
        $result = $result_rate->fetch_assoc();
        if (!$result->num_rows == 0) {
            $_SESSION['RateError'] = "Błąd przy dodawaniu oceny przejazdu";
            header('Location: ../index.php?page=rideRate');
            exit();
        } else {
            // kasowanie zmiennych sesyjnych związanych z dodaniem przejazdu
            if (isset($_SESSION['RateError'])) {
                unset($_SESSION['RateError']);
            }
            header('Location: ../index.php?page=menu');
            exit();
        }
    } else {
        header('Location: ../index.php?page=rideRate');
        exit();
    }
}



?>
?>