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
	$id=$_POST['id'];
	$name    = $_POST['inputname'];
	$email   = $_POST['email'];
	$pass    = md5($_POST['password']);
	$depart  = $_POST['depart'];
	$role    = $_POST['role'];
    if($_POST['password']==''){
    	$query = "UPDATE `user_tbl` SET `name`='$name', `email`='$email', `department`='$depart', `role`='$role' WHERE `id`='$id'";
    }else{
    	$query = "UPDATE `user_tbl` SET `name`='$name', `email`='$email', `password`='$pass', `department`='$depart', `role`='$role' WHERE `id`='$id'";
    }
	$res=mysqli_query($con, $query);
	if ($res) {
		$_SESSION['success'] = "Data Updated Successfully!!!";
		header('location:dashboard.php');
	}else{
		echo "Data not Updated Successfully";
	}
}

?>