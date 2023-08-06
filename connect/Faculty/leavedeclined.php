<?php
	include("connection.php");

	$aid=$_REQUEST['id'];
	//echo $aid;
	$query="UPDATE leaveapplicationmst set Approvedstatus='Rejected' where Applicationid=$aid";
	$cnt=mysqli_query($cnn,$query);
	if($cnt>0)
	{
		header("location:manageapplication.php");
	}
?>