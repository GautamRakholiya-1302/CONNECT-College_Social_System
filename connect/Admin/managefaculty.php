<?php
    session_start();
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
            <th>Name</th>
            <th>Email</th>
            <th>Gender</th>
            <th>DOB</th>
            <th>DOJ</th>
            <th>Phone</th>
            <th>Qualification</th>
            <th>Department</th>
            <th>Action</th>
            </tr>
        </thead>
        
        <tbody id="myTable">
            <?php
                $query="SELECT * from teachermst where Facultystatus!='left' ";
                $res=mysqli_query($cnn,$query);
                while($ans=mysqli_fetch_array($res))
                { 
                   
                    echo "<tr>";
                    echo "<td>".$ans['Name']."</td>";
                    echo "<td>".$ans['Email']."</td>";
                    echo "<td>".$ans['Gender']."</td>";
                    echo "<td>".date('d-m-Y',strtotime($ans['Dob']))."</td>";
                    echo "<td>".date('d-m-Y',strtotime($ans['Doj']))."</td>";
                    echo "<td>".$ans['Contact']."</td>";
                    echo "<td>".$ans['Qualification']."</td>";
                    $cou=$ans['Department'];
                    $query1="select Coursename from coursemst where Courseid=$cou";
                    $r=mysqli_query($cnn,$query1);
                    $a=mysqli_fetch_array($r);
                    echo "<td>".$a['Coursename']."</td>";
                    echo "<td><a href=deletefaculty.php?id=".$ans[0]."  onclick=\"javascript:return confirm('Are you sure you want to remove ".$ans['Name']." ?');\"><i style='font-size:25px' class='fa fa-trash'></i></a></td>";
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
