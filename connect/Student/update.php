 <?php
 include("connection.php");
        session_start();
             $id=$_SESSION['stud_id'];
            $fname1=$_REQUEST['txtfname'];
            $mname1=$_REQUEST['txtmname'];
            $lname1=$_REQUEST['txtlname'];
            $uname1=$_REQUEST['txtuname'];
            $email1=$_REQUEST['txtemail'];
            $G1=$_REQUEST['gender'];
            $dob1=date('Y-m-d',strtotime($_REQUEST['txtdob']));
           $add1=$_REQUEST['txtadd'];
            $con1=$_REQUEST['txtcon'];
     
           $query="UPDATE studentmst set Firstname='$fname1',Middlename='$mname1',Lastname='$lname1',Username='$uname1',Email='$email1',Gender='$G1',Dob='$dob1',Address='$add1',Contact='$con1' where Studentid=$id";
          // echo $query;
           $cnt=mysqli_query($cnn,$query);
           if($cnt >0)
           {
            header("location:viewprofile.php");
           }
?>
