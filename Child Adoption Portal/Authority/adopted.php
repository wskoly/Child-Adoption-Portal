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
              <li><a href="add.php">Add Adoption Information</a></li>
              <li><a href="adopted.php" class="nav-link active">Adoption History</a></li>
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
    <h1 align="middle"><b>Adopted Childrens</b></h1>
    <table id="table">
                <tr>
                  <th>Se<br>ri<br>al</th>
                  <th>ID </th>
                  <th>Image</th>
                  <th>Name</th>
                  <th>Age</th>
                  <th>Religion</th>
                  <th>Gender</th>
                </tr>
                <?php
                $sql="SELECT * FROM child where status='Adopted' ;";
                 $result= mysqli_query($connect, $sql)
                 or die("failed to query".mysqli_error());
                 $check = mysqli_num_rows($result);
                 if($check > 0)
                    {
                      $serial=1;
                 while($row = mysqli_fetch_assoc($result))
                           {
                            $age = getAge($row['birth']);
                            $imgdir= "../center/image/". $row['image'];
                            $id= $row['id'];
                            ?>
                            <tr>
                              <td><?php echo $serial; ?></td>
                              <td><?php echo $row['id']; ?></td>
                              <td style="width:10%;">
                               <img src="<?php echo $imgdir;?>" style="width: 100px; height:100px">
                              </td>
                              <td><?php echo $row['name']; ?></td>
                              <td><?php echo $age; ?></td>
                              <td><?php echo $row['religion']; ?></td>
                              <td><?php echo $row['gender']; ?></td>
                            </tr>
                            <?php 
                            $serial++;
                           }
                    }
                    else
                       echo "No data found";
                       ?>
              </table>
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
