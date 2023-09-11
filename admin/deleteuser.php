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

$id=$_GET['id'];

    $query = "DELETE FROM `user_tbl` WHERE `id`='$id'";
    $res=mysqli_query($con, $query);
    if ($res) {
        $_SESSION['success'] = "Data Deleted successfully!!!";
        header('location:dashboard.php');
    }else{
        echo "Data not Deleted";
    }

?>