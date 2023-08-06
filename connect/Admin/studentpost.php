<?php
    require_once("session.php");
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
            <div class="col-12">
                    <table class="table table-hover" style="background-color: white;">
                            <thead>
                                <tr>
                                    <th width="5%">Photo</th>
                                    <th width="5%">Name</th>
                                    <th width="10%">Description</th>
                                    <th width="3%">Status</th>
                                    <th width="1%">View</th>
                                    
                                </tr>
                            </thead>
                            <tbody id="myTable">
                            <?php
                                    $query="SELECT * from postmst  where Studentid!='NULL' and Postimg!='NULL' ";
                                    $res=mysqli_query($cnn,$query);
                                    while($ans=mysqli_fetch_array($res))
                                    {
                                            $postid=$ans['Postid'];
                                            $img=$ans['Postimg'];
                                            $sid=$ans['Studentid'];
                                            $que="select Middlename from  studentmst where Studentid=$sid";
                                            $data=mysqli_query($cnn,$que);
                                            $row=mysqli_fetch_array($data);
                                            $name=$row['Middlename'];
                                            echo "<tr>";
                                            echo "<td><img src=\"../img/post/photo/".$img."\" height=100 width=100></td>";
                                            echo "<td>".$name."</td>";
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
                                        echo "<td><a href=\"imagepost.php?id=".$postid."\"  aria-pressed=\"true\"><i class=\"fa fa-eye\" style=\"font-size:20px;color:blue;\"></i></a></td>";
                                    }
                            ?>
                            </tbody>
                    </table>
            </div>
            <div class="col-12">
            <table class="table table-hover" style="background-color: white;">
                    <thead>
                        <tr>
                            <th width="6%">Video</th>
                            <th width="3%">Name</th>
                            <th width="3%">Description</th>
                            <th width="2%">Status</th>
                            <th width="1%">View</th>

                        </tr>
                    </thead>
                    <tbody id="myTable">
                    <?php
                            $query="select * from postmst  where Studentid!='NULL' and Postvideo!='NULL' ";
                            $res=mysqli_query($cnn,$query);
                            while($ans=mysqli_fetch_array($res))
                            {
                                    $postid=$ans['Postid'];
                                    $video=$ans['Postvideo'];
                                    $tid=$ans['Teacherid'];
                                    $que="select Middlename from  studentmst where Studentid=$sid";
                                    $data=mysqli_query($cnn,$que);
                                    $row=mysqli_fetch_array($data);
                                    $name=$row['Middlename'];
                                    echo "<tr>";
                                    echo "<td>".$video."</td>";
                                    echo "<td>".$name."</td>";
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
                                        echo "<td><a href=\"videopost.php?id=".$postid."\"  aria-pressed=\"true\"><i class=\"fa fa-eye\" style=\"font-size:20px;color:blue;\"></i></a></td>";
                            }
                    ?>
                    </tbody>
            </table>
         </div>
         <div class="col-12">
            <table class="table table-hover" style="background-color: white;">
                    <thead>
                        <tr>
                            <th width="5%">Audio</th>
                            <th width="3%">Name</th>
                            <th width="3%">Description</th>
                            <th width="2%">Status</th>
                            <th width="1%">View</th>
                        </tr>
                    </thead>
                    <tbody id="myTable">
                    <?php
                            $query="select * from postmst  where Studentid!='NULL' and Postaudio!='NULL' ";
                            $res=mysqli_query($cnn,$query);
                            while($ans=mysqli_fetch_array($res))
                            {
                                    $postid=$ans['Postid'];
                                    $audio=$ans['Postaudio'];
                                    $sid=$ans['Studentid'];
                                    $que="SELECT Middlename from studentmst where Studentid=$sid";
                                    $data=mysqli_query($cnn,$que);
                                    $row=mysqli_fetch_array($data);
                                    $name=$row['Middlename'];
                                    echo "<tr>";
                                    echo "<td>".$audio."</td>";
                                    echo "<td>".$name."</td>";
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
                                    echo "<td><a href=\"audiopost.php?id=".$postid."\"  aria-pressed=\"true\"><i class=\"fa fa-eye\" style=\"font-size:20px;color:blue;\"></i></a></td>";
                            }
                    ?>
                    </tbody>
            </table>
         </div>
    </div>
</section>
<?php
    require_once("../Layout/footer.php");
?>
