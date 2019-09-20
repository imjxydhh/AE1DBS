<!DOCTYPE html>
<head>
<title>Staff only</title>
<link rel = "stylesheet" type = "text/css" href = "../SunnyIsle.css"/><!--css of the whole page-->
<script type = "text/javascript" src = "staffin_ajax.js"></script><!--event_driven functions-->
</head>
<body>
<div class = "index_header">
	<div class = "join_link">
		<div class = "join_prompt">
			<label>
				If you are looking for Recruitment information, please contact us directly
			</label>
		</div>
	</div>
	<div class = "logo">
		<span class = "logo"><img id = "logo" src = "../logo.png"/></span>
	</div>
</div>
<div class = "navigation">
	<div class = "naviContent">
		<a href = "../index.html">Login page</a> > Staff Login
	</div>
</div>
<div class = "wrapBox">
	<div class = "loginWrap" >
		<div class = "loginBox">
			<div class = "login">
				<div class = "inp_header">
					<h2>Sign in(For staffs only)</h2>
					<div id = "blankMsg" class = "blankMsg"></div><br/>
				</div>
				<div class = "input">
				<form id = "login_form" onsubmit = "return chkLogin();">
					<label><input class = "username" type = "text" name = "username" placeholder = "Username"/></label><br/><br/>
					<label><input class = "password" type = "password" name = "password" placeholder = "Password" /></label><br/>
					<input class = "loginSbm" type = "submit" value = "SIGN IN"/>
					<!--remember username-->
				</form>
				</div>
				<div class = "forgot_pass">
				</div>
			</div>
			<div class = "loginBottom">
				<a class = "staffUrl" href = "../index.html">Click here to go back to page for guests</a>
			</div>
		</div>
	</div>

</div>
</body>
</html>