<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'webshop';


$conn = new mysqli($servername,$username,$password,$dbname);

if ($conn->connect_error) {
	# code...
	echo "connection failed" . $conn->connect_error;
} else {
	echo "works";
}


?>