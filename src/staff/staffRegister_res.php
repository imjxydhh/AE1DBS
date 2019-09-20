<!DOCTYPE html>
<head>
<title>Sunny Isle - Register(staff)</title>
<link rel = "stylesheet" type = "text/css" href = "../SunnyIsle.css"/>
<script type = "text/javascript" src = "staffregi_ajax.js"></script>
</head>
<body>
<div class = "index_header">
	<div class = "logo">
		<span class = "logo"><img id = "logo" src = "../logo.png"/></span>
	</div>
</div>
<div class = "navigation">
	<div class = "naviContent">
		<a href = "staffin.php">Staff login page</a> > <a href = "staffRegister.php">Create staff account</a>
		> Staff register complete
	</div>
</div>
<div class = "wrapBox">
<div class = "promptBox">
<?php
try{
	$conn = new PDO("mysql:host=localhost;dbname=scysz3", "scysz3", "Zsbnyhhd100...");
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql = "INSERT INTO Staffs (Username, Password, RealName, TelNumber) VALUES (:username, :password, :realname, :telnumber)";
	$tmp = $conn->prepare($sql);
	$tmp->bindParam(":username", $_POST['username']);
	$tmp->bindParam(":password", $_POST['password']);
	$tmp->bindParam(":realname", $_POST['real_name']);
	$tmp->bindParam(":telnumber", $_POST['telnumber']);
	$res = $tmp->execute();
	if($res != 1){
		echo '<div class = "serverErr">';
		echo "<p class = \"server_error\">Sorry, something wrong seems to happen to our server. You can visit our page later.<br/>";
		echo 'You can click "Go back" to go back to the registering page</p>';
		echo '<a class = "url" href = "staffRegister.php">Go back</a>';
		echo '</div>';
		
	}else{
		session_start();
		//login automatically for this user
		$_SESSION['login_state'] = 2;
		$_SESSION['username'] = $_POST['username'];
		echo '<div class = "regi_comp">';
		echo '<p class = "prmpt">Registration Completed<br/>';
		echo 'This account have been automatically signed . Click "Complete" complete the registration!</p>';
		echo '<a class = "staffviewUrl" href = "staffviewall.php">Complete</a>';
		echo '</div>';
	}
}catch(PDOException $e){
	echo "<p class = \"server_error\">Sorry, something wrong seems to happen to the server.</p>";
}
?>
</div>
</div>
</body>
</html>