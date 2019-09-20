<!DOCTYPE html>
<head>
<title>Sunny Isle-Register</title>
<link rel = "stylesheet" type = "text/css" href = "../SunnyIsle.css"/>
<script type = "text/javascript" src = "register_ajax.js"></script>
</head>
<body>
<div class = "index_header">
	<div class = "logo">
		<span class = "logo"><img id = "logo" src = "../logo.png"/></span>
	</div>
</div>
<div class = "navigation">
	<div class = "naviContent">
		<a href = "../index.html">Login page</a> > <a href = "register.php">Create account</a>
		> Register complete
	</div>
</div>
<div class = "wrapBox">
<div class = "promptBox">
<?php
try{
	$conn = new PDO("mysql:host=localhost;dbname=scysz3", "scysz3", "Zsbnyhhd100...");
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql = "INSERT INTO Guests VALUES (:username, :password, :realname, :passport, :telnumber, :email)";
	$tmp = $conn->prepare($sql);
	$tmp->bindParam(":username", $_POST['username']);
	$tmp->bindParam(":password", $_POST['password']);
	$tmp->bindParam(":realname", $_POST['real_name']);
	$tmp->bindParam(":passport", $_POST['passport']);
	$tmp->bindParam(":telnumber", $_POST['telnumber']);
	$tmp->bindParam(":email", $_POST['email']);
	$res = $tmp->execute();
	if($res != 1){
		echo '<div class = "serverErr">';
		echo "<p class = \"server_error\">Sorry, something wrong seems to happen to our server. You can visit our page later.<br/>";
		echo 'You can click "Go back" to go back to the registering page</p>';
		echo '<a class = "url" href = "register.php">Go back</a>';
		echo '</div>';
		
	}else{
		session_start();
		//login automatically for this user
		$_SESSION['login_state'] = 1;
		$_SESSION['username'] = $_POST['username'];
		echo '<div class = "regi_comp">';
		echo '<p class = "prmpt">Congratulations! Now you are a member of us!<br/>';
		echo 'We have automatically sign in for you. So you can click "Go to book room" to book now!</p>';
		echo '<a class = "bookUrl" href = "../room/booking.php">Go to book room</a>';
		echo '</div>';
	}
}catch(PDOException $e){
	echo "<p class = \"server_error\">Sorry, something wrong seems to happen to our server. You can visit our page later.</p>";
	echo '<p>Or you can visit our home page to get some infomation of rooms: <a href = "../room/booking.php">Click here to go</a></p>';
	echo $e->getMessage();//remember to delete this
}
?>
</div>
</div>
</body>
</html>