<!DOCTYPE html>
<head>
<title>Sunny Isle-Booking</title>
<link rel = "stylesheet" type = "text/css" href = "../SunnyIsle.css"/>
<script type = "text/javascript" src = "../room/booking.js"></script>
<script type = "text/javascript" src = "staffviewall_ajax.js"></script>
<script type = "text/javascript">
	function displayDetail(roomID){
		var floor = document.getElementById("currentPage").innerHTML;
		window.location.href = "staffview.php?roomID=" + roomID + "&floor=" + floor;
	}
</script>
</head>
<body onload = "displayYear();">
<div class = "index_header">
	<div class = "login_state">
		<div class = "logInOut">
		<?php
			session_start();
			if(!isset($_SESSION['login_state'])){
				$_SESSION['login_state'] = 0;
				header('Location: staffin.php');
			}elseif($_SESSION['login_state'] == 2){
				echo 'Account:[' . $_SESSION['username'] .  ']&nbsp;&nbsp;&nbsp;';
				echo '<a href = "stafflogout.php">[Log out]</a>';
			}else{
				header('Location: staffin.php');
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
		<a href = "staffin.php">Staff Login</a> > All rooms
	</div>
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
			<input class = "searchBtn" type = "submit" value = "Search" onclick = "displayRoom();"/>
		</form>

	</div>
	<div id = "roomTable" class = "roomTable">	
		<table class = "roomTable">
			<tr >
				<td class = "roomTable"><span id = "ldb1" class = "ldb">Large double bed<br/><br/><a onclick = "displayDetail(1);">Room X01</a>&nbsp;&nbsp;</span><span id = "r1"></span></td>
				<td class = "roomTable"><span id = "ldb2" class = "ldb">Large double bed<br/><br/><a onclick = "displayDetail(2);">Room X02</a>&nbsp;&nbsp;</span><span id = "r2"></span></td>
				<td class = "roomTable"><span id = "lsb3" class = "lsb">Large single bed<br/><br/><a onclick = "displayDetail(3);">Room X03</a>&nbsp;&nbsp;</span><span id = "r3"></span></td>
				<td class = "roomTable"><span id = "lsb4" class = "lsb">Large single bed<br/><br/><a onclick = "displayDetail(4);">Room X04</a>&nbsp;&nbsp;</span><span id = "r4"></span></td>	
				<td class = "roomTable"><span id = "ssb5" class = "ssb">Small single bed<br/><br/><a onclick = "displayDetail(5);">Room X05</a>&nbsp;&nbsp;</span><span id = "r5"></span></td>
			</tr>
			<tr id = "blankRow1">
				<td></td>
				<td id = "blank1" colspan = "3"></td>
				<td></td>
			</tr>
			<tr id = "stairsRow">
				<td class = "roomTable" rowspan = "2"><span id = "vip13">VIP Room<br/><br/><a onclick = "displayDetail(13);">Room X13</a>&nbsp;&nbsp;</span><span id = "r13"></span></td>
				<td id = "stairs" rowspan = "2" colspan = "3">Stairs &amp; Lobby </td>
				<td class = "roomTable"><span id = "ssb6" class = "ssb">Small single bed<br/><br/><a onclick = "displayDetail(6);">Room X06</a>&nbsp;&nbsp;</span><span id = "r6"></span></td>
			</tr>	
			<tr>
				<td class = "roomTable"><span id = "ssb7" class = "ssb">Small single bed<br/><br/><a onclick = "displayDetail(7);">Room X07</a>&nbsp;&nbsp;</span><span id = "r7"></span></td>
			</tr>
			<tr id = "blankRow2">
				<td></td>
				<td id = "blank2" colspan = "3"> </td>
				<td></td>
			</tr>
			<tr>	
				<td class = "roomTable"><span id = "ldb12" class = "ldb">Large double bed<br/><br/><a onclick = "displayDetail(12);">Room X12</a>&nbsp;&nbsp;</span><span id = "r12"></span></td>
				<td class = "roomTable"><span id = "ldb11" class = "ldb">Large double bed<br/><br/><a onclick = "displayDetail(11);">Room X11</a>&nbsp;&nbsp;</span><span id = "r11"></span></td>
				<td class = "roomTable"><span id = "lsb10" class = "lsb">Large single bed<br/><br/><a onclick = "displayDetail(10);">Room X10</a>&nbsp;&nbsp;</span><span id = "r10"></span></td>
				<td class = "roomTable"><span id = "lsb9" class = "lsb">Large single bed<br/><br/><a onclick = "displayDetail(9);">Room X09</a>&nbsp;&nbsp;</span><span id = "r9"></span></td>
				<td class = "roomTable"><span id = "ssb8" class = "ssb">Small single bed<br/><br/><a onclick = "displayDetail(8);">Room X08</a>&nbsp;&nbsp;</span><span id = "r8"></span></td>
			</tr>
			<tr>
		</table>
		<div class = "pageNavi">
		<label class = "pageNavi">Floor&nbsp;&nbsp;&nbsp;
		<?php
			if(!isset($_GET['floor'])){
				echo '<span id = "currentPage">' . 1 . '</span>&nbsp;&nbsp;&nbsp;';
				for($i=2;$i<11;$i++){
						echo '<a href = "staffviewall.php?floor=' . $i . '">' . $i . '</a>&nbsp;&nbsp;&nbsp;';
				}
			}else{
				for($i=1;$i<11;$i++){
					if($_GET['floor'] == $i){
						echo '<span id = "currentPage">' . $i . '</span>&nbsp;&nbsp;&nbsp;';
					}else{
						echo '<a href = "staffviewall.php?floor=' . $i . '">' . $i . '</a>&nbsp;&nbsp;&nbsp;';
					}
				}
			}
		?>
		</label>
		</div>
	</div>
</div>
</body>
</html>