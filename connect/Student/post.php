<?php
 include("connection.php");
 require_once("session.php");

 $id=$_SESSION['stud_id'];
 $des=$_REQUEST['txtdes'];
 $audio=$_FILES['audio']['name'];
 $video=$_FILES['video']['name'];
 $photo=$_FILES['photo']['name'];
 $time=time();
	if($audio!="")
 			{
 			  $audio=$id.$_FILES['audio']['name'];		
 				$query="insert into postmst(Studentid,Description,Postaudio,time) values($id,'$des','$audio',$time)";
 				//echo $query;

 				$cnt=mysqli_query($cnn,$query);
 				if($cnt >0)
 				{

 					move_uploaded_file($_FILES['audio']['tmp_name'],"../img/post/audio/".$audio);
           			$_SESSION['message']="<b>Your Post has been send to admin for approval ..You will see soon..</b>";
                    echo "<script type=\"text/javascript\">
                    window.location = \"studentprofile.php?msg=true\"
                    </script>";
 				}
 			}
 			if($video!="")
 			{
 				$video=$id.$_FILES['video']['name'];
 				$query="insert into postmst(Studentid,Description,Postvideo,time) values($id,'$des','$video',$time)";
 				//echo $query;

 				$cnt=mysqli_query($cnn,$query);
 				if($cnt >0)
 				{
 					
 					move_uploaded_file($_FILES['video']['tmp_name'],"../img/post/video/".$video);
           			$_SESSION['message']="<b>Your Post has been send to admin for approval ..You will see soon..</b>";
                    echo "<script type=\"text/javascript\">
                    window.location = \"studentprofile.php?msg=true\"
                    </script>";
 				}
 			}
 			if($photo!="")
 			{
 					
                $photo=$id.$_FILES['photo']['name'];
 				$query="insert into postmst(Studentid,Description,Postimg,time) values($id,'$des','$photo',$time)";
 				//echo $query;
 				$cnt=mysqli_query($cnn,$query);
 				if($cnt >0)
 				{
 					 
 					move_uploaded_file($_FILES['photo']['tmp_name'],"../img/post/photo/".$photo);
           			 $_SESSION['message']="<b>Your Post has been send to admin for approval ..You will see soon..</b>";
                    echo "<script type=\"text/javascript\">
                    window.location = \"studentprofile.php?msg=true\"
                    </script>";
 				}
 			}
 	
 
?>