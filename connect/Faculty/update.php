 <?php
 include("connection.php");
              session_start();
             $id=$_SESSION['user_id'];
            $name1=$_REQUEST['txtname'];
            $uname1=$_REQUEST['txtuname'];
            $email1=$_REQUEST['txtemail'];
            $G1=$_REQUEST['gender'];
            $dob1=date('Y-m-d',strtotime($_REQUEST['dob']));
            $con1=$_REQUEST['txtcon'];
            $dept1=$_REQUEST['txtdept'];
            $q1="SELECT Courseid from coursemst where Coursename='$dept1' ";
            $res=mysqli_query($cnn,$q1);
            $ans=mysqli_fetch_array($res);
            $cid=$ans['Courseid'];
            $qul1=$_REQUEST['txtqul'];
     
           $query="UPDATE teachermst set Name='$name1',Username='$uname1',Email='$email1',Gender='$G1',Dob='$dob1',Contact='$con1',Qualification='$qul1',Department=$cid where Teacherid=$id";
           //echo $query;
           $cnt=mysqli_query($cnn,$query);
           if($cnt >0)
           {
            header("location:viewprofile.php");
           }
?>
