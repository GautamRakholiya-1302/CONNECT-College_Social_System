<?php
   	require_once('session.php');
  	include("connection.php"); 
  	require_once("header.php");
?>
<?php
      if(isset($_REQUEST['save']))
      {
          $old=$_REQUEST['txtold'];
          $new=$_REQUEST['txtnew'];
          $rep=$_REQUEST['txtrep'];                                       

          $id=$_SESSION['user_id'];
          $query="SELECT Pwd from teachermst where Teacherid=$id";
          $res=mysqli_query($cnn,$query);
          $ans=mysqli_fetch_array($res);
          $pass=$ans['Pwd'];
          $pswd=base64_decode($pass);
        
          if($pswd==$old)
          {
              if($new==$rep)
              {
                  $pw=base64_encode($new);
                  $query="UPDATE teachermst set Pwd='$pw' where Teacherid=$id";
                  $res=mysqli_query($cnn,$query);
                  $_SESSION['message']="<b>Password Change Successfully</b>";
                  echo "<script type=\"text/javascript\">
                  window.location = \"changepassword.php?Err=true\"
                  </script>";
             }
             else
             {
                  $_SESSION['message']="<b>New Password and Repeat Password not match</b>";
                  echo "<script type=\"text/javascript\">
                  window.location = \"changepassword.php?isErr=true\"
                  </script>";
              }
          }
          else
          {
                  $_SESSION['message']="<b>Old Password is Incorrect</b>";
                  echo "<script type=\"text/javascript\">
                  window.location = \"changepassword.php?isErr=true\"
                  </script>";
          }
        }
?>
<section class="register-now section-padding-100 d-flex justify-content-between align-items-center" style="background-image: url(img/core-img/texture.png);">

  <div class="container-fluid">
      <div class="row" style="margin-left: 27%;width: 700px; background-color: white;box-shadow: 5px 10px 8px #888888;">
        <div class="col-12" style="margin-top: 5px;">
          <?php
            if(isset($_REQUEST['Err'])){
              ?>
              <div class="alert alert-info" role="alert">
                  <?php echo $_SESSION['message'];  ?>
              </div>
              <?php
            }
          ?>
          <?php
            if(isset($_REQUEST['isErr'])){
              ?>
              <div class="alert alert-dangers" role="alert">
                  <?php echo $_SESSION['message'];  ?>
              </div>
              <?php
            }
          ?>
          </div>
        <div class="col-12" style="margin-left: 20px;">
          
          <h3 class="text-primary">Change Password </h3><br><br>
            <form  method="post" id="fm" name="fm" autocomplete="off">
              <div class="row">
                  <div class="col-10">
                      <label><b>Old Password </b></label>
                          <div class="form-group">
                              <input type="password" class="form-control text-info" name="txtold" id="txtold" >
                          </div>
                  </div>
                  <div class="col-2"><i id="icon1" class="fa fa-eye-slash" style="font-size:20px;margin-top: 35px;" onclick="myFunction()"></i></div>
              </div>
                  <script>
                        function myFunction() {
                          var x = document.getElementById("txtold");
                          var y = $("#icon1").attr('class');
                          // alert(y);
                          if(y == "fa fa-eye-slash")
                          {
                            $("#icon1").attr('class','fa fa-eye');
                          }
                          else
                          {
                            $("#icon1").attr('class','fa fa-eye-slash');
                          }

                          if (x.type === "password") {
                            x.type = "text";
                          } else {
                            x.type = "password";
                          }
                        }
                  </script>
              <div class="row">
                  <div class="col-10">
                      <label><b>New Password </b></label>
                          <div class="form-group">
                              <input type="Password" class="form-control text-info" name="txtnew" id="txtnew" >
                          </div>
                  </div>
                  <div class="col-2"><i id="icon2" class="fa fa-eye-slash" style="font-size:20px;margin-top: 35px;" onclick="myFunction1()"></i></div>
              </div>
                  <script>
                        function myFunction1() {
                          var x = document.getElementById("txtnew");
                          var y = $("#icon2").attr('class');
                          // alert(y);
                          if(y == "fa fa-eye-slash")
                          {
                            $("#icon2").attr('class','fa fa-eye');
                          }
                          else
                          {
                            $("#icon2").attr('class','fa fa-eye-slash');
                          }

                          if (x.type === "password") {
                            x.type = "text";
                          } else {
                            x.type = "password";
                          }
                        }
                  </script>
              <div class="row">
                  <div class="col-10">
                      <label><b>Repeat Password </b></label>
                          <div class="form-group">
                              <input type="Password" class="form-control text-info" name="txtrep" id="txtrep" >
                          </div>
                  </div>
              </div>
              <div class="row">
                  <div class="col-11" style="margin-bottom: 5px;">
                      <input type="submit" class="btn clever-btn w-100" name="save"  value="SAVE"> 
                  </div>
              </div>
            </form>
        </div>
    </div>
  </div>
</section>
<?php
    require_once("../Layout/footer.php");
?>
