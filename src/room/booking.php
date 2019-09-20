<!DOCTYPE html>
<head>
<title>Sunny Isle Hotel - Booking</title>
<link rel = "stylesheet" type = "text/css" href = "../SunnyIsle.css"/>
<script type = "text/javascript" src = "booking.js"></script>
<script type = "text/javascript" src = "booking_ajax.js"></script>
</head>
<body onload = "displayYear();">
<div class = "index_header">
	<div class = "login_state">
		<div class = "logInOut">
		<?php
			session_start();
			if(!isset($_SESSION['login_state'])){
				$_SESSION['login_state'] = 0;
				echo '<a href = "../register/register.php">[Join]</a>&nbsp;&nbsp;&nbsp;';
				echo '<a href = "../index.html">[Sign In]</a>';
			}elseif($_SESSION['login_state'] == 1){
				echo 'Account:[' . $_SESSION['username'] .  ']&nbsp;&nbsp;&nbsp;';
				echo '<a href = "record.php">[My Reservations]</a>&nbsp;&nbsp;&nbsp;';
				echo '<a href = "logout.php">[Log Out]</a>';
			}elseif($_SESSION['login_state'] == 2){
				header('Location: ../index.html');
			}else{
				echo '<a href = "register.php">[Join]</a>&nbsp;&nbsp;&nbsp;';
				echo '<a href = "../index.html">[Sign In]</a>';
			}
		?>
		</div>
	</div>
	<div class = "logo">
		<span class = "logo"><img id = "logo" src = "../logo.png"/></span>
	</div>
</div>
<div class = "navigation">
	<div class = "naviContent"><a href = "../index.html">Login page</a> > Booking</div>
</div>
<div class = "wrapBox">
	<div class = "infoForm">
		<form id = "infoForm" onsubmit = "return false;">
			<div class = "inDate">
				<label class = "formContent">Check in:<br/>Year: 
					<select name = "inYear" onchange = "inYearChange();">
					</select>
				</label><br/>
				<label class = "formContent">Month: 
					<select name = "inMonth" onchange = "inMonthChange()">
					</select>
				</label><br/>
				<label class = "formContent">Date: 
					<select name = "inDate" onchange = "inDateChange();">
					</select>
				</label>
			</div>
			<div class = "outDate">
				<label class = "formContent" onchange = "outYearChange();">Check out:<br/>Year:
					<select name = "inYear">
					</select>
				</label><br/>
				<label class = "formContent">Month: 
					<select name = "outMonth" onchange = "outMonthChange();">
					</select>
				</label><br/>
				<label class = "formContent">Date: 
					<select name = "outDate">
					</select>
				</label>
			</div>
			<div class = "roomType">
				<label class = "formContent">Type of room:<br/><br/>
					<select name = "roomType">
					<option value = "ldb">Large room with double beds</option>
					<option value = "lsb">Large room with a large single bed</option>
					<option value = "ssb">Small room with a single bed</option>
					<option value = "vip">VIP room</option>
					</select>
				</label>
			</div>
			<?php
				if(!isset($_SESSION['login_state'])){
					$_SESSION['login_state'] = 0;
					echo '<button class = "loginBtn" onclick = "window.location.href = \'../index.html\'">Log in</button>';
				}elseif($_SESSION['login_state'] == 1){
					echo '<input class = "searchBtn" type = "submit" value = "Search" onclick = "displayRoom();"/>';
				}else{
					echo '<button class = "loginBtn" onclick = "window.location.href = \'../index.html\'">Log in</button>';
				}
			?>
		</form>

	</div>
	<div id = "roomTable" class = "roomTable">	
		<table class = "roomTable">
			<tr >
				<td class = "roomTable"><span id = "ldb1" class = "ldb">Large double bed<br/><br/>Room X01&nbsp;&nbsp;</span><span id = "r1"></span></td>
				<td class = "roomTable"><span id = "ldb2" class = "ldb">Large double bed<br/><br/>Room X02&nbsp;&nbsp;</span><span id = "r2"></span></td>
				<td class = "roomTable"><span id = "lsb3" class = "lsb">Large single bed<br/><br/>Room X03&nbsp;&nbsp;</span><span id = "r3"></span></td>
				<td class = "roomTable"><span id = "lsb4" class = "lsb">Large single bed<br/><br/>Room X04&nbsp;&nbsp;</span><span id = "r4"></span></td>	
				<td class = "roomTable"><span id = "ssb5" class = "ssb">Small single bed<br/><br/>Room X05&nbsp;&nbsp;</span><span id = "r5"></span></td>
			</tr>
			<tr id = "blankRow1">
				<td></td>
				<td id = "blank1" colspan = "3"></td>
				<td></td>
			</tr>
			<tr id = "stairsRow">
				<td class = "roomTable" rowspan = "2"><span id = "vip13">VIP Room<br/><br/>Room X13&nbsp;&nbsp;</span><span id = "r13"></span></td>
				<td id = "stairs" rowspan = "2" colspan = "3">Stairs &amp; Lobby </td>
				<td class = "roomTable"><span id = "ssb6" class = "ssb">Small single bed<br/><br/>Room X06&nbsp;&nbsp;</span><span id = "r6"></span></td>
			</tr>	
			<tr>
				<td class = "roomTable"><span id = "ssb7" class = "ssb">Small single bed<br/><br/>Room X07&nbsp;&nbsp;</span><span id = "r7"></span></td>
			</tr>
			<tr id = "blankRow2">
				<td></td>
				<td id = "blank2" colspan = "3"> </td>
				<td></td>
			</tr>
			<tr>	
				<td class = "roomTable"><span id = "ldb12" class = "ldb">Large double bed<br/><br/>Room X12&nbsp;&nbsp;</span><span id = "r12"></span></td>
				<td class = "roomTable"><span id = "ldb11" class = "ldb">Large double bed<br/><br/>Room X11&nbsp;&nbsp;</span><span id = "r11"></span></td>
				<td class = "roomTable"><span id = "lsb10" class = "lsb">Large single bed<br/><br/>Room X10&nbsp;&nbsp;</span><span id = "r10"></span></td>
				<td class = "roomTable"><span id = "lsb9" class = "lsb">Large single bed<br/><br/>Room X09&nbsp;&nbsp;</span><span id = "r9"></span></td>
				<td class = "roomTable"><span id = "ssb8" class = "ssb">Small single bed<br/><br/>Room X08&nbsp;&nbsp;</span><span id = "r8"></span></td>
			</tr>
			<tr>
		</table>	
	</div>
</div>
</body>
</html>