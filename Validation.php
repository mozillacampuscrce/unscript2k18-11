<?php
if(isset($_POST['submit'])){
		global $conn;
		$username = $_POST['username'];
		$password1 = $_POST['pwd1'];
		$password1 = $_POST['pwd2'];
		if($password1 == $password2){
			$username = mysqli_real_escape_string($conn,$username);
			$password = mysqli_real_escape_string($conn,$password);
			$hashFormat = "$2y$10$";
			$salt = "iusesomeakkysstrings22";
			$hashF = $hashFormat . $salt;
			$encrypt_pwd = crypt($password,$hashF);
			//Write some queries to store in db
			
		}
		else{
			//password doesnt match
		}
			
	}
?>