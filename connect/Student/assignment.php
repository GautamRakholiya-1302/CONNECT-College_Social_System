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
          <div class="row" style="background-color: white;margin-bottom: 30px;box-shadow: 5px 10px 8px #888888;"><h3  class="text-primary" style="margin-top: 10px;margin-left: 20px;">Assignment</h3>
            <div class="col-12">

                    <table class="table table-hover"  style="background-color: white;">
                           
                            <thead >

                                <tr>
                                    <th width="5%">Subject name</th>
                                    <th width="5%">Declare date</th>
                                    <th width="5%">Submission date</th>
                                    <th width="5%">File</th>    
                                </tr>
                            </thead>
                            <tbody id="myTable">
                           <?php
                                
                                        $sid=$_SESSION['stud_id'];
                                        $q2="SELECT * from studentmst where Studentid=$sid";
                                        $res=mysqli_query($cnn,$q2);
                                        $ans=mysqli_fetch_array($res);
                                        $cou=$ans['Courseid'];
                                        $sem=$ans['Semesterid'];
                                        $class=$ans['Classid'];

                                        $q1="SELECT * from assignmentmst where Courseid=$cou and Classid=$class and Semesterid=$sem";
                                        $res1=mysqli_query($cnn, $q1);
                                        while($ans1=mysqli_fetch_array($res1))
                                        {


                                            $subid=$ans1['Subjectid'];
                                            $que="SELECT * from subjectmst where Subjectid=$subid";
                                            $res2=mysqli_query($cnn,$que);
                                            $ans2=mysqli_fetch_array($res2);
                                            $subnm=$ans2['Subjectname'];

                                            $dt=date('d-m-Y',strtotime($ans1['Declaredate']));
                                            $sdt=date('d-m-Y',strtotime($ans1['Submissiondate'])); 
                                            $pdf=$ans1['File'];  

                                            if($ans1['Submissiondate'] >= Date('Y-m-d'))
                                            {
                                            echo "<tr>";
                                            echo "<td>".$subnm."</td>";
                                            echo "<td>".$dt."</td>";
                                            echo "<td>".$sdt."</td>";
                                            echo "<td><a  target=\"_blank\" href=\"../img/assignment/".$pdf."\">".$pdf."</a></td>";
                                            echo "</tr>";
                                            }

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
