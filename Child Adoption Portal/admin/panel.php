<?php
include "../include/database.php";
 session_start();
   if(!isset($_SESSION['admin']) )
       {
         header('Location: home.php');
       }
  else
      {
        $sql = "SELECT * FROM `child` ;";
         $result = mysqli_query($connect, $sql);
         $child= mysqli_num_rows($result);
         $male = 0;
         $female = 0;
         $age0= 0;
         $age5= 0;
         $age10= 0;
         $age15= 0;
         $islam =0;
         $hindu = 0;
         $chris = 0;
         $buddh = 0;
         $other = 0;
         while ($row=mysqli_fetch_array($result))
         {
          $age=getAge($row['birth']);
          if($row['gender']=='male')
            $male++;
          elseif($row['gender']=='female')
            $female++;
             if($age>=0 && $age<5) 
              $age0 ++;
             elseif($age>=5 && $age<10) 
             $age5 ++;
             elseif($age>=10 && $age<15) 
             $age10 ++;
             else
             $age15 ++; 
               if($row['religion']=='Islam')
                $islam++;
               elseif($row['religion']=='Christian')
                $chris++;
               elseif($row['religion']=='Hindu')
                $hindu++;
               elseif($row['religion']=='Buddhist')
                $buddh++;
                else
                  $other++;
                }
                $sql = "SELECT * FROM `centers` Where area = 'Dhaka';";
         $result = mysqli_query($connect, $sql);
           $dhaka= mysqli_num_rows($result);

           $sql = "SELECT * FROM `centers` Where area = 'Khulna';";
         $result = mysqli_query($connect, $sql);
           $khulna= mysqli_num_rows($result);

           $sql = "SELECT * FROM `centers` Where area = 'Chittagong';";
         $result = mysqli_query($connect, $sql);
           $chitt= mysqli_num_rows($result);

           $sql = "SELECT * FROM `centers` Where area = 'Barishal';";
         $result = mysqli_query($connect, $sql);
           $baris= mysqli_num_rows($result);

           $sql = "SELECT * FROM `centers` Where area = 'Rajshahi';";
         $result = mysqli_query($connect, $sql);
           $raj= mysqli_num_rows($result);

           $sql = "SELECT * FROM `centers` Where area = 'Rangpur';";
         $result = mysqli_query($connect, $sql);
           $rangpur= mysqli_num_rows($result);

           $sql = "SELECT * FROM `centers` Where area = 'Sylhet';";
         $result = mysqli_query($connect, $sql);
           $sylhet= mysqli_num_rows($result);

           $sql = "SELECT * FROM `centers` Where area = 'Jashore';";
         $result = mysqli_query($connect, $sql);
           $jess= mysqli_num_rows($result);

          $sql = "SELECT * FROM `centers` Where area = 'Cumilla';";
         $result = mysqli_query($connect, $sql);
           $cum= mysqli_num_rows($result);

          $sql = "SELECT * FROM `centers` Where area = 'Mymenshing';";
         $result = mysqli_query($connect, $sql);
           $mymen= mysqli_num_rows($result);

           $sql = "SELECT * FROM `centers` Where area = 'Faridpur';";
         $result = mysqli_query($connect, $sql);
           $farid= mysqli_num_rows($result);
       
      }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Dashboard</title>
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
                <li><a href="panel.php"class="nav-link active">Dashboard</a></li>
				<li>  <a href="users.php">Users</a></li>
				<li>  <a href="center.php">Adoption Centers</a> </li>
				<li>   <a href="child.php">Child</a></li>
				<li>   <a href="message.php">Messages</a></li>
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
        <h1 style="text-align: center; color: white;">Admin Dashboard</h1>
      </div>
    </section>
<br> <br>
  <div class="container">
    <h2 align="middle"><b>Current Stats</b></h2>
      <div id="chartContainer" style="height: 300px; width: 100%;"></div><br>
      <div id="chartContainer1" style="height: 300px; width: 50%; float:right;"></div><br>
      <div id="chartContainer2" style="height: 300px; width: 50%;"></div> <br><br>
      <div id="chartContainer3" style="height: 300px; width: 100%;"></div>
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
<script type="text/javascript">
  var chart = new CanvasJS.Chart("chartContainer",
  {
    theme: "light2",
    title:{
      text: "Centers By Area"
    },    
    data: [
    {       
      type: "pie",
      showInLegend: true,
      toolTipContent: "{y} - #percent %",
      yValueFormatString: "## Centers",
      legendText: "{indexLabel}",
      dataPoints: [
        {  y: <?php echo $dhaka;?>, indexLabel: "Dhaka" },
        {  y: <?php echo $khulna;?>, indexLabel: "Khulna" },
        {  y: <?php echo $raj;?>, indexLabel: "Rajshahi" },
        {  y: <?php echo $rangpur;?>, indexLabel: "Rangpur" },
        {  y: <?php echo $baris;?>, indexLabel: "Barishal" },
        {  y: <?php echo $chitt;?>, indexLabel: "Chittagong" },
        {  y: <?php echo $cum;?>, indexLabel: "Cumilla" },
        {  y: <?php echo $jess;?>, indexLabel: "Jashore" },
        {  y: <?php echo $sylhet;?>, indexLabel: "Sylhet" },
        {  y: <?php echo $mymen;?>, indexLabel: "Mymenshing" },
        {  y: <?php echo $farid;?>, indexLabel: "Faridpur" }
      ]
    }
    ]
  });
  chart.render();
  var chart1 = new CanvasJS.Chart("chartContainer1",
  {
    theme: "light2",
    title:{
      text: "Child: Male-Female"
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
      text: "Child By Age"
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
      text: "Child By Religion"
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
