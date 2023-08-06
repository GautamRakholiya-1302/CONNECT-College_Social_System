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
                                     <th width="5%">Semester</th>
                                    <th width="5%">Date</th>
                                    <th width="5%">Notice</th>
                                </tr>
                            </thead>
                            <tbody id="myTable">
                           <?php
                                
                                        $tid=$_SESSION['user_id'];
                                        $q="SELECT * from teachermst where Teacherid=$tid";
                                        $res=mysqli_query($cnn,$q);
                                        $ans=mysqli_fetch_array($res);
                                        $cou=$ans['Department'];
                                        
                                        $q1="SELECT * from noticemst where Courseid=$cou";
                                        $res1=mysqli_query($cnn, $q1);
                                        while($ans1=mysqli_fetch_array($res1))
                                        {
                                            $sm=$ans1['Semesterid'];
                                            $q1="SELECT * from semestermst where Semesterid=$sm";
                                            $r=mysqli_query($cnn,$q1);
                                            $a=mysqli_fetch_array($r);
                                            $dt=Date('d-m-Y',strtotime($ans1['Date']));
                                            $des=$ans1['Description'];
                                            if($ans1['Date'] >= Date('Y-m-d'))
                                            {

                                                echo "<tr>";
                                                echo "<td>".$a['Semestername']."</td>";
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
