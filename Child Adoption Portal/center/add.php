<?php
include "include/database.php";
ini_set('session.cookie_lifetime', '600000');
session_start();
  if(!isset($_SESSION['username']) )
       {
         header('Location: index.php');
       }
  else
     {
      $username= $_SESSION['username'];
     }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Add Child</title>
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
              <li><a href="Home.php">Home</a></li>
              <li><a href="add.php" class="nav-link active">Add Childrens</a></li>
              <li><a href="update.php">View/Update Child</a></li>
              <li><a href="consult.php">Consulation Request</a></li>
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
        <h1 style="text-align: center; color: white;"><b>Welcome, <?php echo " ".$_SESSION['name']."  Administrator!"; ?></b></h1>
      </div>
    </section>
<br> <br>
  <div class="container">
    <h1 align="middle"><b>ADD New Children</b></h1>
<form action="action/add.php" method="post" enctype="multipart/form-data">
  <div class="container">
    <hr>

    <label for="image"><b>Add image</b></label> <br>
    <input type="file" name="image" id="image" required> <br><br>
    <label for="name"><b>Name</b></label>
    <input type="text" placeholder="Enter Child's Name" name="name" required>
    <label for="birth"><b>Birth Date</b></label><br>
    <input type="date" name="birth" required><br>
    <label for="gender" class="selectpicker" data-style="btn-white btn-lg"><b>Gender</b></label> <br>
    <select name="gender">
        <option value="male">Male</option>
        <option value="female">Female</option>
        <option value="other">Others</option>
    </select>
    <br>
    <label for="religion" class="selectpicker" data-style="btn-white btn-lg"><b>Religion</b></label>
    <select name="religion">
        <option value="Islam">Islam</option>
        <option value="Hindu">Hindu</option>
        <option value="Buddhist">Buddhist</option>
        <option value="Christian">Christian</option>
        <option value="other">Others</option>
    </select>  
     <hr>

    <input type="submit" value="register" class="btn btn-primary">
    <input type="reset" value="Reset" class="btn btn-primary">
  </div>
</form>
 </div>
 <br>


    </div>
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
  var chart1 = new CanvasJS.Chart("chartContainer1",
  {
    theme: "light2",
    title:{
      text: "Male-Female"
    },    
    data: [
    {       
      type: "pie",
      showInLegend: true,
      toolTipContent: "{y} - #percent %",
      yValueFormatString: "## Child",
      legendText: "{indexLabel}",
      dataPoints: [
        {  y: <?php echo $male;?>, indexLabel: "Male" },
        {  y: <?php echo $female;?>, indexLabel: "Female" },
      ]
    }
    ]
  });
  chart1.render();
  var chart2 = new CanvasJS.Chart("chartContainer2",
  {
    theme: "light2",
    title:{
      text: "Age"
    },    
    data: [
    {       
      type: "pie",
      showInLegend: true,
      toolTipContent: "{y} - #percent %",
      yValueFormatString: "## Child",
      legendText: "{indexLabel}",
      dataPoints: [
        {  y: <?php echo $age0;?>, indexLabel: "0-4" },
        {  y: <?php echo $age5;?>, indexLabel: "5-9" },
        {  y: <?php echo $age10;?>, indexLabel: "10-14" },
        {  y: <?php echo $age15;?>, indexLabel: "15-18" }
      ]
    }
    ]
  });
  chart2.render();
  var chart3 = new CanvasJS.Chart("chartContainer3",
  {
    theme: "light2",
    title:{
      text: "Religion"
    },    
    data: [
    {       
      type: "pie",
      showInLegend: true,
      toolTipContent: "{y} - #percent %",
      yValueFormatString: "## Child",
      legendText: "{indexLabel}",
      dataPoints: [
        {  y: <?php echo $islam;?>, indexLabel: "Islam" },
        {  y: <?php echo $chris;?>, indexLabel: "Christian" },
        {  y: <?php echo $hindu;?>, indexLabel: "Hindu" },
        {  y: <?php echo $buddh;?>, indexLabel: "Buddhist" },
        {  y: <?php echo $other;?>, indexLabel: "Unknown" }
      ]
    }
    ]
  });
  chart3.render();
</script>
