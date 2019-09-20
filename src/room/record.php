<!DOCTYPE html>
<head>
<title>Sunny Isle Hotel - My Reservation</title>
<link rel = "stylesheet" type = "text/css" href = "../SunnyIsle.css"/><!--css of the whole page-->
<script type = "text/javascript">
	function cancelConf(bookID){
		var res = confirm("Are you sure to cancel this order?");
		if(res){
			window.location.href = 'cancel.php?bookID=' + bookID;
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
		<a href = "../index.html">Login page</a> > <a href = "booking.php">Booking</a> > My orders
	</div>
</div>
<div class = "wrapBox">
	<div class = "orderBox">
		<h2 class = "record">Current orders</h2>
		<table class = "record">
			<tr class = "recordNavi">
				<td class = "record">Room(Floor-Room No.)</td>
				<td class = "record">Check in</td>
				<td class = "record">Check out</td>
			</tr>
			<?php
				try{
					$nowDate = date('Y-m-d');
					$conn = new PDO("mysql:host=localhost;dbname=scysz3", "scysz3", "Zsbnyhhd100...");
					$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					if(!isset($_GET['key'])){
						$sql = 'SELECT  bookID, Stairs, RoomID, startDate, endDate FROM BookInfo 
						        WHERE Username = :username AND startDate >= :nowDate ORDER BY startDate ASC';
						$tmp = $conn->prepare($sql);
					}else{
						$sql = 'SELECT bookID, Stairs, RoomID, startDate, endDate FROM BookInfo 
								WHERE Username = :username AND startDate >= :nowDate ORDER BY :key ';
						if(!isset($_GET['order'])){
							$sql = $sql . 'ASC;';
						}else{
							$sql = $sql . $_GET['order'] . ';';
						}
						$tmp = $conn->prepare($sql);
						$tmp->bindParam(':key', $_GET['key']);
					}
					$tmp->bindParam(':username', $_SESSION['username']);
					$tmp->bindParam(':nowDate', $nowDate);
					$tmp->execute();
					$result = $tmp->fetchAll(PDO::FETCH_ASSOC);
					$pageAmt = count($result);
					if($pageAmt == 0){
							
						echo '<tr><td class = "record" colspan = "4">There isn\'t any order of you.';
						echo '<a href = "booking.php">Click here to book room now!</a></td></tr>';
						
						echo '</table>';
					}else{
						foreach($result as $record){
							echo '<tr><td class = "record">' . $record['Stairs'] . '-' . $record['RoomID'] . '</td>';
							echo '<td class = "record">' . $record['startDate'] . '</td>';
							echo '<td class = "record">' . $record['endDate'] . '</td>';
							echo '<td class = "record"><a onclick = "cancelConf(' . $record['bookID'] . ');">Cancel</a></td></tr>';
						}
						echo '<tr><td class = "back" colspan = "4"><a href = "booking.php">Go back</a></td></tr>';
						echo '</table>';
					}
				}catch(PDOException $e){
					echo '<tr><td colspan = "5">Sorry, something wrong seems to happen to our server. You can visit our page later.</td></tr>';
				}
			
			?>
	</div>
</div>
</body>
</html>