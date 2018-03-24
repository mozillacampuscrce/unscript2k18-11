<?php
if(isset($_POST['submit'])){
	global $conn;
	$username = $_POST['login'];
	$password = $_POST['pwd'];
	$username = mysqli_real_escape_string($conn,$username);
	$password = mysqli_real_escape_string($conn,$password);
	;
?>
