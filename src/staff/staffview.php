<!DOCTYPE html>
<head>
<title>Staff only</title>
<link rel = "stylesheet" type = "text/css" href = "../SunnyIsle.css"/><!--css of the whole page-->
<script type = "text/javascript">
	function cancelConf(bookID, roomID, floor){
		var res = confirm("Are you sure to cancel this order?");
		if(res){
			window.location.href = 'staffCancel.php?bookID=' + bookID+"&roomID="+roomID+"&floor="+floor;
		}
	}
</script><!--event_driven functions-->
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
				echo '<a href = "stafflogout.php">[Log out]</a>';
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
		<a href = "staffin.php">Staff Login</a> > <a href = "staffviewall.php">All rooms</a> > Room <?php echo $_GET['floor'] . '-' .$_GET['roomID'];?>
	</div>
</div>
<div class = "wrapBox">
	<div class = "staffOrderbox">
		<h2 class = "record">Current orders</h2>
		<table class = "record">
			<tr class = "recordNavi">
				<td class = "record">Username</td>
				<td class = "record">Real Name</td>
				<td class = "record">Room(Floor-Room No.)</td>
				<td class = "record">Check in</td>
				<td class = "record">Check out</td>
			</tr>
			<?php
				try{
					$nowDate = date('Y-m-d');
					$conn = new PDO("mysql:host=localhost;dbname=scysz3", "scysz3", "Zsbnyhhd100...");
					$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$sql = 'SELECT * FROM BookInfo INNER JOIN Guests USING (Username)		 
							WHERE startDate >= :nowDate AND RoomID = :roomID
							AND Stairs = :stairs
							ORDER BY startDate ASC';
					$tmp = $conn->prepare($sql);
					$tmp->bindParam(':nowDate', $nowDate);
					$tmp->bindParam(':roomID', $_GET['roomID']);
					$tmp->bindParam(':stairs', $_GET['floor']);
					$tmp->execute();
					$result = $tmp->fetchAll(PDO::FETCH_ASSOC);
					$pageAmt = count($result);
					if($pageAmt == 0){
						echo '<tr><td class = "back" colspan = "6">There isn\'t any order now.</td></tr>';
						echo '<tr><td class = "back" colspan = "6"><a href = "staffviewall.php">Go back</a></td></tr>';
					}else{
						foreach($result as $record){
							echo '<tr><td class = "record">' . $record['Username'] . '</td>';
							echo '<td class = "record">' . $record['RealName'] . '</td>';
							echo '<td class = "record">' . $record['Stairs'] . '-' . $record['RoomID'] . '</td>';
							echo '<td class = "record">' . $record['startDate'] . '</td>';
							echo '<td class = "record">' . $record['endDate'] . '</td>';
							echo '<td class = "record"><a onclick = "cancelConf(' . $record['bookID'] . ',' . $_GET['roomID'] . ',' . $_GET['floor'] . ');">Cancel</a></td></tr>';
							echo '<tr><td class = "back" colspan = "6"><a href = "staffviewall.php">Go back</a></td></tr>';
						}			
					}
				}catch(PDOException $e){
					echo '<tr><td colspan = "6">Sorry, something wrong seems to happen to our server. You can visit our page later.</td></tr>';
				}
				echo '</table>';
			?>
	</div>
</div>
</body>
</html>