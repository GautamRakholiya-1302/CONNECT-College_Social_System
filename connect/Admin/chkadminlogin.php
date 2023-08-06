<?php
  include("connection.php");
  session_start(); 
  $name=$_POST['txtname'];
  $pwd=$_POST['txtpwd'];
  
  $query="SELECT count(*) from adminmst where Adminname='$name' and Adminpwd='$pwd' ";
  $cnt=mysqli_query($cnn,$query);
  $c=mysqli_fetch_array($cnt);
  
  if($c[0] > 0)
  {
    $_SESSION['Adminname']=$name;
    //echo $_SESSION['Adminname'];
   header("location:adminhome.php");
  }
  else
  {
    header("location:adminlogin.php");
  }
?>