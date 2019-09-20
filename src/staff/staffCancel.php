<!DOCTYPE html>
<head>
<title>Staff only</title>
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
			}elseif($_SESSION['login_state'] == 2){
				echo 'Account:[' . $_SESSION['username'] .  ']&nbsp;&nbsp;&nbsp;';
				echo '<a href = "stafflogout.php">[Log Out]</a>';
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
		<a href = "staffin.php">Staff Login</a> > 
		<a href = "staffviewall.php">All rooms</a> > 
		<?php echo '<a href = "staffview.php?roomID=' . $_GET['roomID'] . '&floor=' . $_GET['floor'] . '">Room ' . $_GET['floor'] . '-' .$_GET['roomID'];?></a> > 
		Cancel
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
					echo '<p>This order has been canceled. </p>';
					echo '<a href = "staffview.php?roomID=' . $_GET['roomID'] . '&floor=' . $_GET['floor'] . '">Go back</a>';
				}
			}catch(PDOException $e){
				
				echo 'Sorry, something wrong seems to happen to our server.';
			}
		?>
	</div>
</div>
</body>
</html>