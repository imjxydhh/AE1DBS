<?php
try{
	header('Content-Type: text/xml');
	header("Cache-Control: no-cache, must-revalidate");
	header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
	echo '<?xml version="1.0" encoding="UTF-8"?>
	<Rooms>';
	$conn = new PDO("mysql:host=localhost;dbname=scysz3", "scysz3", "Zsbnyhhd100...");
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sqlRoom = 'SELECT RoomID,Stairs FROM BookInfo WHERE ((startDate BETWEEN :startDate AND :endDate)';
	$sqlRoom = $sqlRoom . ' OR (endDate BETWEEN :startDate AND :endDate)';
	$sqlRoom = $sqlRoom . ' OR (:startDate BETWEEN startDate AND endDate)';
	$sqlRoom = $sqlRoom . ' OR (:endDate BETWEEN startDate AND endDate))';
	$sqlRoom = $sqlRoom . ' AND RoomID = :roomID AND endDate <> :startDate AND :endDate <> startDate; ';
	$tmpRoom = $conn->prepare($sqlRoom);
	$tmpRoom->bindParam(':startDate', $_POST['startDate']);
	$tmpRoom->bindParam(':endDate', $_POST['endDate']);
	$roomID = getRoomID($_POST['roomType']);
	
	foreach($roomID as $id){
		$tmpRoom->bindParam(':roomID', $id);
		$tmpRoom->execute();
		$resultRoom[$id] = $tmpRoom->fetchAll(PDO::FETCH_ASSOC);
	}
	
	foreach($roomID as $id){
		if(count($resultRoom[$id]) < 10){
			echo '<room>' . $id . '</room>'; 
		}else{
			echo '<room>0</room>';
		}
	}
	
	echo '<type>' . $_POST['roomType'] . '</type>';
	$conn = null;
	
}catch(PDOException $e){
	echo "<serverWrong>Sorry, something wrong seems to happen to our server. You can visit our page later.</serverWrong>";
}
	echo '</Rooms>';
	
function getRoomID($type){
	if($type == 'ldb'){
		$roomID[0] = 1;
		$roomID[1] = 2;
		$roomID[2] = 11;
		$roomID[3] = 12;
	}elseif($type == 'lsb'){
		$roomID[0] = 3;
		$roomID[1] = 4;
		$roomID[2] = 9;
		$roomID[3] = 10;
	}elseif($type == 'ssb'){
		$roomID[0] = 5;
		$roomID[1] = 6;
		$roomID[2] = 7;
		$roomID[3] = 8;
	}else{
		$roomID[0] = 13;
	}
	return $roomID;
}
?>