<?php
include "include/database.php";
session_start();
if(!isset($_SESSION['username']))
{
  header('Location: index.php');
}
                $center_id= $_SESSION['id'];
                $sql="SELECT c.id, c.date, u.name, u.contact, u.email FROM consult as c, users as u WHERE c.center_id ='$center_id' AND u.id=c.user_id AND c.status='pending' ;";
                 $result= mysqli_query($connect, $sql)
                 or die("failed to query".mysqli_error());
                 $check = mysqli_num_rows($result);
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
              <li><a href="Home.php" >Home</a></li>
              <li><a href="add.php">Add Childrens</a></li>
              <li><a href="update.php">View/Update Child</a></li>
              <li><a href="consult.php" class="nav-link active">Consulation Request</a></li>
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
    <h2 align="middle"><b>Pending Appoinment</b></h2>
     
<?php
                if($check > 0)
                   {
                    ?>
              <table id="table">
                <tr>
                  <th>Se<br>ri<br>al</th>
                  <th>Name </th>
                  <th>Contact</th>
                  <th>Email</th>
                  <th>Requested<br>Date</th>
                  <th>Action</th>
                </tr>
                    <?php
                    $serial=1;
                    while($row=mysqli_fetch_assoc($result))
                    {
                      $date= date_create($row['date']);
                      ?>
                      <tr style="height: 4px;">
                       <td style="height:100px"><?php echo $serial; ?></td>
                       <td><?php echo $row['name']; ?></td>
                       <td><?php echo $row['contact']; ?></td>
                       <td><?php echo $row['email']; ?></td>
                       <td style="width:15%;"><?php echo date_format($date,"Y, F d l"); ?></td>
                       <td style="width:20%;"><a href="action/approve.php?id=<?php echo $row['id']; ?>" class="update">Approve</a>
                                <a href="action/reject.php?id=<?php echo $row['id']; ?>" class="remove">Reject</a>
                       </td>
                      </tr>
                      <?php
                      $serial++;
                    }
                    echo "</table>";
                   }
                   else
                    echo "<h1 align=\"middle\">No requests at this time<h1>";
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