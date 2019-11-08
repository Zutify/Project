<?php
include 'db_connection.php';

if (isset($_POST["submit"])) {
    session_start();


    $r = new stdClass;
    $r->error = 0;
    $errorMsg = "Te pole nie może być puste!";

    foreach($_POST as $key => $val) {
        if (empty($val)) {
            $r->$key['msg'] = $errorMsg;
            $r->$key['field'] = '';
            $r->error = true;
        }
    }

    if (!isset($r->login)) {
        $login = $_POST['login'];
        $r->login['field'] = $login;
        //Minimum eight characters, maximium 20 characters.
        if (!preg_match("/^[A-Za-z0-9]{5,20}$/",$login)) {
            $r->login['msg'] = "Niepoprawny login.";
            $r->error = true;
        }else{
            $sql = "SELECT * FROM uzytkownicy WHERE `login`='$login'";
            $conn = OpenCon();
            $result = $conn->query($sql);
            $user = $result->fetch_assoc();
            CloseCon($conn);
            if($user){
                if($user['login'] === $login){
                    $r->login['msg'] = "Ten login jest zajęty.";
                    $r->error = true;
                }
            }
        }
    }

    if(!isset($r->email)){
        $email = $_POST['login'];
        $r->email['field'] = $login;
        if(!preg_match("/^[A-Za-z0-9]+\@[.a-z]*\.?zut\.edu\.pl$/D",$email)){
            $r->email['msg'] = "Niepoprawny email.";
            $r->error = true;
        }else{
            $sql = "SELECT * FROM uzytkownicy WHERE `email`='$email'";
            $conn = OpenCon();
            $result = $conn->query($sql);
            $user = $result->fetch_assoc();
            CloseCon($conn);
            if($user){
                if($user['email'] === $email){
                    $r->email['msg'] = "Ten email jest zajęty.";
                    $r->error = true;
                }
            }
        }
    }

    if (!isset($r->password)) {
        $password = $_POST["password"];
        $r->password['field'] = $password;
        //Minimum eight characters, maximium 20 characters, at least one letter and one number.
        if (!preg_match("/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,20}$/",$password) && !empty($password)) {
            $r->password['msg'] = "Niepoprawne hasło.";
            $r->error = true;
        }
    }

    if (!isset($r->password2)) {
        $password2 = $_POST["password2"];
        $r->password2['field'] = $password2;
        if(!($password===$password2)){
            $r->password2['msg'] = "Hasła nie są identyczne.";
            $r->error = true;
        }
    }

    if (!isset($r->name)) {
        $name = $_POST["name"];
        $r->name['field'] = $name;
        if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
            $r->name['msg'] = "Imię moze zawierać tylko litery i spacje.";
            $r->error = true;
        }
    }

    if (!isset($r->surname)) {
        $surname = $_POST["surname"];
        $r->surname['field'] = $surname;
        if (!preg_match("/^[a-zA-Z ]*$/",$surname)) {
            $r->surname['msg'] = "Nazwisko moze zawierać tylko litery i spacje.";
            $r->error = true;
        }
    }

    if(!$r->error) {
        unset($_SESSION['register_response']);

        $person = $_POST;

        $person['password'] = md5($person['password']);
        $person['permissions'] = 1;
        $sql = "INSERT INTO uzytkownicy VALUES (NULL, '$person[login]', '$person[password]', '$person[permissions]', '$person[name]',' $person[surname]');";
        $conn = OpenCon();
        $conn->query($sql);
        CloseCon($conn);
        header('Location: ../index.php');
    }else {
        $_SESSION['register_response'] = $r;
        header('Location: ../index.php?page=register');
    }  
}else{
    header('Location: /');
}