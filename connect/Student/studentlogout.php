<?php
	include("connection.php");
	session_start();
	$id=$_SESSION['user_id'];
	$status="Offline";
    $que="UPDATE studentmst set Status='$status' where Studentid=$id";
    $tmp=mysqli_query($cnn,$que);
	session_destroy();
	header("location:studentlogin.php");
?>