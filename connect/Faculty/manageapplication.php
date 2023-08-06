<?php
    require_once("session.php");
    require_once("header.php");
    
?>
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.1/css/responsive.dataTables.min.css">

<div class="container">
    <div class="col-12">
    <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
            <th>Enrollmentno</th>
            <th>StudentName</th>
            <th>To Date</th>
            <th>From Date</th>
            
            <th>Description</th>
            <th>Status</th>
            <th>Approve</th>
            <th>Declined</th>
            </tr>
        </thead>
        
        <tbody id="myTable">
            <?php
                 $id=$_SESSION['user_id'];
                
                $query="SELECT * from leaveapplicationmst where Teacherid=$id";
                $res=mysqli_query($cnn,$query);
                while($ans=mysqli_fetch_array($res))
                { 
                    $sid=$ans['Studentid'];
                     $q="SELECT * from studentmst where Studentid=$sid";
                     $r=mysqli_query($cnn,$q);
                     $a=mysqli_fetch_array($r);
                     $rollno=$a['Enrollmentno'];
                     $name=$a['Middlename'];
                    echo "<tr>";
                    echo "<td>".$rollno."</td>";
                    echo "<td>".$name."</td>";
                    echo "<td>".date('d-m-Y',strtotime($ans['Todate']))."</td>";
                    echo "<td>".date('d-m-Y',strtotime($ans['Fromdate']))."</td>";
                   
                    echo "<td>".$ans['Description']."</td>";
                    if($ans['Approvedstatus']=='Approved')
                    {
                        echo "<td><i class=\"fa fa-circle\" style=\"font-size:15px;color:#33cc33\"></i>&nbsp;Approved</td>";
                    }
                    elseif ($ans['Approvedstatus']=='Rejected') 
                    {
                        echo "<td><i class=\"fa fa-circle\" style=\"font-size:15px;color:#ff3333\"></i>&nbsp;Rejected</td>";
                    }
                    else
                    {
                        echo "<td><i class=\"fa fa-circle\" style=\"font-size:15px;color:#33ccff\"></i>&nbsp;On Process</td>";
                    }
                    echo "<td><a href=\"leaveapprove.php?id=".$ans['Applicationid']."\" class=\"btn btn-success active w-100\" role=\"button\" aria-pressed=\"true\"><b>Approve</b></a></td>";
                    echo "<td><a href=\"leavedeclined.php?id=".$ans['Applicationid']."\" class=\"btn btn-danger \" role=\"button\" name=\"btndeclined\"><b>Declined</b></a></td>";
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
</body>
</html>