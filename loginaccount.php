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

if (isset($_POST['email'])) {
	
	$email   = $_POST['email'];
	$pass    = md5($_POST['password']);

	$query ="SELECT * FROM user_tbl WHERE email='$email' AND password='$pass'";
	$res=mysqli_query($con, $query);
	$count=mysqli_num_rows($res);
	$row=mysqli_fetch_array($res);
    if ($count==1) {
    	$session_id=session_id();
    	$_SESSION['auth']=$session_id;
        $_SESSION['id']=$row['id'];
    	$role=$row['role'];
    	if($role=='admin')
    	{
    		header('location:admin/dashboard.php');
    	}
    	elseif($role=='employee')
        {
        	header('location:employee/dashboard.php');
        }
        else
        {
        	$_SESSION['error']="Wrong email and password, plz enter correct email and password";
    	    header('location:login.php');
        }
    }else{
    	$_SESSION['error']="Wrong email and password, plz enter correct email and password";
    	header('location:login.php');
    }
}

?>