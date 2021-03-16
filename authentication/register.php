<?php
session_start();
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'webshop';


$conn = new mysqli($servername,$username,$password,$dbname);

if ($conn->connect_error) {
	# code...
	echo "connection failed" . $conn->connect_error;
} 
//variables to store our users input 
$usernames = $email = $password = $encrypted_pass = '';
$usernameErr = $emailErr = $passwordErr = '';

//session variables 
$_SESSION["reg"] = "Registration Successful";
$_SESSION["noreg"] = "Registration not Successful";
$_SESSION['classTypeSuccess'] = "success";
$_SESSION['classTypeError'] = "danger";



//capture user input / validate users input
if (isset($_POST['save']) ){
	# code...

	if (empty($_POST['username'])) {
		# code...
		$usernameErr = "username is required";
	} else {
		$usernames = $_POST['username'];
	}

if (empty($_POST['email'])) {
		# code...
		$emailErr = "email is required";
	} else {
		$email = $_POST['email'];
	}

if (empty($_POST['password'])) {
		# code...
		$passwordErr = "password is required";
	} else {
		$password = $_POST['password'];
		//encrypting my password 
		$encrypted_pass = md5($password);
	}
	

	if (empty($usernameErr) && empty($emailErr) && empty($passwordErr)) {
		# code...
		//prepare the statement
		$stmt = $conn->prepare("INSERT INTO users (username,email,password) VALUES (?,?,?)");
		$stmt->bind_param("sss",$usernames,$email,$encrypted_pass);

		if ($stmt->execute() === TRUE) {
			# code...
            $_SESSION["reg"];
			$_SESSION['classTypeSuccess'];
			header('location: ../index.php?registered');

		} else {
						# code...
            $_SESSION["noreg"];
			$_SESSION['classTypeError'];
			header('location: ../index.php?notreg');

		}
	}

	



}


?>