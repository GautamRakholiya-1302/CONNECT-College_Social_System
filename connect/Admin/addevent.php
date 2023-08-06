<?php
    require_once("session.php");
    require_once("header.php");
?>
<?php
        if(isset($_REQUEST['btnadd']))
        {
            $query="select max(Eventid) from eventmst";
            $res=mysqli_query($cnn,$query);
            $ans=mysqli_fetch_array($res);
            $id=$ans[0]+1;
            $name=$_REQUEST['txtname'];
            $date=$_REQUEST['txtdate'];
            $des=$_REQUEST['txtdes'];
            $img =$_FILES['txtimg']['name'];
            $tempname=$_FILES['txtimg']['tmp_name'];
            
            
            $type=$_FILES['txtimg']['type'];
            $ext=explode("/",$type);
            $img=$id.".".$ext[1];
            $date=date('Y-m-d',strtotime($date));
            if($date <= date('Y-m-d'))
            {
                    echo "<script type=\"text/javascript\">
                    window.location = \"addevent.php?err=true\"
                    </script>";
            }
            else
            {
                    $query="insert into eventmst values($id,'$name','$img','$date','$des')";
                    $cnt=mysqli_query($cnn,$query);
                    if($cnt>0)
                    {
                            move_uploaded_file($tempname,"../img/event/".$img);
                            echo "<script type=\"text/javascript\">
                            window.location = \"addevent.php?msg=true\"
                            </script>";
                    }
                    else
                    {
                        echo "<script type=\"text/javascript\">
                         window.location = \"addevent.php\"
                         </script>";
                    }    
            }                
        } 
    ?>
<section class="register-now section-padding-100-0 d-flex justify-content-between align-items-center" style="background-image: url(img/core-img/texture.png);">
        <!-- Register Contact Form -->
        <div class="register-contact-form mb-100 wow fadeInUp" data-wow-delay="250ms" style="margin-left: 27%";>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                    <?php
                      if(isset($_GET['err'])){
                        ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo "Please choose future date";  ?>
                        </div>
                        <?php
                      }
                    ?>
                    <?php
                      if(isset($_GET['msg'])){
                        ?>
                        <div class="alert alert-info" role="alert">
                            <?php echo "Record insert successfully";  ?>
                        </div>
                        <?php
                      }
                    ?>
                  </div>
                    <div class="col-12">
                        <div class="forms">
                            <h4 class="text-primary">Add Events</h4>
                             <form  method="post" autocomplete="off" enctype="multipart/form-data">
                                    <div class="col-12 ">
                                        <label><b>Name</b></label>
                                        <div class="form-group">
                                        <input type="text" class="form-control text-info" name="txtname" id="txtname">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label><b>Profile Picture</b></label>
                                            <input type="file" class="form-control text-info" name="txtimg">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label><b>Date</b></label>
                                            <input type="date" class="form-control text-info" name="txtdate">
                                        </div>
                                    </div>
                                    <div class="col-12 ">
                                        <label><b>Description</b></label>
                                        <div class="form-group">
                                        <input type="text" class="form-control text-info" name="txtdes" id="txtdes" style="font-size: 13px;">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn clever-btn w-100" name="btnadd">Add</button>
                                    </div>
                                </div>
                            </form>
                         </div>
                    </div>
                </div>
            </div>
        </div>
</section>
    
<?php
    require_once("../Layout/footer.php");
?>