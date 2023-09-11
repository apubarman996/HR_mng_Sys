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

if (isset($_REQUEST['l_from'])) 
{
	$l_from   = $_POST['l_from'];
	$l_to     = $_POST['l_to'];
	$eleave   = $_POST['eleave'];
	$mleave   = $_POST['mleave'];
	$cleave   = $_POST['cleave'];
	$apply_by = $_POST['id'];
	$status   = "pendding";
	
	$query = "INSERT INTO `apply_leave`(`a_id`, `l_from`, `l_to`, `eleave`, `mleave`, `cleave`, `apply_by`,`status`) VALUES ('','$l_from','$l_to','$eleave', '$mleave','$cleave', '$apply_by', '$status')";

	$res=mysqli_query($con, $query);
	if ($res) {
		$_SESSION['success'] = "Leave applied successfully!!!";
		header('location:leave.php');
	}else{
		$_SESSION['error'] = "Leave not applied,please try again.";
		header('location:leave.php');
	}
}

?>