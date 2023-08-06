<?php
   	require_once('session.php');
  	include("connection.php"); 
  	require_once("header.php");
?>
<section class="register-now section-padding-100-0 d-flex justify-content-between align-items-center" style="background-image: url(img/core-img/texture.png);">
    <div class="container">
          <div class="row" style="background-color: white;margin-bottom: 30px;"><h3  class="text-primary" style="margin-top: 10px;margin-left: 20px;">Leave Application</h3>
            <div class="col-12">
                    <table class="table table-hover"  style="background-color: white;">
                            <thead >
                                <tr>
                                    <th width="5%">To Date</th>
                                    <th width="5%">From Date</th>
                                    <th width="5%">Status</th>
                                </tr>
                          </thead> 
                            </thead>
                            <tbody id="myTable">
                                 <?php
                                        $sid=$_SESSION['stud_id'];
                                        $q="SELECT * from leaveapplicationmst where Studentid=$sid";
                                        $res=mysqli_query($cnn, $q);
                                        while($ans=mysqli_fetch_array($res))
                                        {
                                            
                                            $app=$ans['Approvedstatus'];

                                            if($app=="Approved")
                                            {
                                                echo "<tr>";
                                                    echo "<td>".date('d-m-Y',strtotime($ans['Todate']))."</td>";
                                                    echo "<td>".date('d-m-Y',strtotime($ans['Fromdate']))."</td>";
                                                    echo "<td>"."<b><font style=\"color:#006600\">".$app."</font></b></td>"; 
                                                echo "</tr>";
                                            }
                                            else
                                            {
                                                $status="Declined";
                                                echo "<tr>";
                                                    echo "<td>".date('d-m-Y',strtotime($ans['Todate']))."</td>";
                                                    echo "<td>".date('d-m-Y',strtotime($ans['Fromdate']))."</td>";
                                                   echo "<td>"."<b><font style=\"color:#ff0000\">".$status."</font></b></td>"; 
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


