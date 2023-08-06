<?php
    require_once("session.php");
    require_once("header.php");
?>

<script src="js/jquery/jquery-2.2.4.min.js"></script>
<script>
	$(document).ready(function(){
		$("#div3").hide();
		$("#div4").hide();
		$("#div1").click(function(){
			$("#div4").hide();
			$("#div3").show();
		});
		$("#div2").click(function(){
			$("#div3").hide();
			$("#div4").show();
		});
			
	});
</script>
<script type="text/javascript">
    function get_sem()
    {
        var xmlhttp = new XMLHttpRequest();
        var courseid = document.getElementById('course').value;
        xmlhttp.open("GET","dropdown.php?cid=" + courseid,false);
        xmlhttp.send(null);
        document.getElementById('semester').innerHTML=xmlhttp.responseText;
    }
    function get_sem1()
    {
        var xmlhttp = new XMLHttpRequest();
        var courseid = document.getElementById('course').value;
        xmlhttp.open("GET","dropdown1.php?cid=" + courseid,false);
        xmlhttp.send(null);
        document.getElementById('semester1').innerHTML=xmlhttp.responseText;
    }
    function get_sem2()
    {
        var xmlhttp = new XMLHttpRequest();
        var courseid = document.getElementById('course').value;
        xmlhttp.open("GET","dropdown1.php?cid1=" + courseid,false);
        xmlhttp.send(null);
        document.getElementById('semester2').innerHTML=xmlhttp.responseText;
    }
</script>
<section class="register-now section-padding-100-0 d-flex justify-content-between align-items-center" style="background-image: url(img/core-img/texture.png);">
        <!-- Register Contact Form -->
        <div class="register-contact-form mb-100 wow fadeInUp" data-wow-delay="250ms" style="margin-left: 27%;">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6" id="div2">
                            <button class="btn btn-info"><i class="fa fa-eraser" aria-hidden="true"></i>&nbsp;Remove</button>
                    </div>
                    <div class="col-lg-6" id="div1">
                        	<button class="btn btn-info"><i class="fa fa-exchange" aria-hidden="true"></i>&nbsp;Transfer
                        	</button>
                    </div>
                    
                </div>
                <br><br>
                <div class="row" id="div4">
                    <div class="col-12">
                        <div class="forms">
                            <div class="col-12">
                            <?php

                                if(isset($_GET['err1'])){
                                ?>
                                    <div class="alert alert-info" role="alert">
                                        <?php echo "Record remove successfully";  ?>
                                    </div>
                                <?php
                                    }
                                ?>
                                <?php
                                if(isset($_GET['iserr1'])){
                                ?>
                                <div class="alert alert-danger" role="alert">
                                    <?php echo "Record not remove";  ?>
                                </div>
                                <?php
                              }
                            ?>
                            </div>
                            <h4 class="text-primary">Remove Data</h4>
                            <form method="post" autocomplete="off">
                                <div class="row">
                                    <div class="col-12 col-lg-6">
                                      <div class="form-group">
                                        <label><b>Course</b></label>
                                        <select name="cou" class="form-control text-info" id="course" onchange="get_sem();">
                                                <option>Select Course</option>
                                                <?php
                                                    $query="select * from coursemst";
                                                    $res=mysqli_query($cnn,$query);
                                                    while($ans=mysqli_fetch_array($res))
                                                    {
                                                        
                                                            echo "<option value=".$ans['Courseid'].">".$ans['Coursename']."</option>";
                                                    
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <div class="form-group">
                                            <label><b>Semester</b></label>
                                            <select  id="semester" name='sem' class="form-control text-info" >
                                                    <option>Select Semester</option>
                                                
                                            </select>
                                            </div>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn clever-btn w-100" name="delete">Remove</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    
                </div><br>
                <div class="row" id="div3">
                    <div class="col-12">
                        <div class="col-12">
                             <?php
                                if(isset($_GET['err2'])){
                                ?>
                                    <div class="alert alert-info" role="alert">
                                        <?php echo "Record transfer successfully";  ?>
                                    </div>
                                <?php
                                    }
                                ?>
                            <?php
                              if(isset($_GET['iserr2'])){
                                ?>
                                <div class="alert alert-danger" role="alert">
                                    <?php echo "Record not transfer";  ?>
                                </div>
                                <?php
                              }
                            ?>
                            </div>
                        <div class="forms">
                            <h4 class="text-primary">Transfer Data</h4>
                            <form method="post" autocomplete="off">
                                <div class="row">
                                    <div class="col-12">
                                      <div class="form-group">
                                        <label><b>Course</b></label>
                                        <select name="txtcou" class="form-control text-info" id="course" onchange="get_sem1(); onchange=get_sem2();">
                                                <option>Select Course</option>
                                                <?php
                                                    $query="select * from coursemst";
                                                    $res=mysqli_query($cnn,$query);
                                                    while($ans=mysqli_fetch_array($res))
                                                    {
                                                        
                                                            echo "<option value=".$ans['Courseid'].">".$ans['Coursename']."</option>";
                                                    
                                                    }
                                                ?>
                                            </select>
                                      </div>
                                    </div>
                                	<div class="col-12 col-lg-6">
                                        <div class="form-group">
                                            <label><b>To</b></label>
                                            <select  id="semester1" name='txtto' class="form-control text-info">
                                                    <option>Select Semester</option>
                                                
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <div class="form-group">
                                            <label><b>From</b></label>
                                            <select  id="semester2" name='txtfrom' class="form-control text-info">
                                                    <option>Select Semester</option>
                                                
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn clever-btn w-100" name="transfer">Transfer</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <br>

        </div>
    </div>
</section>
    
<?php
	require_once("../Layout/footer.php");
?>
