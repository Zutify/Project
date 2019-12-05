<?php
include 'db_connection.php';

# do przypomnienia hasła
if(isset($_POST['submitForget']))
{
    $email = $_POST['email'];
    $sql = "SELECT * FROM `User` WHERE `Email` LIKE '$email';";
    $result = $conn->query($sql);
    if($result->num_rows == 1){
        $row = $result->fetch_assoc();
        $vkey = md5(time().$row['Email']);
        $date = date("Y-m-d H:i:s");
        $sql = "INSERT INTO ForgotPasswordKey VALUES (NULL , '$row[ID]' ,'$vkey' ,'$date','0');";
        $conn->query($sql);

        #https://www.tempmailaddress.com/ tutaj tworzy sie 5min maila
        $reciver = "shloma.jestin@iiron.us";
        $subject  = "Przypomnienie hasła";
        $link = "<a href = 'http://zutify.000webhostapp.com/index.php?page=passwordReset&vkod=$vkey&email=$email'>Link</a>";
        $text = "Aby przypomnieć hasło prosze kliknąć w link : </br>".$link;
        if(mail($reciver, $subject, $text, $reciver)){

        }


        header('Location: ../index.php?page=login');
    }else{
        $error = "Blad";
    }
}


# do resetowania hasła
if(isset($_POST['submitReset']))
{
    if(isset($_GET['email']) == true){
        $email = $_GET['email'];
        $vkey = $_GET['vkod'];
    }
    
    $sql = "SELECT * FROM `User` WHERE `Email` LIKE '$email';";
    $result = $conn->query($sql);
    if($result->num_rows == 1) {
        $user = $result->fetch_assoc();

    }else{
        echo "Błąd";
    }
    $sql = "SELECT * FROM ForgotPasswordKey WHERE `VerificationKey` LIKE '$vkey' AND `WasUsed` = '0' AND `UserID` = '$user[ID]'
            LIMIT 1;";
    $result = $conn->query($sql);

    if($result->num_rows == 1){
        
        
        $sql = "UPDATE ForgotPasswordKey SET `WasUsed` = 1 WHERE `VerificationKey` LIKE '$vkey' AND `WasUsed` = '0' AND `UserID` = '$user[ID]';";
        $conn->query($sql);
    
        $password = md5($_POST["newPassword"]);
        $sql = "UPDATE User SET `Password` = '$password' WHERE `ID` = '$user[ID]';";
        $conn->query($sql);
    }else{
        echo "Blad";
    }

    

}

?>