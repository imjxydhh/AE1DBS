<?php
	header('Content-Type: text/xml');
	header("Cache-Control: no-cache, must-revalidate");
	header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");

	echo '<?xml version="1.0" encoding="UTF-8"?>
	<Guests>';
	session_start();
	if(!isset($_SESSION['login_state'])){
		$_SESSION['login_state'] = 0;
	}
	if($_SESSION['login_state'] === 1){
		echo "<logged>room/booking.php</logged>";
		echo "<msg>An account has logged in. if you want to change an account, please click on Log out.
				   Or you can click on Cancel to book room now.</msg>";
	}else{
		try{
			$conn = new PDO("mysql:host=localhost;dbname=scysz3", "scysz3", "Zsbnyhhd100..."); //remember to change the account to scysz3 before move it to X2GO
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = 'SELECT Password FROM Guests WHERE Username = :username;';
			$tmp = $conn->prepare($sql);
			$tmp->bindParam(':username', $_POST['username']);
			$res = $tmp->execute();
			$result = $tmp->fetchAll(PDO::FETCH_ASSOC);
			if(count($result) === 0){
				echo "<wrong>Your username or password is worng. Please login again.</wrong>";
			}elseif($result[0]['Password'] == $_POST['password']){
				$_SESSION['login_state'] = 1;
				$_SESSION['username'] = $_POST['username'];
				echo "<logged>room/booking.php</logged>";
				echo "<msg>1</msg>";
			}else{
				echo "<wrong>Your username or password is worng. Please login again.</wrong>";
			}
			$conn = null;
		}catch(PDOException $e){
			echo "<serverWrong>Sorry, something wrong seems to happen to our server. You can visit our page later.</serverWrong>";
		}
	}
	echo '</Guests>';
?>