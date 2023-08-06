<?php
	session_start();
	if(!isset($_SESSION['Adminname']))
	{
		header("location:adminlogin.php");
	}
?>