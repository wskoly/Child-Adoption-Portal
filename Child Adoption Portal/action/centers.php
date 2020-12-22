<?php
 include "../include/database.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Result</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="Free-Template.co" />
    <link rel="shortcut icon" href="ftco-32x32.png">
    
    <link rel="stylesheet" href="../csss/custom-bs.css">
    <link rel="stylesheet" href="../csss/jquery.fancybox.min.css">
    <link rel="stylesheet" href="../csss/bootstrap-select.min.css">
    <link rel="stylesheet" href="../fonts/icomoon/style.css">
    <link rel="stylesheet" href="../fonts/line-icons/style.css">
    <link rel="stylesheet" href="../csss/owl.carousel.min.css">
    <link rel="stylesheet" href="../csss/animate.min.css">
    <link rel="stylesheet" href="../css/style.css">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="../csss/style.css">    
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
          <div class="site-logo col-6"><a href="../Home.php">Child Adoption Portal</a></div>

          <nav class="mx-auto site-navigation">
            <ul class="site-menu js-clone-nav d-none d-xl-block ml-0 pl-0">
              <li><a href="../Home.php" >Home</a></li>
              <li><a href="../center.php" class="nav-link active"> Adoption Centers</a></li>
              <li class="has-children">
                <a>Services</a>
                <ul class="dropdown">
                  <li><a href="../consult.php">Adoption consulation</a></li>
                  <li><a href="../forms/form1.pdf">Adoption Application</a></li>
                  <li><a href="../records.php">Previous Records</a></li>

                </ul>
              </li>
              <li><a href="../contact.php">Support</a></li>
              <li class="d-lg-none"><a href="../login.html">Log In</a></li>
            </ul>
          </nav>
          
          <div class="right-cta-menu text-right d-flex aligin-items-center col-6">
            <div class="ml-auto">
              <a href="../login.php" class="btn btn-primary border-width-2 d-none d-lg-inline-block"><span class="mr-2 icon-lock_outline"></span>Log In</a>
            </div>
            <a href="#" class="site-menu-toggle js-menu-toggle d-inline-block d-xl-none mt-lg-2 ml-3"><span class="icon-menu h3 m-0 p-0 mt-2"></span></a>
          </div>
        </div>
      </div>
    </header>

    <!-- HOME -->

    <section class="section-hero overlay inner-page bg-image" style="background-image: url('../images/hero_1.jpg'); height: 5px; background-repeat:auto; background-attachment: sticky;" id="home-section">   
    </section>
    <section style="background-image: url('../images/ban.jpg'); height:100px;">
     <div class="container">
      <br>
        <h3 style="text-align: center; color: white;">Search Adoption Center By Area</h3>
      </div>
    </section> <br>
    <div style="width: 300px; margin: 0 auto; overflow: hidden;">
        <div style="float: left; width: 80%;"></div>
        <div style="float: right; width: 20%;"></div>
       <form action="centers.php" method="POST">
            <select name="area" style="width:100%" required>
                <option value="">Select Area</option>
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
            <input style="width: 100%" class="btn btn-primary btn-lg btn-block text-white btn-search" type="submit" value="Search">
        </form><br>
      </div>
      <div style="width: 980px; margin: 0 auto; overflow: hidden;">
        <div style="float: left; width: 80%;"></div>
        <div style="float: right; width: 20%;"></div>
       <?php
         $area = $_POST['area'];
         $msg = "<p align=\"middle\"><font size=\"10\">Adoption Centers found in ". $area."</font></p>";
         if($area == "0"){
         $alert= "You have not selected anything";
                  echo "<script type='text/javascript'>
              alert('$alert');
              window.location = '../center.php';
              </script>";
       }
       else{
         $sql="SELECT * FROM centers WHERE area='$area';";
                 $result= mysqli_query($connect, $sql)
                 or die("failed to query".mysqli_error());
                 $check = mysqli_num_rows($result);
                 if($check > 0)
                    {
                      echo $msg;
                      echo "<table id=\"table\">
                              <tr>
                              <th>Name</th>
                              <th>Address</th>
                              <th>Contact</th>
                              <th>Email</th>
                              </tr>";
                 while($row = mysqli_fetch_assoc($result))
                           {
                            echo "<tr><td>". $row['name'] . "</td><td>" . $row['address']. "</td><td>". $row['contact']. "</td><td>" .$row['email'] . "</td></tr>";
                           }
                      echo '</table>';
                    }
                    else
                        {$msg = "<p align=\"middle\"><font size=\"10\">No Adoption Centers found in ". $area."</font></p>"; 
                        echo $msg;}
       }
 ?>
    </div>
    <!-- SCRIPTS -->
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/isotope.pkgd.min.js"></script>
    <script src="../js/stickyfill.min.js"></script>
    <script src="../js/jquery.fancybox.min.js"></script>
    <script src="../js/jquery.easing.1.3.js"></script>
    
    <script src="../js/jquery.waypoints.min.js"></script>
    <script src="../js/jquery.animateNumber.min.js"></script>
    <script src="../js/owl.carousel.min.js"></script>
    
    <script src="../js/bootstrap-select.min.js"></script>
    
    <script src="../js/custom.js"></script>
</body>
</html>