<?php
if(!isset($_SESSION['isLogged']))
    header('Location: ../index.php');
?>