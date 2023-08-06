<?php
    include("connection.php");
    session_start();
    $name=$_REQUEST['txtuname'];
    $pass=$_REQUEST['txtpwd'];
    $pwd=base64_encode($pass);
    $query="SELECT * FROM studentmst WHERE Username='$name' AND Pwd='$pwd' ";
    $data=mysqli_query($cnn,$query);
    $row=mysqli_num_rows($data);
    $ans=mysqli_fetch_array($data);
    $id=$ans[0];
    if($row>0)
    {
            $_SESSION['stud_id']=$id;
            $status="Online";
            $que="UPDATE Studentmst set Status='$status' where Studentid=$id";
            $tmp=mysqli_query($cnn,$que);
            header("location:studentprofile.php");
    }
    else
    {
            $_SESSION['message']="<b>Login Failure ..Please try again..</b>";
                    echo "<script type=\"text/javascript\">
                    window.location = \"studentlogin.php?isErr=true\"
                    </script>";
    }
?>