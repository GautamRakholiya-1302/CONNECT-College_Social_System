<?php
 include("connection.php");
	
 $id=$_REQUEST['id'];
 $tid=$_REQUEST['tid'];
 $query="delete from tpostmst where Postid=$id";
 $cnt=mysqli_query($cnn,$query);
 if($cnt > 0 )
 {
 	header("location:facultyprofile.php?id=$tid");
 }
?>