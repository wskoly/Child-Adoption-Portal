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
  $opt_name="";
  $id=0;
  if(isset($_GET['load']))
    {
      if(isset($_COOKIE['opt']))
      {
        $id=$_COOKIE['opt'];
        $opt_name = $_COOKIE['name'];
      }
    }
  $sql = "SELECT id, name FROM centers;";
  $result = mysqli_query($connect, $sql);
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Consult</title>
    <script type="text/javascript">
      function getOpt(){
      var sel = document.getElementById('center');
      var opt = sel.options[sel.selectedIndex];
      console.log( opt.value );
      console.log( opt.text );
      var value= opt.value;
      var name= opt.text;
      document.cookie = "opt = " + value;
      document.cookie = "name = " + name;
      }
    </script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="Free-Template.co" />
    <link rel="shortcut icon" href="ftco-32x32.png">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <script src="js/jquery-1.12.4.js"></script>

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
              <li><a href="Home.php">Home</a></li>
              <li><a href="center.php" > Adoption Centers</a></li>
              <li class="has-children">
                <a class="nav-link active">Services</a>
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

    <section class="section-hero overlay inner-page bg-image" style="background-image: url('images/hero_1.jpg'); height: 5px; background-repeat:auto; background-attachment: sticky;" id="home-section">   
    </section>
    <section style="background-image: url('../images/ban.jpg'); height:100px;">
     <div class="container">
      <br>
        <h1 style="text-align: center;color: white;">Search Center By Area</h1>
      </div>
    </section> <br>
    <div style="width: 980px; margin: 0 auto; overflow: hidden;">
        <div style="float: left; width: 80%;"></div>
        <div style="float: right; width: 20%;"></div>
         <form action="#" method="GET">
      <label><b>Centers:</b></label>
    <select id="center" name="center" onchange="getOpt();" style="width:80%;">
     <?php
      while($row=mysqli_fetch_assoc($result))
           {
      ?>
      <option value="" hidden required>Select Center</option>
      <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?> </option>
     <?php     
           }
     ?>
    </select>
    <input type="submit" name="load" value="load"> 
    </form>
    <?php
    if($id !=0)
       {
      echo "<form action=\"action/consult.php\" method=\"POST\">".
      "<label><b>".$opt_name.":  </b></label>".
      "<input id=\"date\" name=\"date\" data-provide=\"datepicker\" readonly placeholder=\"Select Date For Appointment\"><br><br>
      <input type=\"submit\" value=\"Submit\"> 
      <input type=\"reset\" value=\"Reset\">
  </form>";
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
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

</body>
</html>
  <script type="text/javascript">
    var unavailableDates = [];
    <?php
    $sql = "SELECT date FROM consult WHERE center_id = '$id' AND status !='rejected';";
    $result= mysqli_query($connect,$sql);
    $num= mysqli_num_rows($result);
    if($num>0){
        $i=0;
    while($row=mysqli_fetch_assoc($result)){
      ?>  
  
     unavailableDates.push("<?php echo $row['date']; ?>") ;
      <?php
       $i++;
         }
       }
    ?>
    function unavailable(date) {
        dmy = date.getFullYear() + "-" + ('0'+(date.getMonth()+1)).slice(-2) + "-" + ('0'+(date.getDate())).slice(-2);
        if ($.inArray(dmy, unavailableDates) == -1) {
            return [true, ""];
        } else {
            return [false, "", "Unavailable"];
        }
    }

    $(function() {
        $("#date").datepicker({
            minDate: 0,
            dateFormat: 'yy m d',
            beforeShowDay: unavailable
        });

    });
</script>