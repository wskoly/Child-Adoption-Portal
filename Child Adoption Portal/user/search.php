<?php
ini_set('session.cookie_lifetime', '600000');
include "../include/database.php";
session_start();
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
    <title>Result</title>
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

    <style type="text/css">

a.lightbox img {
height: 100px;
border: 3px solid white;
box-shadow: 8px 8px 28px (.5,.5,.5,.7);
margin: 0px 0px 0px 0px;
}

/* Styles the lightbox, removes it from sight and adds the fade-in transition */

.lightbox-target {
position: fixed;
top: -100%;
width: 99%;
left:0%;
background: rgba(0,0,0,.7);
width: 100%;
opacity: 5;
-webkit-transition: opacity .5s ease-in-out;
-moz-transition: opacity .5s ease-in-out;
-o-transition: opacity .5s ease-in-out;
transition: opacity .5s ease-in-out;
overflow: hidden;
}

/* Styles the lightbox image, centers it vertically and horizontally, adds the zoom-in transition and makes it responsive using a combination of margin and absolute positioning */

.lightbox-target img {
margin: auto;
position: absolute;
top: 0;
left:0;
right:0;
bottom: 0;
max-height: 0%;
max-width: 0%;
border: 3px solid white;
box-shadow: 8px 8px 28px rgba(.5,.5,.5,.7);
box-sizing: border-box;
-webkit-transition: .5s ease-in-out;
-moz-transition: .5s ease-in-out;
-o-transition: .5s ease-in-out;
transition: .5s ease-in-out;
}

/* Styles the close link, adds the slide down transition */

a.lightbox-close {
display: block;
width:50px;
height:50px;
box-sizing: border-box;
background: white;
color: black;
text-decoration: none;
position: absolute;
top: -80px;
right: 0;
-webkit-transition: .5s ease-in-out;
-moz-transition: .5s ease-in-out;
-o-transition: .5s ease-in-out;
transition: .5s ease-in-out;
}

/* Provides part of the "X" to eliminate an image from the close link */

a.lightbox-close:before {
content: "";
display: block;
height: 30px;
width: 1px;
background: black;
position: absolute;
left: 26px;
top:10px;
-webkit-transform:rotate(45deg);
-moz-transform:rotate(45deg);
-o-transform:rotate(45deg);
transform:rotate(45deg);
}

/* Provides part of the "X" to eliminate an image from the close link */

a.lightbox-close:after {
content: "";
display: block;
height: 30px;
width: 1px;
background: black;
position: absolute;
left: 26px;
top:10px;
-webkit-transform:rotate(-45deg);
-moz-transform:rotate(-45deg);
-o-transform:rotate(-45deg);
transform:rotate(-45deg);
}

/* Uses the :target pseudo-class to perform the animations upon clicking the .lightbox-target anchor */

.lightbox-target:target {
opacity: 1;
top: 0;
bottom: 0;
}

.lightbox-target:target img {
max-height: 100%;
max-width: 100%;
}

.lightbox-target:target a.lightbox-close {
top: 0px;
}

  </style>  
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

    <section class="section-hero overlay inner-page bg-image" style="position: sticky; background-image: url('images/hero_1.jpg'); height: 5px; background-repeat:auto; position: sticky;" id="home-section">   
    </section>
    <section style="background-image: url('../images/ban.jpg'); height:100px;">
     <div class="container">
      <br>
        <h1 style="text-align: center; color: white;">Search Result</h1>
      </div>
    </section>
    <br>
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
                            $imgdir= "../center/image/". $row['image'];
                            $id= $row['id'];
               ?>
               <table id="table">
                 <tr>
                  <td style="width:20%">
                    <a class="lightbox" href="#<?php echo $id;?>">
                  <img src="<?php echo $imgdir;?>"/>
                 </a>
                    <div class="lightbox-target" id ="<?php echo $id;?>">
                      <img src="<?php echo $imgdir;?>"/>
                      <a class="lightbox-close" href="#"></a>
                    </div>
                      <br>
                  <?php 
                  echo "<font size=\"5\" color=\"red\"><b>".$row['name']."</b></font><br>"
                  . "<font size=\"4\" color=\"blue\"><b>Age: </font></b>". $age. "<b> Years</b><br>"."<font size=\"4\" color=\"blue\"><b>Religion: </font></b>".$row['religion'].
                  "</td><td><font size=\"5\" color=\"blue\"><b>Center: </font></b><font size=\"5\">".$row['c_name'].
                  ".</font><br><font size=\"5\" color=\"blue\"><b>Email: </font></b><font size=\"5\">".$row['c_email']."</font><br><font size=\"5\" color=\"blue\"><b>Contact: </font></b><font size=\"5\">".$row['c_contact'].
                  "</font><br><font size=\"5\" color=\"blue\"><b>Address: </font></b><font size=\"5\">".$row['c_address']."</font></td></tr> 
              </table>";
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
