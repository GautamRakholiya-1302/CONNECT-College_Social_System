<?php
    require_once("session.php");
	include("connection.php");
	$id=$_REQUEST['id'];
    			$query="UPDATE  teachermst set Facultystatus='left' where Teacherid=$id";
                echo $query;
                
				$cnt=mysqli_query($cnn,$query);
				if($cnt>0)
				{
					header("location:managefaculty.php");
				}
?>