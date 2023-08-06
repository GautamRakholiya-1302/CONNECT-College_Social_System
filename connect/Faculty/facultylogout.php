<?php
	include("connection.php");
session_start();
$id=$_SESSION['user_id'];
$status="Offline";
$que="UPDATE teachermst set Status='$status' WHERE Teacherid=$id";
$tmp=mysqli_query($cnn,$que);
session_destroy();
header("location:facultylogin.php");
?>