<?php
include 'db_connection.php';
$user=$_SESSION['userID'];
$ride=$_SESSION['rideInfo'];

//użytkownik lub kierowca może napisać powiadomienie 
?>

 <form >
	<textarea name="notification" cols="5" rows="5">Napisz powiadomienie</textarea>
	<input type="submit" name="Send" value="Send">
</form>
    
<?php
//wpisanie powiadomienia do bazy powiadomień od pasażera lub kierowcy
    if(isset($_POST['Send']))
    {
		$com=$_POST['notification'];
		$sql = "INSERT into Notification VALUES (NULL, , '$ride', '$user', '$com')";
		$_SESSION['is_notification']=1;
		header('Location: ../index.php?page=menu');
	}

?>

