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

        $person['login'] = htmlentities($person['login'],ENT_QUOTES,'UTF-8');
        $person['password'] = htmlentities($person['password'],ENT_QUOTES,'UTF-8');
        $person['firstName'] = htmlentities($person['firstName'],ENT_QUOTES,'UTF-8');
        $person['lastName'] = htmlentities($person['lastName'],ENT_QUOTES,'UTF-8');
        $person['email'] = htmlentities($person['email'],ENT_QUOTES,'UTF-8');
        $person['phoneNumber'] = htmlentities($person['phoneNumber'],ENT_QUOTES,'UTF-8');


        #$sql = "INSERT INTO User VALUES (NULL, '$person[firstName]', '$person[lastName]', '$person[login]', '$person[password]','$person[email]', '$person[phoneNumber]');";
        #$conn = OpenCon();
        $conn->query(sprintf("INSERT INTO User VALUES 
                    (NULL, '%s', '%s', '%s', '%s', '%s', '%s');",
            mysqli_real_escape_string($conn,$person['firstName']),
            mysqli_real_escape_string($conn,$person['lastName']),
            mysqli_real_escape_string($conn,$person['login']),
            mysqli_real_escape_string($conn,$person['password']),
            mysqli_real_escape_string($conn,$person['email']),
            mysqli_real_escape_string($conn,$person['phoneNumber'])));
        #$conn->query($sql);
        #$conn->close();
        
        $vkey = md5(time().$person['login']);
        $link = "<a href = 'http://zutify.000webhostapp.com/php/confirmation.php?vkod=$vkey'>Link</a>";;


        $id = mysqli_insert_id($conn);
        $sql = "INSERT INTO Verify VALUES ('$id','$vkey','0')";
        $conn->query($sql);
        
        #https://www.tempmailaddress.com/ tutaj tworzy sie 5min miala 
        if(mail("delano.xylan@iiron.us", "subject", "$link", "delano.xylan@iiron.us")){

        }

        
        
        #CloseCon($conn);
        #echo 'poprawne dane';
        header('Location: ../index.php?page=login');
    }else {
        $_SESSION['register_response'] = $r;
        header('Location: ../index.php?page=rejestracja');
    }  
}else{
    header('Location: /');
}