<?php
        require_once("header.php");
?> 
<style>
#div1:hover {
  animation: shake 0.5s;
  animation-iteration-count: infinite;
}

@keyframes shake {
  0% { transform: translate(1px, 1px) rotate(0deg); }
  10% { transform: translate(-1px, -2px) rotate(-1deg); }
  20% { transform: translate(-3px, 0px) rotate(1deg); }
  30% { transform: translate(3px, 2px) rotate(0deg); }
  40% { transform: translate(1px, -1px) rotate(1deg); }
  50% { transform: translate(-1px, 2px) rotate(-1deg); }
  60% { transform: translate(-3px, 1px) rotate(0deg); }
  70% { transform: translate(3px, 1px) rotate(-1deg); }
  80% { transform: translate(-1px, -1px) rotate(1deg); }
  90% { transform: translate(1px, 2px) rotate(0deg); }
  100% { transform: translate(1px, -2px) rotate(-1deg); }
}
</style>  
    <section class="hero-area bg-img bg-overlay-2by5" style="background-image: url(img/bg-img/bg1.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <!-- Hero Content -->
                    <div class="hero-content text-center">
                        <h2>Let's Study Together</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
   
<?php
    $query="SELECT * from postmst";
    $cnt=mysqli_query($cnn,$query);
    $postcnt=mysqli_num_rows($cnt);

    $query="SELECT * from teachermst where Facultystatus!='left' ";
    $cnt=mysqli_query($cnn,$query);
    $teachercnt=mysqli_num_rows($cnt);

    $query="SELECT * from eventmst";
    $cnt=mysqli_query($cnn,$query);
    $eventcnt=mysqli_num_rows($cnt);

    $query="SELECT *  from studentmst";
    $cnt=mysqli_query($cnn,$query);
    $studentcnt=mysqli_num_rows($cnt);
?>

    <!-- ##### Cool Facts Area Start ##### -->
     <section class="cool-facts-area section-padding-100-0">
        <div class="container">
            <div class="row">
                <!-- Single Cool Facts Area -->
                 <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-cool-facts-area text-center mb-100 wow fadeInUp" data-wow-delay="250ms">
                        <div class="icon">
                            <img src="img/core-img/docs.png" alt="">
                        </div>
                        <h2><span class="counter"><?php echo $postcnt; ?></span></h2>
                        <h5>Posts</h5>
                    </div>
                </div>

                <!-- Single Cool Facts Area -->
             <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-cool-facts-area text-center mb-100 wow fadeInUp" data-wow-delay="500ms">
                        <div class="icon">
                            <img src="img/core-img/star.png" alt="">
                        </div>
                        <h2><span class="counter"><?php echo $teachercnt; ?></span></h2>
                        <h5>Tutors</h5>
                    </div>
                </div>

                <!-- Single Cool Facts Area -->
                 <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-cool-facts-area text-center mb-100 wow fadeInUp" data-wow-delay="750ms">
                        <div class="icon">
                            <img src="img/core-img/events.png" alt="">
                        </div>
                        <h2><span class="counter"><?php echo $eventcnt; ?></span></h2>
                        <h5>Events</h5>
                    </div>
                </div>

                <!-- Single Cool Facts Area -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-cool-facts-area text-center mb-100 wow fadeInUp" data-wow-delay="1000ms">
                        <div class="icon">
                            <img src="img/core-img/earth.png" alt="">
                        </div>
                        <h2><span class="counter"><?php echo $studentcnt; ?></span></h2>
                        <h5>Students</h5>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="popular-courses-area section-padding-50-0" style="background-image: url(img/core-img/texture.png);">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading">
                        <h2>Courses</h2>
                    </div>
                </div>
            </div>
            <div class="row"> 
                <!-- Single Popular Course -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="single-popular-course mb-100 wow fadeInUp" data-wow-delay="250ms">
                        <img src="img/bg-img/education.jpg" alt="#">
                        <!-- Course Content -->
                         <div class="course-content">
                            <h4>Bachelor of Computer Applications</h4>
                        </div> 
                    </div>
                </div>
 
                <!-- Single Popular Course -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="single-popular-course mb-100 wow fadeInUp" data-wow-delay="500ms">
                        <img src="img/bg-img/study.jpg" alt="">
                        <!-- Course Content -->
                        <div class="course-content">
                            <h4>Bachelor of Business Administration</h4>
                       </div>
                    </div>
              </div>

                <!-- Single Popular Course -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="single-popular-course mb-100 wow fadeInUp" data-wow-delay="750ms">
                        <img src="img/bg-img/learn2.jpg" alt="">
                        <!-- Course Content -->
                        <div class="course-content">
                            <h4>Master of Science in Information Technology</h4>
                        </div>
                    </div>
                </div>
        </div>
    </section>
    <!-- ##### Popular Courses End ##### -->

    <!-- ##### Best Tutors Start ##### -->
    <section class="best-tutors-area section-padding-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading">
                        <h3>The Best Tutors </h3>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="tutors-slide owl-carousel wow fadeInUp" data-wow-delay="250ms">
                            <?php
                                $query="SELECT * from teachermst";
                                $res=mysqli_query($cnn,$query);
                                while($ans=mysqli_fetch_array($res))
                                {
                                    $name=$ans['Name'];
                                    $img=$ans['Profile'];
                                    $qul=$ans['Qualification'];
                                    $dept=$ans['Department'];
                                    $q="SELECT Coursename from coursemst where Courseid=$dept";
                                    $r=mysqli_query($cnn,$q);
                                    $a=mysqli_fetch_array($r);
                                    $cname=$a['Coursename'];
                            ?>
                        <!-- Single Tutors Slide -->
                        <div class="single-tutors-slides">
                            <!-- Tutor Thumbnail -->
                            <div class="tutor-thumbnail">
                                <img src="img/profile/faculty/<?php echo $img; ?>" onerror="this.onerror=null;this.src='img/noimageprev.png';" >
                            </div>
                            <!-- Tutor Information -->
                            <div class="tutor-information text-center">
                                <h5><?php echo $name; ?></h5>
                                <span>Teacher</span>
                                <p>Qualification&nbsp;: <?php echo $qul; ?><br>
                                    Depeartment&nbsp;: <?php echo $cname; ?><br>
                                <?php
                                if($ans['Facultystatus']=='left')
                                {
                                ?>
                                    <font color="red">LEFT</font><br>
                                <?php
                                    }
                                ?>
                                </p>
                            </div>
                        </div>
                            <?php 
                                }
                            ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- ##### Upcoming Events Start ##### -->
    <section class="upcoming-events section-padding-100-0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading">
                        <h3>Upcoming Events</h3>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Single Upcoming Events -->
                <?php
                $dt=Date('Y-m-d');
                $query="SELECT * from eventmst where Date>='$dt' order by Date limit 3";
                 //echo $query;
                 $res=mysqli_query($cnn,$query);
                while($ans=mysqli_fetch_array($res))
                {
                    $img=$ans['Eventpic'];
                    //echo $img;
                    $date=date('F d,Y',strtotime($ans['Date']));
                   
                echo  "<div id=\"div1\" class=\"col-12 col-md-6 col-lg-4\">";
                echo   "<div class=\"single-upcoming-events mb-50 wow fadeInUp\" data-wow-delay=\"250ms\">";
                        // <!-- Events Thumb -->
                       echo "<div class=\"events-thumb\">";
                            echo "<td><img src=\"img/event/".$img."\"></td>";
                            echo "<h6 class=\"event-date\">$date</h6>";
                            echo "<h4 class=\"event-title\">".$ans['Eventname']."</h4>";
                        echo "</div>";
                        // <!-- Date & Fee -->
                        echo "<div class=\"date-fee d-flex justify-content-between\">";
                            echo "<div class=\"date\">";
                               echo  "<p><i class=\"fa fa-clock\"></i>".$ans['Description']."</p>";
                            echo "</div>";
                        echo "</div>";
                    echo "</div>";
                echo "</div>";
                    
                }
              ?>
            
            </div>
        </div>
    </section>
<?php
   require_once("Layout/footer.php");
?>