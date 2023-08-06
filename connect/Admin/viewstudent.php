<?php
    require_once("session.php");
    require_once("header.php");
?>
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.1/css/responsive.dataTables.min.css">

    <div class="container">
     <div class="col-12">
        <?php
              if(isset($_REQUEST['Err'])){
                ?>
                <div class="alert alert-info" role="alert">
                    <?php echo $_SESSION['message'];  ?>
                </div>
                <?php
              }
            ?>
            <table id="example" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th width="3%">EnrollmentNo</th>
                            <th width="3%">Firstname</th>
                            <th width="3%">Middlename</th>
                            <th width="3%">Lastname</th>
                            <th>Email-id</th>
                            <th width="3%">Gender</th>
                            <th>DOB</th>
                            <th width="2%">Course</th>
                            <th width="2%">Semester</th>
                            <th width="2%">Class</th>
                           <th width="2%">Action</th>
                        </tr>
                    </thead>
                    <tbody id="myTable">
                        <?php
                                $query="SELECT * from studentmst";
                                $res=mysqli_query($cnn,$query);
                                // $sid=$_SESSION['stud_id'];
                                while($ans=mysqli_fetch_array($res))
                                {
                                    echo "<tr>";
                                    echo "<td>".$ans['Enrollmentno']."</td>";
                                    echo "<td>".$ans['Firstname']."</td>";
                                    echo "<td>".$ans['Middlename']."</td>";
                                    echo "<td>".$ans['Lastname']."</td>";
                                    echo "<td>".$ans['Email']."</td>";
                                    echo "<td>".$ans['Gender']."</td>";
                                    echo "<td>".$ans['Dob']."</td>";
                                    $cou=$ans['Courseid'];
                                    $res1=mysqli_query($cnn,"SELECT * from coursemst where Courseid=$cou");
                                    $ans1=mysqli_fetch_array($res1);
                                    $couname=$ans1['Coursename'];
                                    echo "<td>".$couname."</td>";

                                    $sem=$ans['Semesterid'];
                                    $res2=mysqli_query($cnn,"SELECT * from semestermst where Semesterid=$sem");
                                    $ans2=mysqli_fetch_array($res2);
                                    $semname=$ans2['Semestername'];
                                    echo "<td>".$semname."</td>";

                                    $class=$ans['Classid'];
                                    $res3=mysqli_query($cnn,"SELECT * from classmst where Classid=$class");
                                    $ans3=mysqli_fetch_array($res3);
                                    $cname=$ans3['Classname'];
                                    echo "<td>".$cname."</td>";

                                    echo "<td><a href=deletestudent.php?id=".$ans['Studentid']."  onclick=\"javascript:return confirm('Are you sure you want to delete?');\"><i style='font-size:25px' class='fa fa-trash'></i></a></td>";
                                    
                                       
                                    echo "</tr>";
                                }
                        ?>
                    </tbody>
            </table>
        </div>
    </div>
       
<?php
    require_once("../Layout/footer.php");
?>   
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<script>
        $(document).ready( function () {
                $('body').fadeIn();

            $('#example')
                .addClass( 'nowrap' )
                .dataTable( {
                    responsive: true,
                    columnDefs: [
                        { targets: [-1, -3], className: 'dt-body-right' }
                    ]
                } );
        } );
</script>