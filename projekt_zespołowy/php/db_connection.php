<?php
//To na stronę 000webhost
// $servername = "localhost";
// $username = "id11292241_studentzut";
// $password = "projekt19";
// $database = "id11292241_projectdatabase";

//Moja baza danych ~Bienia
 $servername = "localhost";
 $username = "root";
 $password = "";
 $database = "id11292241_projectdatabase";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
#echo "Connected successfully";
?>