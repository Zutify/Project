<?php
include 'db_connection.php';
include 'post_notification.php';
  $user=$_SESSION['userID'];
  $ride = $_SESSION['rideInfo'];

  //sprawdzenie czy user to kierowca czy pasażer

		$sq = "SELECT * FROM UserCar WHERE `UserID`=".$_SESSION['userID'].";";
		$result = $conn->query($sq);
  
		if($result->num_rows > 0)
		{    
			//jeżeli kierowca to wypisz powiadomienia do pasażerów
			$sql = "SELECT * FROM Notification WHERE `RideInfoID` = '$ride'";
			$wynik = $conn->query($sql);
			while($pow = $wynik->fetch_assoc()) 
			{
				$userID = $pow['UserID'];
				//zwykłe powiadomienia
				if($user != $userID)
				{    
			
					echo "$pow['Comment']";
					post_notification("Zutify", $pow['Comment']); 
				}
				//automatyczne powiadomienia
				else if($userID == 0)
				{    
					$sql1 = "SELECT * FROM Notification WHERE Comment like '%Koniec%' OR Comment like '%anulowany%'";;
					$wynik1 = $conn->query($sql1);
					if($result->num_rows > 0)
					{    
					echo "$pow['Comment']";
					post_notification("Zutify", $pow['Comment']);
					}
				}
			}
		}
		else 
		{  
			$sql = "SELECT * FROM Notification WHERE `RideInfoID` = '$ride'";
			//jeżeli pasażer to wypisz powiadomienie do kierowcy 
			$wynik = $conn->query($sql);
			while($pow = $wynik->fetch_assoc()) 
			{
				$userID = $pow['UserID'];
				$sq = "SELECT * FROM UserCar WHERE `UserID`='$userID'";
				$result = $conn->query($sq);
				//zwykłe powiadomienia
				if($result->num_rows > 0)
				{    
					echo "$pow['Comment']";
					post_notification("Zutify", $pow['Comment']);
				}
				//automatyczne powiadomienia
				else if($userID == 0)
				{    
					$sql1 = "SELECT * FROM Notification WHERE Comment like '%Koniec%' OR Comment like '%Dodano%'";;
					$wynik1 = $conn->query($sql1);
					if($result->num_rows > 0)
					{    
					echo "$pow['Comment']";
					post_notification("Zutify", $pow['Comment']);
					}
				}
			}
		}
    unset($_SESSION['is_notification']);
?>