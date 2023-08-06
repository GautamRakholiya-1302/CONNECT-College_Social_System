<?php
   	require_once('session.php');
  	// include("connection.php"); 
  	require_once("header.php");
?>
<style type="text/css">
    th{
        font-size: 18px;
        font-family: Rockwell;
    }
    td{
        font-family: verdana;
    }
</style>
<section class="register-now section-padding-100-0 d-flex justify-content-between align-items-center" style="background-image: url(img/core-img/texture.png);">
    <div class="container">
          <div class="row" style="background-color: white;margin-bottom: 30px;box-shadow: 5px 10px 8px #888888;"><h3  class="text-primary" style="margin-top: 10px;margin-left: 20px;">Material</h3>
            <div class="col-12">
                    <table class="table table-hover"  style="background-color: white;">
                            <thead >
                                <tr>
                                    <th width="5%">Subject name</th>
                                    <th width="5%">File</th>
                                </tr>
                          </thead> 
                            </thead>
                            <tbody id="myTable">
                              <?php
                                        $sid=$_SESSION['stud_id'];
                                        $q2="SELECT * from studentmst where Studentid=$sid";
                                        $res2=mysqli_query($cnn,$q2);
                                        $ans2=mysqli_fetch_array($res2);
                                        $cou2=$ans2['Courseid'];
                                        $sem2=$ans2['Semesterid'];
                                        $q1="SELECT * from materialmst where  Courseid=$cou2 and Semesterid=$sem2";
                                        $res1=mysqli_query($cnn, $q1);
                                        while($ans1=mysqli_fetch_array($res1))
                                        {
                                            $subid=$ans1['Subjectid'];
                                            $que="SELECT * from subjectmst where Subjectid=$subid";
                                            $res=mysqli_query($cnn,$que);
                                            $ans=mysqli_fetch_array($res);
                                            $subnm=$ans['Subjectname'];
                                            $pdf=$ans1['File'];
                                            echo "<tr>";
                                            echo "<td>".$subnm."</td>";
                                            echo "<td><a  target=\"_blank\" href=\"../img/material/".$pdf."\">".$pdf."</a></td>";
                                            echo "</tr>";
                                        }
                                ?>
                            </tbody>
                    </table>
            </div>
          </div>
</div>
</section>
<?php
    require_once("../Layout/footer.php");
?>
