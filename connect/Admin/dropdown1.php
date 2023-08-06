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
            echo "<select id='semester1' name='txtto' class='form-control text-info'>";
            echo "<option>Select Semester</option>";
            while($row=mysqli_fetch_array($res))
            {
                echo "<option  value=".$row['Semesterid'].">".$row['Semestername']."</option>";
            }
            echo "</select>";
        }
   }

if(isset($_GET['cid1']))
   {
        $cou1=$_GET['cid1'];
        if($cou1 !="")
        {
            $query="SELECT * from semestermst where Courseid=$cou1";
            //echo $query;
            $res=mysqli_query($cnn,$query);
            echo "<select id='semester2' name='txtfrom' class='form-control text-info' >";
            echo "<option>Select Semester</option>";
            while($row=mysqli_fetch_array($res))
            {
                echo "<option  value=".$row['Semesterid'].">".$row['Semestername']."</option>";
            }
            echo "</select>";
        }
   }
?>
