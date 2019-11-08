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
        $password = $_POST['password'];
        $r->login['field'] = $login;
        $r->password['field'] = $password;
        $sql = "SELECT * FROM uzytkownicy WHERE `login`='$login'";
        $conn = OpenCon();
        $result = $conn->query($sql);
        $user = $result->fetch_assoc();
        CloseCon($conn);
        if($user){
            if($user['login'] === $login){
                $hash = md5($password);
                if(!($user['haslo']===$hash)){
                    $r->error = true;
                    $r->login['msg'] = "Niepoprawne dane logowania";

                }
            }
        }else{
            $r->error = true;
            $r->login['msg'] = "Nie ma takiego użytkownika";
        }
    }
    if(!$r->error) {
        unset($_SESSION['login_response']);

        $_SESSION['isloggedin']=true;
        $sql = "SELECT * FROM uzytkownicy WHERE `login`='$login'";
        $conn = OpenCon();
        $result = $conn->query($sql);
        $user = $result->fetch_assoc();
        CloseCon($conn);
        $_SESSION['userid']=$user['userid'];
        $_SESSION['username']=$user['name'];
        $_SESSION['permissions']=$user['permissions'];
        header('Location: ../index.php');
    }else {
        $_SESSION['login_response'] = $r;
        header('Location: ../index.php?page=login');
    }  
}else{
    header('Location: /');
}