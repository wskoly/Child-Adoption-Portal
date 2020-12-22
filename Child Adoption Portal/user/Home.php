<?php
include "include/database.php";
ini_set('session.cookie_lifetime', '600000');
session_start();
  if(!isset($_SESSION['email']))
       {
         header('Location: ../login.php');
       }
  else
     {
      $email= $_SESSION['email'];
       $sql = "SELECT * FROM users WHERE email = '$email' ;";
       $result = mysqli_query($connect, $sql);
        $row = mysqli_fetch_array($result);
        $_SESSION['name'] = $row['name'];
        $_SESSION['city'] = $row['city'];
        $_SESSION['contact'] = $row['contact'];
        $_SESSION['birth'] = $row['birth'];
        $_SESSION['address'] = $row['address'];
        $_SESSION['password'] = $row['password'];
        $_SESSION['id'] = $row['id'];

        $sql="SELECT * FROM child;";
          $result = mysqli_query($connect, $sql) 
          or die("failed to query".mysqli_error());
          $child=mysqli_num_rows($result);
          $sql="SELECT * FROM centers;";
          $result = mysqli_query($connect, $sql) 
          or die("failed to query".mysqli_error());
          $centers=mysqli_num_rows($result);
          $sql="SELECT * FROM users;";
          $result = mysqli_query($connect, $sql) 
          or die("failed to query".mysqli_error());
          $users=mysqli_num_rows($result);
          $sql="SELECT * FROM adoption;";
          $result = mysqli_query($connect, $sql) 
          or die("failed to query".mysqli_error());
          $adoption=mysqli_num_rows($result);
     }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>CAP</title>
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
              <li><a href="Home.php" class="nav-link active">Home</a></li>
              <li><a href="center.php"> Adoption Centers</a></li>
              <li class="has-children">
                <a>Services</a>
                <ul class="dropdown">
                  <li><a href="consult.php">Adoption consulation</a></li>
                  <li><a href="forms/form1.pdf">Adoption Application</a></li>
                  <li><a href="records.php">Previous Records</a></li>

                </ul>
              </li>
              <li><a href="schedule.php">Schedules</a></li>
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
    <section class="home-section section-hero overlay bg-image" style="background-image: url('images/hero_1.jpg');" id="home-section">

      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-12">
            <div class="mb-5 text-center">
              <h1 class="text-white font-weight-bold">Give a child a beautiful childhood</h1>
              <p>A portal, that makes child adoption proccess easier and you might find a lost child through this portal.</p>
            </div>
            <form method="POST" class="search-jobs-form" action="search.php">
              <div class="row mb-5">
                <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">
                  <select name="age"class="selectpicker" data-style="btn-white btn-lg" data-width="100%" title="Select Age" required>
                    <option value="1">0 - 4</option>
                     <option value="2">5 - 9</option>
                    <option value="3">10 - 14</option>
                    <option value="4">15 - 18</option>
                    <option value="5">Any Age</option>
                  </select>
                </div>

                <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">
                  <select name="gender" class="selectpicker" data-style="btn-white btn-lg" data-width="100%" title="Select Gender" required>
    					<option value="male">Male</option>
   						<option value="female">Female</option>
   						 <option value="others">Others</option>
   						 <option value="anyGen">Any Gender</option>
                  </select>
                </div>


                <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">
                  <select name="area" class="selectpicker" data-style="btn-white btn-lg" data-width="100%" title="Select Area" required>
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
                   <option value="anyArea">Any Area</option>
                  </select>
                </div>



                <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">
                  <select name="religion" class="selectpicker" data-style="btn-white btn-lg" data-width="100%" title="Select Religion" required>
                <option value="Islam">Islam</option>
                <option value="Hindu">Hindu</option>
                <option value="Buddhist">Buddhist</option>
                <option value="Christian">Christian</option>
                <option value="other">Unknown</option>
                <option value="anyRel">Any Religion</option>
                  </select>
                </div>
              </div>
                <div style="float:right;">
                  <button type="submit" name="submit" class="btn btn-primary btn-lg btn-block text-white btn-search"><span class="icon-search icon mr-2"></span>Search</button>
                </div>
            </form>
          </div>
        </div>
      </div>

      <a href="#next" class="scroll-button smoothscroll">
        <span class=" icon-keyboard_arrow_down"></span>
      </a>

    </section>
    
    <section class="py-5 bg-image overlay-primary fixed overlay" id="next" style="background-image: url('images/hero_1.jpg');">
      <div class="container">
        <div class="row mb-5 justify-content-center">
          <div class="col-md-7 text-center">
            <h2 class="section-title mb-2 text-white">Portal Stats</h2>
            <p class="lead text-white">Stats about registered Children, Adoption Center, Succesfull Adoption and Total User</p>
          </div>
        </div>
        <div class="row pb-0 block__19738 section-counter">

          <div class="col-6 col-md-6 col-lg-3 mb-5 mb-lg-0">
            <div class="d-flex align-items-center justify-content-center mb-2">
              <strong class="number" data-number="<?php echo $child;?>">0</strong>
            </div>
            <span class="caption">Total Child</span>
          </div>

          <div class="col-6 col-md-6 col-lg-3 mb-5 mb-lg-0">
            <div class="d-flex align-items-center justify-content-center mb-2">
              <strong class="number" data-number="<?php echo $centers;?>">0</strong>
            </div>
            <span class="caption">Total Center</span>
          </div>

          <div class="col-6 col-md-6 col-lg-3 mb-5 mb-lg-0">
            <div class="d-flex align-items-center justify-content-center mb-2">
              <strong class="number" data-number="<?php echo $adoption;?>">0</strong>
            </div>
            <span class="caption">Adoption</span>
          </div>

          <div class="col-6 col-md-6 col-lg-3 mb-5 mb-lg-0">
            <div class="d-flex align-items-center justify-content-center mb-2">
              <strong class="number" data-number="<?php echo $users;?>">0</strong>
            </div>
            <span class="caption">Total User</span>
          </div>

            
        </div>
      </div>
    </section>

    
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