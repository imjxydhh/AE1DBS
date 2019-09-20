<!DOCTYPE html>
<head>
<title>Sunny Isle-Register</title>
<link rel = "stylesheet" type = "text/css" href = "../SunnyIsle.css"/>
<script type = "text/javascript" src = "register.js"></script>
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
		<a href = "../index.html">Login page</a> > Create account
	</div>
</div>
<div class = "wrapBox">
	<div class = "regiBody">
		<div class = "regiHeader">
			<h2>Become our member</h2>
		</div>
		<div class = "regiform">
			<form id = "register" class = "regiform" action = "register_res.php" method = "post" onsubmit = "return chkInfo();">
				<label>
					Username<br/><input class = "regi" type = "text" name = "username" placeholder = "At least 6 characters and less than 15 characters"/>
				</label><span id = "username" class = "blankpmt"></span><br/>
				<label>
					Password<br/><input class = "regi" type = "password" name = "password" placeholder = "At least 6 characters and less than 20 characters"/>
				</label><span id = "password" class = "blankpmt"></span><br/>
				<label>
					Password Confirmation<br/><input class = "regi" type = "password" name = "passwordC" placeholder = "Please enter the same password again"/>
				</label><span id = "passwordC" class = "blankpmt"></span><br/>
				<label>
					Real Name<br/><input class = "regi" type = "text" name = "real_name" placeholder = "Real name matching the name on the passport"/>
				</label><span id = "real_name" class = "blankpmt"></span><br/>
				<label>
					Passport ID<br/><input class = "regi" type = "text" name = "passport" placeholder = "Your passport ID"/>
				</label><span id = "passport" class = "blankpmt"></span><br/>
				<label>
					Telephone Number<br/><input class = "regi" type = "text" name = "telnumber" placeholder = "Your frequently used mobile phone number"/>
				</label><span id = "telnumber" class = "blankpmt"></span><br/>
				<label>
					email<br/><input class = "regi" type = "text" name = "email" placeholder = "Your frequently used eamil address"/>
				</label><span id = "email" class = "blankpmt"></span><br/>
				<input class = "regi_sbmt" type = "submit" value = "Register"/>
			</form>
			<script type = "text/javascript">
				var dom = document.getElementById("register");
				dom.elements[0].onchange = chkusName;
				dom.elements[1].onchange = chkPass;
				dom.elements[2].onchange = chkPassC;
				dom.elements[3].onchange = refreshRname;
				dom.elements[4].onchange = refreshPassport; 
				dom.elements[5].onchange = refreshTel;
				dom.elements[6].onchange = chkEmail;
			</script>
		</div>
	</div>
</div>
</body>
</html>