<?php
include "include/database.php";
session_start();
if(isset($_SESSION['username']))
{
  header('Location: center/Home.php');
}
elseif (isset($_SESSION['email'])) {
  header('Location: user/Home.php');
}
    if(isset($_POST['submit']))
      {
        $age1="";
        $age2="";
        $gender = $_POST['gender'];
        $area = $_POST['area'];
        $religion = $_POST['religion'];
        if($_POST['age']=="1")
          {
            $age1 = 0;
            $age2 = 5;
          }
          elseif($_POST['age']=="2")
          {
            $age1 = 5;
            $age2 = 10;
          }
          elseif($_POST['age']=="3")
          {
            $age1 = 10;
            $age2 = 15;
          }
          elseif($_POST['age']=="4")
          {
            $age1 = 15;
            $age2 = 19;
          }
        }
             
        if($_POST['age']!=5 && $_POST['religion']!='anyRel' && $_POST['area']!='anyArea' && $_POST['gender']!='anyGen')
        {
          $sql="SELECT c.id, c.name, c.birth, c.religion, c.image, c.gender,ce.name as c_name, ce.address as c_address, ce.contact as c_contact,ce.email as c_email  FROM child as c, centers as ce WHERE c.center_id=ce.id AND ce.area='$area' AND c.religion='$religion' AND c.gender='$gender' AND c.status !='Adopted' AND c.birth BETWEEN DATE_SUB(CURDATE(), INTERVAL '$age2' YEAR) AND DATE_SUB(CURDATE(), INTERVAL '$age1' YEAR) ;";
          $result = mysqli_query($connect, $sql) 
          or die("failed to query".mysqli_error());
        }

        elseif($_POST['age']==5 && $_POST['gender']=='anyGen' && $_POST['religion']=='anyRel' && $_POST['area']=='anyArea')
          {
            
          $sql="SELECT c.id, c.name, c.birth, c.religion, c.image, c.gender,ce.name as c_name, ce.address as c_address, ce.contact as c_contact,ce.email as c_email  FROM child as c, centers as ce WHERE c.center_id=ce.id AND c.status !='Adopted' ;";
          $result = mysqli_query($connect, $sql) 
          or die("failed to query".mysqli_error());
         }

         elseif($_POST['age']==5 && $_POST['gender']=='anyGen' && $_POST['religion']=='anyRel')
          {
          $sql="SELECT c.id, c.name, c.birth, c.religion, c.image, c.gender,ce.name as c_name, ce.address as c_address, ce.contact as c_contact,ce.email as c_email  FROM child as c, centers as ce WHERE c.center_id=ce.id AND ce.area='$area' AND c.status !='Adopted' ;";
          $result = mysqli_query($connect, $sql) 
          or die("failed to query".mysqli_error());
         }

          elseif($_POST['age']==5 && $_POST['gender']=='anyGen' && $_POST['area']=='anyArea')
          {
          $sql="SELECT c.id, c.name, c.birth, c.religion, c.image, c.gender,ce.name as c_name, ce.address as c_address, ce.contact as c_contact,ce.email as c_email  FROM child as c, centers as ce WHERE c.center_id=ce.id AND c.religion='$religion' AND c.status !='Adopted';";
          $result = mysqli_query($connect, $sql) 
          or die("failed to query".mysqli_error());
         }

         elseif(($_POST['age']==5) && $_POST['religion']=='anyRel' && $_POST['area']=='anyArea')
          {
          $sql="SELECT c.id, c.name, c.birth, c.religion, c.image, c.gender,ce.name as c_name, ce.address as c_address, ce.contact as c_contact,ce.email as c_email  FROM child as c, centers as ce WHERE c.center_id=ce.id AND c.gender='$gender' AND c.status !='Adopted' ;";
          $result = mysqli_query($connect, $sql) 
          or die("failed to query".mysqli_error());
         }

         elseif($_POST['religion']=='anyRel' && $_POST['gender']=='anyGen' && $_POST['area']=='anyArea')
          {
          $sql="SELECT c.id, c.name, c.birth, c.religion, c.image, c.gender,ce.name as c_name, ce.address as c_address, ce.contact as c_contact,ce.email as c_email  FROM child as c, centers as ce WHERE c.center_id=ce.id AND c.status !='Adopted' AND c.birth BETWEEN DATE_SUB(CURDATE(), INTERVAL '$age2' YEAR) AND DATE_SUB(CURDATE(), INTERVAL '$age1' YEAR);";
          $result = mysqli_query($connect, $sql) 
          or die("failed to query".mysqli_error());
         }
         elseif($_POST['age']==5 && $_POST['gender']=='anyGen')
          {
          $sql="SELECT c.id, c.name, c.birth, c.religion, c.image, c.gender,ce.name as c_name, ce.address as c_address, ce.contact as c_contact,ce.email as c_email  FROM child as c, centers as ce WHERE c.center_id=ce.id AND ce.area='$area' AND c.religion='$religion' AND c.status !='Adopted' ;";
          $result = mysqli_query($connect, $sql) 
          or die("failed to query".mysqli_error());
         }

         elseif($_POST['age']==5 && $_POST['religion']=='anyRel')
          {
          $sql="SELECT c.id, c.name, c.birth, c.religion, c.image, c.gender,ce.name as c_name, ce.address as c_address, ce.contact as c_contact,ce.email as c_email  FROM child as c, centers as ce WHERE c.center_id=ce.id AND ce.area='$area' AND  c.gender='$gender' AND c.status !='Adopted' ;";
          $result = mysqli_query($connect, $sql) 
          or die("failed to query".mysqli_error());
         }

         elseif($_POST['age']==5 && $_POST['area']=='anyArea')
          {
          $sql="SELECT c.id, c.name, c.birth, c.religion, c.image, c.gender,ce.name as c_name, ce.address as c_address, ce.contact as c_contact,ce.email as c_email  FROM child as c, centers as ce WHERE c.center_id=ce.id AND c.religion='$religion' AND  c.gender='$gender' AND c.status !='Adopted' ;";
          $result = mysqli_query($connect, $sql) 
          or die("failed to query".mysqli_error());
         }

         elseif($_POST['religion']=='anyRel' && $_POST['gender']=='anyGen')
          {
          $sql="SELECT c.id, c.name, c.birth, c.religion, c.image, c.gender,ce.name as c_name, ce.address as c_address, ce.contact as c_contact,ce.email as c_email  FROM child as c, centers as ce WHERE c.center_id=ce.id AND ce.area='$area' AND c.status !='Adopted' AND c.birth BETWEEN DATE_SUB(CURDATE(), INTERVAL '$age2' YEAR) AND DATE_SUB(CURDATE(), INTERVAL '$age1' YEAR);";
          $result = mysqli_query($connect, $sql) 
          or die("failed to query".mysqli_error());
         }

         elseif($_POST['religion']=='anyRel' && $_POST['area']=='anyArea')
          {
          $sql="SELECT c.id, c.name, c.birth, c.religion, c.image, c.gender,ce.name as c_name, ce.address as c_address, ce.contact as c_contact,ce.email as c_email  FROM child as c, centers as ce WHERE c.center_id=ce.id AND c.gender='$gender' AND c.status !='Adopted' AND c.birth BETWEEN DATE_SUB(CURDATE(), INTERVAL '$age2' YEAR) AND DATE_SUB(CURDATE(), INTERVAL '$age1' YEAR);";
          $result = mysqli_query($connect, $sql) 
          or die("failed to query".mysqli_error());
         }

         elseif($_POST['gender']=='anyGen' && $_POST['area']=='anyArea')
          {
          $sql="SELECT c.id, c.name, c.birth, c.religion, c.image, c.gender,ce.name as c_name, ce.address as c_address, ce.contact as c_contact,ce.email as c_email  FROM child as c, centers as ce WHERE c.center_id=ce.id AND c.religion='$religion' AND c.status !='Adopted' AND c.birth BETWEEN DATE_SUB(CURDATE(), INTERVAL '$age2' YEAR) AND DATE_SUB(CURDATE(), INTERVAL '$age1' YEAR);";
          $result = mysqli_query($connect, $sql) 
          or die("failed to query".mysqli_error());
         }

         elseif($_POST['gender']=="anyGen")
          {
          $sql="SELECT c.id, c.name, c.birth, c.religion, c.image, c.gender,ce.name as c_name, ce.address as c_address, ce.contact as c_contact,ce.email as c_email  FROM child as c, centers as ce WHERE c.center_id=ce.id AND ce.area='$area' AND c.religion='$religion' AND c.status !='Adopted'  AND c.birth BETWEEN DATE_SUB(CURDATE(), INTERVAL '$age2' YEAR) AND DATE_SUB(CURDATE(), INTERVAL '$age1' YEAR) ;";
          $result = mysqli_query($connect, $sql) 
          or die("failed to query".mysqli_error());
         }
         elseif($_POST['area']=='anyArea')
          {
          $sql="SELECT c.id, c.name, c.birth, c.religion, c.image, c.gender,ce.name as c_name, ce.address as c_address, ce.contact as c_contact,ce.email as c_email  FROM child as c, centers as ce WHERE c.center_id=ce.id AND c.religion='$religion' AND c.gender='$gender' AND c.status !='Adopted' AND c.birth BETWEEN DATE_SUB(CURDATE(), INTERVAL '$age2' YEAR) AND DATE_SUB(CURDATE(), INTERVAL '$age1' YEAR) ;";
          $result = mysqli_query($connect, $sql) 
          or die("failed to query".mysqli_error());
         }
         elseif($_POST['religion']=='anyRel')
          {
          $sql="SELECT c.id, c.name, c.birth, c.religion, c.image, c.gender,ce.name as c_name, ce.address as c_address, ce.contact as c_contact,ce.email as c_email  FROM child as c, centers as ce WHERE c.center_id=ce.id AND ce.area='$area' AND c.gender='$gender' AND c.status !='Adopted' AND c.birth BETWEEN DATE_SUB(CURDATE(), INTERVAL '$age2' YEAR) AND DATE_SUB(CURDATE(), INTERVAL '$age1' YEAR) ;";
          $result = mysqli_query($connect, $sql) 
          or die("failed to query".mysqli_error());
         }

         elseif($_POST['age']==5)
          {
          $sql="SELECT c.id, c.name, c.birth, c.religion, c.image, c.gender,ce.name as c_name, ce.address as c_address, ce.contact as c_contact,ce.email as c_email  FROM child as c, centers as ce WHERE c.center_id=ce.id AND ce.area='$area' AND c.gender='$gender' AND c.status !='Adopted' AND c.religion='$religion' ;";
          $result = mysqli_query($connect, $sql) 
          or die("failed to query".mysqli_error());
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
              <li><a href="contact.php">Support</a></li>
            </ul>
          </nav>
          
          <div class="right-cta-menu text-right d-flex aligin-items-center col-6">
            <div class="ml-auto">
              <a href="login.php" class="btn btn-primary border-width-2 d-none d-lg-inline-block"><span class="mr-2 icon-lock_outline"></span>Log In</a>
            </div>
            <a href="#" class="site-menu-toggle js-menu-toggle d-inline-block d-xl-none mt-lg-2 ml-3"><span class="icon-menu h3 m-0 p-0 mt-2"></span></a>
          </div>

        </div>
      </div>
    </header>

    <!-- HOME -->

    <section class="section-hero overlay inner-page bg-image" style="background-image: url('images/hero_1.jpg'); height: 5px; background-repeat:auto; background-attachment: sticky;" id="home-section">   
    </section>
    <section class="py-5 bg-image overlay-primary fixed overlay" id="next" style="background-image: url('images/hero_1.jpg');">
     <div class="container">
        <h3 style="text-align: center; color: white;">Search Result</h3>
      </div>
    </section>
    <div style="width: 980px; margin: 0 auto; overflow: hidden;">
    <div style="float: left; width: 80%;"></div>
    <div style="float: right; width: 20%;"></div>
     <?php
                $check = mysqli_num_rows($result);
                 if($check > 0)
                    {
                      $serial=1;
                 while($row = mysqli_fetch_assoc($result))
                           {
                            $age = getAge($row['birth']);
               ?>
               <table id="table" style="float: left;">
                 <tr>
                  <td style="width:50%">
                  <img src="center/image/<?php echo $row['image']; ?>" style="float:left; height="150" width="150">
                  <h4><b>Name: </b> <?php echo $row['name']; ?></h4>
                  <h6><b>Age: </b><?php echo $age; ?> Years</h6>
                  <h6><b>Religion: </b><?php echo $row['religion'] ?></h6>
                  </td><td><?php echo "You need to be logged in to see the full details"; ?>
                 </td>
                </tr> 
              </table>
               <?php
                       $serial++;
                          }
                    }
                    else
                    {
                     echo "<h1 align=\"center\">Nothing Found...!<br>Please try with different parameters</h1>";
                      $alert= "Nothing found please try with different parameters";
                      echo "<script type='text/javascript'>
                       alert('$alert');
                       window.location = 'Home.php';
                       </script>";
                    }
                ?>
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
