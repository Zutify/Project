<?php
include 'db_connection.php';

$vk = $_GET['vkey'];

$sql = "SELECT * FROM TABELA WHERE Vkey = $vk AND Verified = 0 LIMIT 1;";
$result = $conn->query($sql);
if($result->num_rows == 1){
    $row = $result->fetch_assoc();
    $sql = "UPDATE TABLEA SET Verified = 1 WHERE Vkey = $vk AND Verified = 0;";
    echo "Udana weryfikacja";
}else{
    echo "Blad weryfikacji";
}





?>

