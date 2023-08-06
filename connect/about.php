<?php
        require_once("header.php");
?>

    <section>
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-5 col-md-6 about-left">
                    <img class="img-fluid" src="img/core-img/about.jpg" style="width: 450px;height: 400px;" alt="">
                </div>
                <div class="offset-lg-1 col-lg-6 offset-md-0 col-md-12 about-right">
                    <h1>
                        Educature <br> Solid Outcome
                    </h1>
                    <div class="wow fadeIn" data-wow-duration="1s">
                        <p>
                            An investment in knowledge pays the best interest. Education is the key to success in life, and teachers make a lasting impact in the lives of their students. ... The function of education is to teach one to think intensively and to think critically. Intelligence plus character - that is the goal of true education.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <br><br>
    <!-- ##### Top Teacher Area Start ##### -->
    <section class="top-teacher-area section-padding-0-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading">
                        <h3>Top Teachers in Every Field</h3>
                    </div>
                </div>
            </div>

            <div class="row">
                <?php
                                $query="select * from teachermst";
                                $res=mysqli_query($cnn,$query);
                                while($ans=mysqli_fetch_array($res))
                                {
                                    $name=$ans['Name'];
                                    $img=$ans['Profile'];
                                ?>

                <!-- Single Teacher -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="single-instructor d-flex align-items-center mb-30">
                        
                        <div class="instructor-thumb">
                            <img src="img/profile/faculty/<?php echo $img; ?>" onerror="this.onerror=null;this.src='img/noimageprev.png';" style="width: 80px;height: 80px;" alt="">
                        </div>
                        <div class="instructor-info">
                            <h5><?php echo $name; ?></h5>
                            <span>Teacher</span><br>
                            <?php
                                if($ans['Facultystatus']=='left')
                                {
                            ?>
                            <span><font color="red">LEFT</font></span>
                            <?php
                                }
                            ?>
                        </div>
                    </div>
                </div>
                <?php
                        }
                ?>

                </div>
        </div>
    </section>
<?php
   require_once("Layout/footer.php");
?>