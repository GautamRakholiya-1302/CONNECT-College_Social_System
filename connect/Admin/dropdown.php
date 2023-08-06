<?php
    include("connection.php");

   if(isset($_GET['cid']))
   {
   		$cou=$_GET['cid'];
   		if($cou !="")
   		{
   			$query="SELECT * from semestermst where Courseid=$cou";
   			//echo $query;
   			$res=mysqli_query($cnn,$query);
   			echo "<select id='semester' name='sem' class='form-control text-info' onchange='get_sub();'>";
   			echo "<option>Select Semester</option>";
   			while($row=mysqli_fetch_array($res))
   			{
   				echo "<option  value=".$row['Semesterid'].">".$row['Semestername']."</option>";
   			}
   			echo "</select>";
   		}
   }

	
   if(isset($_GET['sid']) && isset($_GET['couid']))
   {
   		$sem=$_GET['sid'];
   		$cs=$_GET['couid'];
   		if($sem !="" && $cs !="")
   		{
   			$query="SELECT * from subjectmst where Semesterid=$sem and Courseid=$cs";
			//echo $query;
			$res=mysqli_query($cnn,$query);
			echo "<select id='subject' name='sub' class='form-control text-info'>";
   			echo "<option>Select Subject</option>";
   			while($row=mysqli_fetch_array($res))
   			{
   				echo "<option  value=".$row['Subjectid'].">".$row['Subjectname']."</option>";
   			}
   			echo "</select>";
   		}

	}

   if(isset($_GET['semid']) && isset($_GET['couid1']))
   {
      $semid=$_GET['semid'];
      $cid=$_GET['couid1'];
      if($semid !="" && $cid !="")
      {
         $query="SELECT * FROM classmst where Semesterid=$semid and Courseid=$cid";
         echo $query;
         $res=mysqli_query($cnn,$query);
         echo "<select id='class' name='class' class='form-control text-info'>";
            echo "<option>Select Class</option>";
            while($row=mysqli_fetch_array($res))
            {
               echo "<option value=".$row['Classid'].">".$row['Classname']."</option>";
            }  
         echo "</select>";
      }
   }
?>