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

if (isset($_REQUEST['validfrm'])) 
{
	$validfrm   = $_POST['validfrm'];
	$validto    = $_POST['validto'];
	$eleave     = $_POST['eleave'];
	$mleave     = $_POST['mleave'];
	$cleave     = $_POST['cleave'];
	$assign_by  = $_POST['assign_by'];
	$emplist    = $_POST['emp'];

	foreach ($emplist as $emp) {
	$query = "INSERT INTO `assign_leave`(`l_id`, `v_from`, `v_to`, `e_leave`, `m_leave`, `c_leave`, `assign_to`, `assign_by`) VALUES ('','$validfrm','$validto','$eleave', '$mleave','$cleave', '$emp','$assign_by')";

	$res=mysqli_query($con, $query);
	}

	if ($res) {
		$_SESSION['success'] = "Leave assgined successfully!!!";
		header('location:assignleave.php');
	}else{
		$_SESSION['error'] = "Message not send seccessfully,at first select employee.";
		header('location:assignleave.php');
	}
}

?>