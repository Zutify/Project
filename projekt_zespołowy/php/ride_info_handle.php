<?php
include 'db_connection.php';

if (isset($_POST["submit"])) {
    session_start();

    // pobranie inputów
    $start = $_POST['start'];
    $dest = $_POST['dest'];
    
    if(empty($start))
        $msgStart = "";
    else if(empty($dest))
        $msgDest = "";
    
    // jeśli błąd to przenosi znowu na stronę z formularzem
    if(isset($msgStart) || isset($msgDest))
        header('Location: ../page/rideMenu.php');
    else
    {
        // jeśli poprawnie wypełnione to ustawia zmienne sesyjne
        $_SESSION['start'] = $start;
        $_SESSION['dest'] = $dest;
        header('Location: ../page/rideInfo.php');
    }
}
?>