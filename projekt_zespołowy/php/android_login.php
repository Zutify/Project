<?php
// login | driver_info
header('Content-Type: application/json');
$data->email = $_COOKIE['email'];
$data->password = $_COOKIE['password'];

$data->telefon = $_COOKIE['telefon'];


$json = json_encode($data, JSON_FORCE_OBJECT);
echo $json;
// echo json_encode(array("login"=>$_COOKIE['email'], "password"=>$_COOKIE['password']));
?>