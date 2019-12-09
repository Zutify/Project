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
    
    // sprawdzenie po mailu lub po loginie
    if (!isset($r->email)) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $r->email['field'] = $email;
        $r->password['field'] = $password;
        $sql = "SELECT * FROM User WHERE `Email`='$email' or `Login` = '$email'";
       
        $result = $conn->query($sql);
        $user = $result->fetch_assoc();
        
        if($user){
            if($user['Email'] === $email){
                $hash = md5($password);
                if(!($user['Password']===$hash)){
                    $r->error = true;
                    $r->email['msg'] = "Niepoprawne dane logowania";

                }
            }
            else if($user['Login'] === $email){
                $hash = md5($password);
                if(!($user['Password']===$hash)){
                    $r->error = true;
                    $r->email['msg'] = "Niepoprawne dane logowania";

                }
            }
        }else{
            $r->error = true;
            $r->email['msg'] = "Nie ma takiego użytkownika";
        }
    }


    if(!$r->error) {
        unset($_SESSION['login_response']);

        // dodanie do zmiennej sesyjnej informacji o zalogowaniu
        // oraz o imieniu zalogowanego użytkownika
            $_SESSION['isLogged']=true;
            
            $sql2 = "SELECT * FROM User WHERE `Email`='$email' or `Login` = '$email'";
            $result2 = $conn->query($sql2);
            $user2 = $result2->fetch_assoc();
            
            $_SESSION['userID']=$user2['ID'];
            $_SESSION['username']=$user2['Name'];
            
        header('Location: ../index.php?page=menu');
    }else {
        $_SESSION['login_response'] = $r;
        header('Location: ../index.php?page=login');
    }  
}else{
    header('Location: /');
}