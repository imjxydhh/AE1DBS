<!DOCTYPE html>
<head>
<title>Sunny Isle Hotel - Booking</title>
<link rel = "stylesheet" type = "text/css" href = "../SunnyIsle.css"/>
</head>
<body>
<div class = "index_header">
	<div class = "login_state">
		<div class = "logInOut">
		<?php
			session_start();
			if(!isset($_SESSION['login_state'])){
				$_SESSION['login_state'] = 0;
				header('Location: ../index.html');
			}elseif($_SESSION['login_state'] == 1){
				echo 'Account:[' . $_SESSION['username'] .  ']&nbsp;&nbsp;&nbsp;';
				echo '<a href = "record.php">[My Reservations]</a>&nbsp;&nbsp;&nbsp;';
				echo '<a href = "logout.php">[Log Out]</a>';
			}else{
				header('Location: ../index.html');
			}
		?>
		</div>
	</div>
	<div class = "logo">
		<span class = "logo"><img id = "logo" src = "../logo.png"/></span>
	</div>
</div>
<div class = "navigation">
	<div class = "naviContent"><a href = "../index.html">Login page</a> > <a href = "booking.php">Booking</a> > Booking Completed</div>
</div>
<div class = "wrapBox">
<div class = "promptBox">
<?php
try{
	if(!isset($_SESSION['login_state'])){
		throw new Exception("");
	}else if($_SESSION['login_state'] == 0 || $_SESSION['login_state'] == 2){
		throw new Exception("");
	}
	
	$roomID = $_GET['roomID'];
	$startDate = $_GET['startDate'];
	$endDate = $_GET['endDate'];
	$username = $_SESSION['username'];
	
	$conn = new PDO("mysql:host=localhost;dbname=scysz3", "scysz3", "Zsbnyhhd100...");
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sqlRoom = 'SELECT Stairs FROM BookInfo WHERE ((startDate BETWEEN :startDate AND :endDate)';
	$sqlRoom = $sqlRoom . ' OR (endDate BETWEEN :startDate AND :endDate)';
	$sqlRoom = $sqlRoom . ' OR (:startDate BETWEEN startDate AND endDate)';
	$sqlRoom = $sqlRoom . ' OR (:endDate BETWEEN startDate AND endDate))';
	$sqlRoom = $sqlRoom . ' AND RoomID = :roomID AND endDate <> :startDate;';
	$sql = $conn->prepare($sqlRoom);
	$sql->bindParam(":startDate", $startDate);
	$sql->bindParam(":endDate", $endDate);
	$sql->bindParam(":roomID", $roomID);
	$sql->execute();
	$result = $sql->fetchAll(PDO::FETCH_ASSOC);
	if(count($result) == 10){
		echo "<p>Sorry, somebody seems to have successfully booked last room of this type before you.<br/>";
		echo '<a href = "booking.php">Click here to book another room</a>';
	}else{
		for($i = 1;$i < 11;$i++){
			$state = 0;
			foreach($result as $row){
				if($row['Stairs'] == $i){
					$state = 1;
				}
			}
			if($state != 1){
				$sql = 'INSERT INTO BookInfo (Username, RoomID, Stairs, startDate, endDate)';
				$sql = $sql . ' VALUES (:username, :roomID, :stairs, :startDate, :endDate);';
				$book = $conn->prepare($sql);
				$book->bindParam(":username", $username);
				$book->bindParam(":roomID", $roomID);
				$book->bindParam(":stairs", $i);
				$book->bindParam(":startDate", $startDate);
				$book->bindParam(":endDate", $endDate);
				$book->execute();
				break;
			}
		}
		echo '<p>Welcome to Sunny Isle Hotel!<br/>You have already booked a room.</p>';
		echo '<a href = "booking.php">Go back</a>';
	}
}catch(PDOException $e){
	echo "<p class = \"server_error\">Sorry, something wrong seems to happen to our server. You can visit our page later.</p>";
	echo '<p>Or you can visit our home page to get some infomation of rooms: <a href = "booking.php">Click here to go</a></p>';
	echo $e->getMessage();//remember to delete this
}catch(Exception $e){
	header('Location: ../index.html');
}
?>
</div>
</div>
</body>
</html>