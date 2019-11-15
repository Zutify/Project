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

    if (!isset($r->email)) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $r->email['field'] = $email;
        $r->password['field'] = $password;
        $sql = "SELECT * FROM user WHERE `email`='$email'";
        //$conn = OpenCon();
        $result = $conn->query($sql);
        $user = $result->fetch_assoc();
        //CloseCon($conn);
        if($user){
            if($user['Email'] === $email){
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

        // $_SESSION['isloggedin']=true;
        // $sql = "SELECT * FROM user WHERE `Login`='$email'";
        // $conn = OpenCon();
        // $result = $conn->query($sql);
        // $user = $result->fetch_assoc();
        // CloseCon($conn);
        // $_SESSION['userid']=$user['userid'];
        // $_SESSION['username']=$user['name'];
        // $_SESSION['permissions']=$user['permissions'];;
        header('Location: ../page/rideMenu.php');
    }else {
        $_SESSION['login_response'] = $r;
        header('Location: ../page/login.php');
    }  
}else{
    header('Location: /');
}