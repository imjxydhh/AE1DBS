<?php
	session_start();
	unset($_SESSION['login_state']);
	unset($_SESSION['username']);
	header('Location: ../index.html');
?>