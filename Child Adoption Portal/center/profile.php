<?php
ini_set('session.cookie_lifetime', '600000');
session_start();
if(!isset($_SESSION['username']))
{
  header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <style type="text/css">
    #myMap {
   height: 350px;
   width: 680px;
}
  </style>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAn8N_uRmaBoLh3EmfWMPx5UPa1YE4yJ-c">
</script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js">
</script>
    <title>Home</title>
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

    <script type="text/javascript" src="js/graph.js"></script>

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
              <li><a href="Home.php" >Home</a></li>
              <li><a href="add.php">Add Childrens</a></li>
              <li><a href="update.php">View/Update Child</a></li>
              <li><a href="consult.php" >Consulation Request</a></li>
              <li><a href="appoinment.php">Appoinments</a></li>
              <li><a href="adopted.php">Adopted Child</a></li>
            </ul>
          </nav>
          
          <div class="right-cta-menu text-right d-flex aligin-items-center col-6">
            <div class="ml-auto">
              <nav class="mx-auto site-navigation">
                <ul class="site-menu js-clone-nav d-none d-xl-block ml-0 pl-0">
                        <li class="has-children">
                      <a style="color:red;"><?php echo $_SESSION['username'];?></a>
                        <ul class="dropdown">
                            <li><a href="profile.php" class="nav-link active">Profile</a></li>
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
        <h1 style="text-align: center; color: white;"><b>Welcome, <?php echo " ".$_SESSION['name']."  Administrator!"; ?></b></h1>
      </div>
    </section>
<br>
  <div class="container">
    <h2 align="middle"><b>Your Profile</b></h2>

<form action="action/update.php" method="POST">
  <div class="container">
    <h2>Edit the fields that you want to update</h2>
    <hr>

    <label for="name"><b>Name</b></label>
    <input type="text" value="<?php echo $_SESSION['name']; ?>" name="name" required>
    <label for="email"><b>Email &nbsp; </b></label> 
    <input type="email" value="<?php echo $_SESSION['email']; ?>" name="email" required> <br><br>
    <label for="area"><b>City</b></label>
    <select name="area">
      <option value="<?php echo $_SESSION['area']; ?>"><?php echo $_SESSION['area']; ?></option>
      <option value="Dhaka">Dhaka</option>
      <option value="Khulna">Khulna</option>
      <option value="Chittagong">Chittagong</option>
      <option value="Barishal">Barishal</option>
      <option value="Rajshahi">Rajshahi</option>
      <option value="Rangpur">Rangpur</option>
      <option value="Sylhet">Sylhet</option>
      <option value="Jashore">Jashore</option>
      <option value="Cumilla">Cumilla</option>
      <option value="Mymenshing">Mymenshing</option>
      <option value="Faridpur">Faridpur</option>
  </select>
    <label for="contact"><b>Contact No</b></label>
    <input type="tel" value="<?php echo $_SESSION['contact']; ?>" name="contact" required>

    <label for="address"><b>Address</b></label>
    <input type="text" value="<?php echo $_SESSION['address']; ?>" name="address" required>

    <div id="myMap"></div>
    <input type="text" id="latitude" value="<?php echo $_SESSION['latitude']; ?>" name="latitude" placeholder="Latitude"/>
    <input type="text" id="longitude" value="<?php echo $_SESSION['longitude']; ?>" name="longitude" placeholder="Longitude"/>

    <hr>

    <input type="submit" value="Update" class="btn btn-primary">
  </div>
  
</form>
    </div><br>
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
var map;
var marker;
var myLatlng = new google.maps.LatLng(23.2143,89.3417);
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
draggable: true 
}); 

geocoder.geocode({'latLng': myLatlng }, function(results, status) {
if (status == google.maps.GeocoderStatus.OK) {
if (results[0]) {

$('#latitude,#longitude').show();
$('#latitude').val(marker.getPosition().lat());
$('#longitude').val(marker.getPosition().lng());
infowindow.open(map, marker);
}
}
});

google.maps.event.addListener(marker, 'dragend', function() {
console.log( 'i am dragged' );
geocoder.geocode({'latLng': marker.getPosition()}, function(results, status) {
if (status == google.maps.GeocoderStatus.OK) {
if (results[0]) {
    console.log('worked');
$('#latitude').val(marker.getPosition().lat());
$('#longitude').val(marker.getPosition().lng());
infowindow.open(map, marker);
}
}
else
console.log( 'Geocode was not successful for the following reason: ' + status );
});
});

}
google.maps.event.addDomListener(window, 'load', initialize);
</script>
