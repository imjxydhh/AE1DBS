<?php
	header('Content-Type: text/xml');
	header("Cache-Control: no-cache, must-revalidate");
	header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
	echo '<?xml version="1.0" encoding="UTF-8"?>
	<Staffs>';
	try{
		if(!isset($_POST['username'])){
			throw new Exception("");
		}
		$conn = new PDO("mysql:host=localhost;dbname=scysz3", "scysz3", "Zsbnyhhd100...");
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sqlUsname = 'SELECT * FROM Staffs WHERE Username = :username;';		
		$tmpUsname = $conn->prepare($sqlUsname);
		$tmpUsname->bindParam(':username', $_POST['username']);
		$tmpUsname->execute();
		$resultUsname = $tmpUsname->fetchAll(PDO::FETCH_ASSOC);

		if(count($resultUsname) > 0){
			echo "<wrong>This username has been used. Please use another one.</wrong>";
		}else{
			echo "<wrong>1</wrong>";
		}

	$conn = null;
	}catch(PDOException $e){
		echo "<serverWrong>SERVER ERROR</serverWrong>";
	}catch(Exception $e){
		echo "<serverWrong>SERVER ERROR</serverWrong>";
	}
	echo '</Staffs>';
?>