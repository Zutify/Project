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
        }/*else{
            $sql = "SELECT * FROM User WHERE `Login`='$login'";
            #$conn = OpenCon();
            $result = $conn->query($sql);
            $user = $result->fetch_assoc();
            #CloseCon($conn);
            if($user){
                if($user['Login'] === $login){
                    $r->login['msg'] = "Ten login jest zajęty.";
                    $r->error = true;
                }
            }
        }*/
    }
    
    if (!isset($r->firstName)) {
        $name = $_POST["firstName"];
        $r->firstName['field'] = $name;
        if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
            $r->firstName['msg'] = "Imię moze zawierać tylko litery i spacje.";
            $r->error = true;
        }
    }

    if (!isset($r->lastName)) {
        $surname = $_POST["lastName"];
        $r->lastName['field'] = $surname;
        if (!preg_match("/^[a-zA-Z ]*$/",$surname)) {
            $r->lastName['msg'] = "Nazwisko moze zawierać tylko litery i spacje.";
            $r->error = true;
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

   /* if (!isset($r->password2)) {
        $password2 = $_POST["repeatPassword"];
        $r->password2['field'] = $password2;
        if(!($password===$password2)){
            $r->password2['msg'] = "Hasła nie są identyczne.";
            $r->error = true;
        }
    }
    */
    if (!isset($r->email)) {
        $email = $_POST["email"];
        $r->email['field'] = $email;
        if(!preg_match("/^[A-Za-z0-9]+\@zut\.edu\.pl$/D", $email)){
            $r->email['msg'] = "Email niepoprawny";
            $r->error = true;
        }
    }
    
    if (!isset($r->phoneNumber)) {
        $phoneNumber = $_POST["phoneNumber"];
        $r->phoneNumber['field'] = $phoneNumber;
        if (!preg_match("/^[0-9]{9}$/",$phoneNumber)) {
            $r->phoneNumber['msg'] = "Numer telefonu niepoprawny";
            $r->error = true;
        }
    }

    //header('Location: ../page/login.php');
    if(!$r->error) {
        unset($_SESSION['register_response']);
        $person = $_POST;
        $person['password'] = md5($person['password']);
        $sql = "INSERT INTO User VALUES (NULL, '$person[firstName]', '$person[lastName]', '$person[login]', '$person[password]','$person[email]', '$person[phoneNumber]');";
        #$conn = OpenCon();
        $conn->query($sql);
        #$conn->close();
        
        #CloseCon($conn);
        #echo 'poprawne dane';
        header('Location: ../page/login.php');
    }else {
        $_SESSION['register_response'] = $r;
        header('Location: ../page/rejestracja.php');
    }  
}else{
    header('Location: /');
}