<!DOCTYPE html>
<head>
<title>Sunny Isle - Register(staff)</title>
<link rel = "stylesheet" type = "text/css" href = "../SunnyIsle.css"/>
<script type = "text/javascript" src = "register.js"></script>
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
		Create staff account
	</div>
</div>
<div class = "wrapBox">
	<div class = "regiBody">
		<div class = "regiHeader">
			<h2>New Staff</h2>
		</div>
		<div>
			<form id = "register" class = "regiform" action = "staffRegister_res.php" method = "post" onsubmit = "return chkInfo();">
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
					Real Name<br/><input class = "regi" type = "text" name = "real_name">
				</label><span id = "real_name" class = "blankpmt"></span><br/>
				<label>
					Telephone Number<br/><input class = "regi" type = "text" name = "telnumber">
				</label><span id = "telnumber" class = "blankpmt"></span><br/>
				<input class = "regi_sbmt" type = "submit" value = "Register"/>
			</form>
			<script type = "text/javascript">
				var dom = document.getElementById("register");
				dom.elements[0].onchange = chkusName;
				dom.elements[1].onchange = chkPass;
				dom.elements[2].onchange = chkPassC;
				dom.elements[3].onchange = refreshRname;
				dom.elements[4].onchange = refreshTel;
			</script>
		</div>
	</div>
</div>
</body>
</html>