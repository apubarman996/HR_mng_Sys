<?php

session_start();

$host = "localhost";
$username = "root";
$pass = "";
$db = "ems";

$con=mysqli_connect($host,$username,$pass,$db);
if (!$con) {
	die("Database connection error");
}

if (isset($_REQUEST['email'])) {
	$name    = $_POST['inputname'];
	$email   = $_POST['email'];
	$pass    = md5($_POST['password']);
	$depart  = $_POST['depart'];
	$role    = $_POST['role'];

	$query = "INSERT INTO `user_tbl`(`id`, `name`, `email`, `password`, `department`, `role`) VALUES ('','$name','$email','$pass','$depart','$role')";
	$res=mysqli_query($con, $query);
	if ($res) {
		$_SESSION['success'] = "Data inserted successfully!!!";
		header('location:register.php');
	}else{
		echo "Data not inserted seccessfully";
	}
}

?>