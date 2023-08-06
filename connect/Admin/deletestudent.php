<?php
	include("connection.php");
$id=$_REQUEST['id'];
        $que="SELECT * from studentmst where Studentid=$id";
        $res=mysqli_query($cnn,$que);
        $ans=mysqli_fetch_array($res);
            $enroll=$ans['Enrollmentno'];
            $fnm=$ans['Firstname'];
            $mnm=$ans['Middlename'];
            $lnm=$ans['Lastname'];
            $unm=$ans['Username'];
            $pwd=$ans['Pwd'];
            $email=$ans['Email'];
            $profile=$ans['Profile'];
            $gender=$ans['Gender'];
            $dob=$ans['Dob'];
            $add=$ans['Address'];
            $con=$ans['Contact'];
            $cou=$ans['Courseid'];
            $sem=$ans['Semesterid'];
            $class=$ans['Classid'];

            $q="INSERT into alumnimst (Enrollmentno,Firstname,Middlename,Lastname,Username,Pwd,Email,Profile,Gender,Dob,Address,Contact,Courseid,Semesterid,Classid) values('$enroll','$fnm','$mnm','$lnm','$unm','$pwd','$email','profile','$gender','dob','$add','$con',$cou,$sem,$class)";
            $cnt=mysqli_query($cnn,$q);
        
	if($cnt > 0)
	{
	$query="delete from studentmst where Studentid=$id";
	$cnt=mysqli_query($cnn,$query);
	if($cnt>0)
	{
		header("location:viewstudent.php");
	}
	}
?>