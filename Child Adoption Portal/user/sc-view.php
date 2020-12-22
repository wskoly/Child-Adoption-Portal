<?php
ini_set('session.cookie_lifetime', '600000');
include "include/database.php";
session_start();
if(!isset($_SESSION['email']))
{
  header('Location: ../login.php');
}

				$id= $_REQUEST['id'];
                $sql="SELECT c.id, c.date, c.status, u.name, u.contact, u.email, u.address, u.lat, u.longitude  FROM consult as c, centers as u WHERE c.id ='$id' AND c.center_id=u.id ;";
                 $result= mysqli_query($connect, $sql)
                 or die("failed to query".mysqli_error());
                 $row = mysqli_fetch_assoc($result);
                 $date=date_create($row['date']);
                 $days= date_format($date,"w");
                 $Day=date_format($date,"d");
                 $Month=date_format($date,"F");
                 $month=date_format($date,"n");
                 $year=date_format($date,"Y");
                 $lat=$row['lat'];
                 $longi=$row['longitude'];
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Appoinment</title>
    <style type="text/css">
    #myMap 
  {
    margin: auto;
    margin-top: 50px;
      width: 50%;
      border: 3px solid green;
      height: 500px;
      width: 980px;
  }
</style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="Free-Template.co" />
    <link rel="shortcut icon" href="ftco-32x32.png">
    
    <link rel="stylesheet" href="csss/custom-bs.css">
    <link rel="stylesheet" href="csss/jquery.fancybox.min.css">
    <link rel="stylesheet" href="csss/bootstrap-select.min.css">
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link rel="stylesheet" href="fonts/line-icons/style.css">
    <link rel="stylesheet" href="csss/owl.carousel.min.css">
    <link rel="stylesheet" href="csss/animate.min.css">
    <link rel="stylesheet" href="css/style.css">
     
     <link rel="stylesheet" type="text/css" href="css/calendar.css">
      <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAn8N_uRmaBoLh3EmfWMPx5UPa1YE4yJ-c"></script>
      <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- MAIN CSS -->
    <link rel="stylesheet" href="csss/style.css">    
  </head>
  <body id="top">

  <div id="overlayer"></div>
  <div class="loader">
    <div class="spinner-border text-primary" role="status">
      <span class="sr-only">Loading...</span>
    </div>
  </div>
    

<div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div> <!-- .site-mobile-menu -->
    

    <!-- NAVBAR -->
    <header class="site-navbar mt-3">
      <div class="container-fluid">
        <div class="row align-items-center">
          <div class="site-logo col-6"><a href="Home.php">Child Adoption Portal</a></div>

          <nav class="mx-auto site-navigation">
            <ul class="site-menu js-clone-nav d-none d-xl-block ml-0 pl-0">
              <li><a href="Home.php">Home</a></li>
              <li><a href="center.php"> Adoption Centers</a></li>
              <li class="has-children">
                <a>Services</a>
                <ul class="dropdown">
                  <li><a href="consult.php">Adoption consulation</a></li>
                  <li><a href="forms/form1.pdf">Adoption Application</a></li>
                  <li><a href="records.php">Previous Records</a></li>

                </ul>
              </li>
              <li><a href="schedule.php" class="nav-link active">Schedules</a></li>
              <li><a href="contact.php">Support</a></li>
            </ul>
          </nav>
          
          <div class="right-cta-menu text-right d-flex aligin-items-center col-6">
            <div class="ml-auto">
              <nav class="mx-auto site-navigation">
                <ul class="site-menu js-clone-nav d-none d-xl-block ml-0 pl-0">
                        <li class="has-children">
                      <a style="color:red;"><?php echo $_SESSION['name'];?></a>
                        <ul class="dropdown">
                            <li><a href="profile.php">Profile</a></li>
                            <li><a href="pwd.php">Update Password</a></li>
                            <li><a href="log-out.php">Log-out</a></li>
                        </ul>
                      </li>
                    </ul>
               </nav>
            </div>
          </div>

        </div>
      </div>
    </header>

    <!-- HOME -->

    <section class="section-hero overlay inner-page bg-image" style="background-image: url('images/hero_1.jpg'); height: 5px; background-repeat:auto; background-attachment: sticky;" id="home-section">   
    </section>
     <section style="background-image: url('../images/ban.jpg'); height:100px;">
     <div class="container">
      <br>
        <h1 style="text-align: center; color: white;">Your Appoinment</h1>
      </div>
    </section>
<br> <br>
   <div class="container">
    <div style="position: relative; float:right; width:65%">
      <?php
      echo "<br><hr><table id=\"table\">
      <tr><td style=\"border: 0px;\"><font size=\"6\" color=\"green\"><b>Center: </font></b></td><td style=\"border: 0px;\"><font size=\"6\" color=\"red\">".$row['name'].".</font></td></tr>
      <tr><td style=\"border: 0px;\"><font size=\"6\" color=\"green\"><b>Email: </font></b></td><td style=\"border: 0px;\"><font size=\"6\" color=\"red\">".$row['email']."</font></td></tr>
      <tr><td style=\"border: 0px;\"><font size=\"6\" color=\"green\"><b>Contact: </font></b></td><td style=\"border: 0px;\"><font size=\"6\" color=\"red\">".$row['contact']."</font></td></tr>
      <tr><td style=\"border: 0px;\"><font size=\"6\" color=\"green\"><b>Address: </font></b></td><td style=\"border: 0px;\"><font size=\"6\" color=\"red\">".$row['address']."</font></td></tr></table><br><hr>";
      ?>
    </div>
  <div class="wall">
   <div class="calendar">
     
     <div class="frame">
       <div class="left screw">
         <div class="line"></div>
         <div class="shine"></div>
       </div> 
       <div class="right screw">
         <div class="rerotate line"></div>
         <div class="shine"></div>
       </div>
       <div class="year">
         <h1 id="yearCaption">0000</h1>
       </div>
     </div>
     
     <div class="content">
       <h2 id="monthCaption">month</h2>
       <h1 id="dayCaption">0</h1>
       <h3 id="DayCaption">day</h3>
     </div>
     <div class="over"></div>
   </div>
 </div>
</div>
<div id="myMap"></div>
</div>
<script type="text/javascript"> 
var map;
var marker;
var myLatlng = new google.maps.LatLng(<?php echo $lat; ?>,<?php echo $longi; ?>);
var geocoder = new google.maps.Geocoder();
var infowindow = new google.maps.InfoWindow();
function initialize(){
var mapOptions = {
zoom: 18,
center: myLatlng,
mapTypeId: google.maps.MapTypeId.ROADMAP
};

map = new google.maps.Map(document.getElementById("myMap"), mapOptions);

marker = new google.maps.Marker({
map: map,
position: myLatlng,
draggable: false 
}); 
}
google.maps.event.addDomListener(window, 'load', initialize);
</script>
    
    <!-- SCRIPTS -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/isotope.pkgd.min.js"></script>
    <script src="js/stickyfill.min.js"></script>
    <script src="js/jquery.fancybox.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.animateNumber.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    
    <script src="js/bootstrap-select.min.js"></script>
    
    <script src="js/custom.js"></script>
</body>
</html>
<script type="text/javascript">
var month = new Array();
month[0] = "January";
month[1] = "February";
month[2] = "March";
month[3] = "April";
month[4] = "May";
month[5] = "June";
month[6] = "July";
month[7] = "August";
month[8] = "September";
month[9] = "October";
month[10] = "November";
month[11] = "December";

var day = new Array();
day[0] = "Sunday";
day[1] = "Monday";
day[2] = "Tuesday";
day[3] = "Wednesday";
day[4] = "Thursday";
day[5] = "Friday";
day[6] = "Saturday";

document.getElementById('yearCaption').innerHTML=<?php echo $year;?>;
document.getElementById('monthCaption').innerHTML=month[<?php echo $month-1;?>];
document.getElementById('dayCaption').innerHTML=<?php echo $Day;?>;
document.getElementById('DayCaption').innerHTML=day[<?php echo $days;?>];
</script>
