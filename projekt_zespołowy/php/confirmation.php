<?php
include 'db_connection.php';

$vk = $_GET['vkod'];

$sql = "SELECT * FROM Verify WHERE `Vkey` LIKE '$vk' AND `Verified` = 0 LIMIT 1;";
$result = $conn->query($sql);

if($result->num_rows == 1){
    $sql = "UPDATE Verify SET `Verified` = 1 WHERE `Vkey` LIKE '$vk' AND `Verified` = 0;";
    $conn->query($sql);
    echo "Udana weryfikacja";
}else{
    echo "Blad weryfikacji";
}


?>

