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
<div class="clever-catagory bg-img d-flex align-items-center justify-content-center p-3" style="background-image: url(img/bg-img/event.jpg);">
        <h3>Upcoming Events</h3>
</div>
<section class="upcoming-events section-padding-100-0">
        <div class="container">
            <div class="row">
                <!-- Single Upcoming Events -->
                 <?php
               $dt=Date('Y-m-d');
                $query="SELECT * from eventmst where Date>='$dt' order by Date";
                 //echo $query;
                 $res=mysqli_query($cnn,$query);
                while($ans=mysqli_fetch_array($res))
                {
                    $img=$ans['Eventpic'];
                    // echo $img;
                    $date=date('F d,Y',strtotime($ans['Date']));
                    if($ans['Date'] >= Date('Y-m-d'))
                    {
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
                }
              ?>
            
            </div>
        </div>
    </section>
<?php
	   require_once("Layout/footer.php");
?>