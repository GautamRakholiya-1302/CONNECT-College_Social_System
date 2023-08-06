<?php
    include("connection.php");
    session_start();
    $name=$_REQUEST['txtname'];
    $pass=$_REQUEST['txtpwd'];
    $pwd=base64_encode($pass);
        $query="SELECT * FROM teachermst WHERE Username='$name' AND Pwd='$pwd' and Facultystatus='0' ";
        $data=mysqli_query($cnn,$query);
        $row=mysqli_num_rows($data);
        $ans=mysqli_fetch_array($data);
        $id=$ans[0];
        if($row>0)
        {
            $_SESSION['user_id']=$id;
            $status="Online";
            $que="UPDATE teachermst set Status='$status' WHERE Teacherid=$id";
            $tmp=mysqli_query($cnn,$que);
            header("location:facultyprofile.php");
        }
        else
        {
            $_SESSION['message']="<b>Login Failure ..Please try again..</b>";
                    echo "<script type=\"text/javascript\">
                    window.location = \"facultylogin.php?isErr=true\"
                    </script>";
        }
?>
       