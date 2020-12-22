<?php
ini_set('session.cookie_lifetime', '600000');
include "include/database.php";
session_start();
if(!isset($_SESSION['email']))
{
  header('Location: ../login.php');
}
else
   {
    $id=$_REQUEST['id'];
     $sql="SELECT * FROM users WHERE id='$id';";
     $result = mysqli_query($connect, $sql);
     $num=mysqli_num_rows($result);
     $row=mysqli_fetch_assoc($result);
   }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Addopter</title>
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
    </div>
    

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
                <a class="nav-link active">Services</a>
                <ul class="dropdown">
                  <li><a href="consult.php">Adoption Consultation</a></li>
                  <li><a href="forms/form1.pdf">Adoption Application</a></li>
                  <li><a href="records.php">Previous Records</a></li>

                </ul>
              </li>
              <li><a href="contact.php">Support</a></li>
              <li class="d-lg-none"><a href="acc.php">Log In</a></li>
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
        <h1 style="text-align: center; color: white;">Adopters's Info</h1>
      </div>
      
    </section>
    <br><br>
    <div style="width: 580px; margin: 0 auto; overflow: hidden;">
    <div style="float: left; width: 80%;"></div>
    <div style="float: right; width: 20%;"></div>
         <h3><b><font color=red>Name: </font><?php echo $row['name'];?></b></h3>
         <h3><b><font color=red>Email: </font><?php echo $row['email'];?></b></h3> 
         <h3><b><font color=red>Contact: </font><?php echo $row['contact'];?></b></h3> 
         <h3><b><font color=red>Address: </font><?php echo $row['address'];?></b></h3>   
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


