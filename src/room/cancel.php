<!DOCTYPE html>
<head>
<title>Sunny Isle Hotel - Cancel Reservation</title>
<link rel = "stylesheet" type = "text/css" href = "../SunnyIsle.css"/><!--css of the whole page-->
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
				echo '<a href = "booking.php">[New Reservations]</a>&nbsp;&nbsp;&nbsp;';
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
	<div class = "naviContent">
		<a href = "../index.html">Login page</a> > 
		<a href = "booking.php">Booking</a> > 
		<a href = "record.php">My orders</a> > Cancel order
	</div>
</div>
<div class = "wrapBox">
	<div class = "promptBox">
		<?php
			try{
				$conn = new PDO("mysql:host=localhost;dbname=scysz3", "scysz3", "Zsbnyhhd100...");
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$sql = 'DELETE FROM BookInfo WHERE bookID = :bookID;';
				$tmp = $conn->prepare($sql);
				$tmp->bindParam(':bookID', $_GET['bookID']);
				$res = $tmp->execute();
				if($res == 1){
					echo '<p>You have successfully canceled this order. <br/>We are here waiting for you. Thank you.</p>';
					echo '<a href = "record.php">Go back</a>';
				}
			}catch(PDOException $e){
				echo 'Sorry, something wrong seems to happen to our server. You can visit our page later.';
			}
		?>
	</div>
</div>
</body>
</html>