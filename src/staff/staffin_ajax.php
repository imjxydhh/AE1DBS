<?php
	header('Content-Type: text/xml');
	header("Cache-Control: no-cache, must-revalidate");
	header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");

	echo '<?xml version="1.0" encoding="UTF-8"?>
	<Staffs>';
	session_start();
	if(!isset($_SESSION['login_state'])){
		$_SESSION['login_state'] = 0;
	}
	if($_SESSION['login_state'] === 2){
		echo "<logged>staffviewall.php</logged>";
		echo "<msg>An staff account has logged in. if you want to change an account, please click on Log out.
				   Or you can click on Cancel to go back to information page.</msg>";
	}elseif($_SESSION['login_state'] === 1){
		echo "<logged>index.html</logged>";
		echo "<msg>An guest account has logged in. if you are staff, please click on Log out and sign in again.
				   If not, you can click on Cancel to go back to book room.</msg>";
	}else{
		try{
			$conn = new PDO("mysql:host=localhost;dbname=scysz3", "scysz3", "Zsbnyhhd100...");
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = 'SELECT Password FROM Staffs WHERE Username = :username;';
			$tmp = $conn->prepare($sql);
			$tmp->bindParam(':username', $_POST['username']);
			$res = $tmp->execute();
			$result = $tmp->fetchAll(PDO::FETCH_ASSOC);
			if(count($result) === 0){
				echo "<wrong>Your username or password is worng. Please login again.</wrong>";
			}elseif($result[0]['Password'] == $_POST['password']){
				$_SESSION['login_state'] = 2;
				$_SESSION['username'] = $_POST['username'];
				echo "<logged>staffviewall.php</logged>";
				echo "<msg>1</msg>";
			}else{
				echo "<wrong>Your username or password is worng. Please login again.</wrong>";
			}
			$conn = null;
		}catch(PDOException $e){
			echo "<serverWrong>SERVER ERROR</serverWrong>";
		}
	}
	echo '</Staffs>';
?>