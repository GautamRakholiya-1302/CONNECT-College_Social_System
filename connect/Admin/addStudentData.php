<?php
    include("connection.php");
    session_start();
    require_once("sendEmail.php");

if(isset($_REQUEST['type']))
{
    if($_REQUEST['type'] === "single")
    {
        $eno    =    $_POST['txteno'];
        $fname  =    $_POST['txtfname'];
        $mname  =    $_POST['txtmname'];
        $lname  =    $_POST['txtlname'];
        $email  =    $_POST['txtemail'];
        $g      =    $_POST['gender'];
        $dob    =    $_POST['dob'];
        $address=    $_POST['txtadd'];
        $phone  =    $_POST['txtcon'];
        $cou    =    $_POST['txtcou'];
        $sem   =    $_POST['sem'];
        $class =    $_POST['class'];
        $uname  = substr(str_replace(' ','',strtolower($fname.$mname)), 0, 8).rand(1,100);        
        $pwd    = bin2hex(openssl_random_pseudo_bytes(4)); 
        $pswd   = base64_encode($pwd);   
        $query  = "select max(Studentid) from studentmst";
        $res    = mysqli_query($cnn,$query);
        $ans    = mysqli_fetch_array($res);
        $id     = $ans[0] + 1;
        $ndob   = date('Y-m-d',strtotime($dob));
         $query = "INSERT into studentmst(`Enrollmentno`,`Firstname`,`Middlename`,`Lastname`,`Username`,`Pwd`,`Email`,`Gender`,`Dob`,`Address`,`Contact`,`Courseid`,`Semesterid`,`Classid`) values('$eno','$fname','$mname','$lname','$uname','$pswd','$email','$g','$ndob','$address','$phone',$cou,$sem,$class)";
            if(sendEmail($email,$uname,$pswd))
            {
               
                if(mysqli_query($cnn,$query))
                {
                    $_SESSION['message']="Student added successfully";
                    echo "<script type=\"text/javascript\">
                    window.location = \"viewstudent.php?Err=true\"
                    </script>";
                }
                else
                {
                    $_SESSION['message']="Failed to add student...please try again.";
                    echo "<script type=\"text/javascript\">
                    window.location = \"addstudent.php?isErr=true\"
                    </script>";
                }
            }
            else{
                    $_SESSION['message']="Please Check Your Internet Connection...";
                    echo "<script type=\"text/javascript\">
                    window.location = \"addstudent.php?isErr=true\"
                   </script>";
            }
    }
    else
    {
            $filename=$_FILES['file']['tmp_name'];  
            $type="application/vnd.ms-excel";  
            
            if($_FILES['file']['size'] > 0 && $type==$_FILES['file']['type'])
            {
                     $file = fopen($filename, "r");
                     $cnt=0;
                     $getData = fgetcsv($file, 10000, ",");
                    while(($getData = fgetcsv($file, 10000, ",")) !== FALSE)
                    {
                        $fname  =    $getData[1];
                        $mname  =    $getData[2];
                        $dob    =    $getData[6];
                        $email  =    $getData[4];
                        $uname  = substr(str_replace(' ','',strtolower($fname.$mname)), 0, 8).rand(1,100);        
                        $pwd    = bin2hex(openssl_random_pseudo_bytes(4)); 
                        $pswd   = base64_encode($pwd);   
                        $ndob   = date('Y-m-d',strtotime($dob));
                        $cou    = $getData[9];
                        $sem    = $getData[10];
                        $class  = $getData[11];
                        $q1="SELECT Courseid from coursemst where Coursename='$cou' ";
                        $r1=mysqli_query($cnn,$q1);
                        $a1=mysqli_fetch_array($r1);
                        $couid=$a1['Courseid'];
                        
                        $q2="SELECT Semesterid from semestermst where Semestername='$sem'  and Courseid=$couid";
                        $r2=mysqli_query($cnn,$q2);
                        $a2=mysqli_fetch_array($r2);
                        $semid=$a2['Semesterid'];
                        
                        $q3="SELECT Classid from classmst where Courseid=$couid and Semesterid=$semid";
                        $r3=mysqli_query($cnn,$q3);
                        $a3=mysqli_fetch_array($r3);
                        $classid=$a3['Classid'];
                        
                        $sql = "INSERT into studentmst(Enrollmentno,Firstname,Middlename,Lastname,Username,Pwd,Email,Gender,Dob,Address,Contact,Courseid,Semesterid,Classid) values ('".$getData[0]."','".$getData[1]."','".$getData[2]."','".$getData[3]."','".$uname."','".$pswd."','".$getData[4]."','".$getData[5]."','".$ndob."','".$getData[7]."','".$getData[8]."',$couid,$semid,$classid)";
                  
                    if(sendEmail($email,$uname,$pswd))
                    {
                       
                        if(mysqli_query($cnn,$sql))
                        {
                            $_SESSION['message']="<b>Student added successfully</b>";
                            echo "<script type=\"text/javascript\">
                            window.location = \"viewstudent.php?Err=true\"
                            </script>";
                        }
                        else
                        {
                            $_SESSION['message']="Failed to add student...please try again.";
                            echo "<script type=\"text/javascript\">
                            window.location = \"addstudent.php?isErr=true\"
                            </script>";
                        }
                    }
                    else
                    {
                        $_SESSION['message']="Please Check Your Internet Connection...";
                        echo "<script type=\"text/javascript\">
                        window.location = \"addstudent.php?isErr=true\"
                        </script>";
                    }
                }

            }
            else
            {
                header("location:addstudent.php?err=1");
            }
        
    }
}
?>