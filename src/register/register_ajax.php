<?php
	header('Content-Type: text/xml');
	header("Cache-Control: no-cache, must-revalidate");
	header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
	echo '<?xml version="1.0" encoding="UTF-8"?>
	<Guests>';
	try{
		if(!(isset($_POST['username']) && isset($_POST['passport']))){
			throw new Exception("");
		}
		$conn = new PDO("mysql:host=localhost;dbname=scysz3", "scysz3", "Zsbnyhhd100...");
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sqlUsname = 'SELECT * FROM Guests WHERE Username = :username;';		
		$tmpUsname = $conn->prepare($sqlUsname);
		$tmpUsname->bindParam(':username', $_POST['username']);
		$tmpUsname->execute();
		$resultUsname = $tmpUsname->fetchAll(PDO::FETCH_ASSOC);

		$sqlPassport = 'SELECT * FROM Guests WHERE PassportID = :passport;';
		$tmpPassport = $conn->prepare($sqlPassport);
		$tmpPassport->bindParam(':passport', $_POST['passport']);
		$tmpPassport->execute();
		$resultPassport = $tmpPassport->fetchAll(PDO::FETCH_ASSOC);

		if(count($resultUsname) > 0){
			echo "<wrong>This username has been used. Please use another one.</wrong>";
		}else{
			echo "<wrong>1</wrong>";
		}
		if(count($resultPassport) > 0){
			echo "<wrong>Your passport has been used. If it isn't you, please contact with us.</wrong>";
		}else{
			echo "<wrong>1</wrong>";
		}
	$conn = null;
	}catch(PDOException $e){
		echo "<serverWrong>Sorry, something wrong seems to happen to our server. You can visit our page later.</serverWrong>";
		echo '<p>Or you can visit our home page to get some infomation of rooms: <a href = "../room/booking.php">Click here to go</a></p>';
	}catch(Exception $e){
		echo "<serverWrong>Sorry, something wrong seems to happen to our server. You can visit our page later.</serverWrong>";
	}
	echo '</Guests>';
?>