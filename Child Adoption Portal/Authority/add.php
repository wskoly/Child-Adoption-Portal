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
        if(isset($_POST['load']))
            {
              $user= $_POST['user'];
              $center= $_POST['center'];
              $child= $_POST['child'];
               $sql="SELECT * FROM adoption WHERE user_id='$user' AND child_id='$child';";
                    $result = mysqli_query($connect, $sql);
               $num = mysqli_num_rows($result);
                 if($num>0)
                      {
                        $alert= "Already exists";
                         echo "<script type='text/javascript'>
                            alert('$alert');
                              window.location = 'add.php';
                                </script>";
                      }
                  else
                       {
                          $sql="SELECT * FROM users WHERE id='$user';";
                                $result1 = mysqli_query($connect, $sql) 
                                or die("failed to query".mysqli_error());
                                      $row1=mysqli_fetch_assoc($result1);
                          $sql="SELECT * FROM centers WHERE id='$center';";
                                $result2 = mysqli_query($connect, $sql) 
                                or die("failed to query".mysqli_error());
                                       $row2=mysqli_fetch_assoc($result2);                    
                          $sql="SELECT c.name, c.birth,c.gender,c.religion, ce.name as cname FROM child as c, centers as ce WHERE c.id='$child' AND center_id=ce.id;";
                                $result3 = mysqli_query($connect, $sql) 
                                or die("failed to query".mysqli_error());
                                        $row3=mysqli_fetch_assoc($result3);
                        } 
            }
      }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
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
              <li><a href="Home.php">Dashboard</a></li>
              <li><a href="add.php" class="nav-link active">Add Adoption Information</a></li>
              <li><a href="adopted.php">Adoption History</a></li>
              <li><a href="users.php">View Users</a></li>
              <li><a href="center.php">View Centers</a></li>
              <li><a href="child.php">View Childs</a></li>
            </ul>
          </nav>
          <div class="right-cta-menu text-right d-flex aligin-items-center col-6">
            <div class="ml-auto">
              <a href="action/log-out.php" class="btn btn-primary border-width-2 d-none d-lg-inline-block"><span class="mr-2 icon-lock_outline"></span>Log Out</a>
            </div>
            <a href="#" class="site-menu-toggle js-menu-toggle d-inline-block d-xl-none mt-lg-2 ml-3"><span class="icon-menu h3 m-0 p-0 mt-2"></span></a>
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
        <h1 style="text-align: center; color: white;">Authority Dashboard</h1>
      </div>
    </section>
<br> <br>
  <div class="container">
    <h2 align="middle"><b>Add Adoption Information</b></h2>
      <form action="" method="POST">
        <input type="number" name="user" placeholder="Insert User ID" style="width: 25%;" required> &nbsp; &nbsp; &nbsp;
        <input type="number" name="center" placeholder="Insert Center ID" style="width: 25%;" required> &nbsp; &nbsp; &nbsp;
        <input type="number" name="child" placeholder="Insert Child ID" style="width: 25%;" required> &nbsp; &nbsp; &nbsp;
        <input type="submit" class="btn btn-primary" name="load" value="load" style="width: 10%;"> 
      </form>
      <?php 
          if(isset($_POST['load']))
          {
            ?>
            <div style="width: 980px; margin: 0 auto; overflow: hidden;">
            <p><b>Adopter's Name: <?php echo $row1['name']; ?></b></p>
            <p><b>Adopter's Email: <?php echo $row1['email']; ?></b></p>
            <p><b>Adopter's Contact: <?php echo $row1['contact']; ?></b></p>
            <p><b>Adopter's Address: <?php echo $row1['address']; ?></b></p>
             <br>
            <p><b>Center's Name: <?php echo $row2['name']; ?></b></p>
            <p><b>Center's Email: <?php echo $row2['email']; ?></b></p>
            <p><b>Center's Contact: <?php echo $row2['contact']; ?></b></p>
            <p><b>Center's Address: <?php echo $row2['address']; ?></b></p>
              <br>
            <p><b>Child's Name: <?php echo $row3['name']; ?></b></p>
            <p><b>Child's Date of Birth: <?php echo $row3['birth']; ?></b></p>
            <p><b>Child's Gender: <?php echo $row3['gender']; ?></b></p>
            <p><b>Child's Religion: <?php echo $row3['religion']; ?></b></p>
            <p><b>Child's Center: <?php echo $row3['cname']; ?></b></p>
          </div>
             <a href="action/add.php?child=<?php echo $child; ?>&center=<?php echo $center; ?>&user=<?php echo $user; ?>" class="btn btn-primary">Confirm</a>
          <?php
          }
          ?>
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
