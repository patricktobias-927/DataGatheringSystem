<?php 
$database = "dgsdb";
$host = "localhost";
$username = "root";
$password = "";

$conn = mysqli_connect($host, $username, $password, $database);

if($conn->connect_error){
	die("Connection failed: " . $conn->connect_error);
}
// error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING ^ E_DEPRECATED);


 ?>
