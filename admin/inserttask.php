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

if (isset($_REQUEST['message'])) 
{
	$message   = mysqli_real_escape_string($con,$_POST['message']);
	$assign_by = $_POST['assign_by'];
	$emplist = $_POST['emp'];
	//print_r($emplist);
	foreach ($emplist as $emp) {
	$query = "INSERT INTO `task`(`t_id`, `task`, `id`, `assign_by`) VALUES ('','$message','$emp','$assign_by')";
	$res=mysqli_query($con, $query);
	}
	if ($res) {
		$_SESSION['success'] = "Message send successfully!!!";
		header('location:task.php');
	}else{
		$_SESSION['error'] = "Message not send seccessfully,at first select employee.";
		header('location:task.php');
	}
}

?>