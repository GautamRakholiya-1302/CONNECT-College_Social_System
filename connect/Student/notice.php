<?php
    require_once('session.php');
    include("connection.php"); 
    require_once("header.php");
?>
<section class="register-now section-padding-100-0 d-flex justify-content-between align-items-center" style="background-image: url(img/core-img/texture.png);">
    <div class="container">
          <div class="row" style="background-color: white;margin-bottom: 30px;"><h3  class="text-primary" style="margin-top: 10px;margin-left: 20px;">Notice</h3>
            <div class="col-12">

                    <table class="table table-hover"  style="background-color: white;">
                            <thead >
                                <tr>
                                    <th width="5%">Date</th>
                                    <th width="5%">Notice</th>
                                </tr>
                            </thead>
                            <tbody id="myTable">
                           <?php
                                
                                        $sid=$_SESSION['stud_id'];
                                        $q="SELECT * from studentmst where Studentid=$sid";
                                        $res=mysqli_query($cnn,$q);
                                        $ans=mysqli_fetch_array($res);
                                        $cou=$ans['Courseid'];
                                        $sem=$ans['Semesterid'];

                                        $q1="SELECT * from noticemst where Courseid=$cou and Semesterid=$sem";
                                        //echo $q1;
                                        $res1=mysqli_query($cnn, $q1);
                                        while($ans1=mysqli_fetch_array($res1))
                                        {
                                            $dt=$ans1['Date'];
                                            $des=$ans1['Description'];
                                             if($ans1['Date'] >= Date('Y-m-d'))
                                             {

                                                echo "<tr>";
                                                echo "<td>".$dt."</td>";
                                                echo "<td>".$des."</td>";
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
