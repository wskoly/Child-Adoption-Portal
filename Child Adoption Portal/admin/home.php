<?php
     include "../include/database.php";
     if(isset($_POST['log-in']))
            {
              session_start();
              $_SESSION['admin'] = $_POST['admin'];
                 $admin=$_POST['admin'];
                 $psw=$_POST['psw'];
                 $sql="SELECT * FROM admin WHERE userName='$admin';";
                 $result= mysqli_query($connect, $sql)
                 or die("failed to query".mysqli_error());
                 $row = mysqli_fetch_array($result);
                 if($row['userName'] == $admin && $row['password'] == $psw)
                 {
                  $alert= "log-in succesfull";
                  echo "<script type='text/javascript'>
                  alert('$alert');
                  window.location = 'panel.php';
                  </script>";
                 }

                else
                {
                  $alert= "password or User name did not match";
                   echo "<script type='text/javascript'>
              alert('$alert');
              window.location = 'home.php';
              </script>";
                }
           }
            ?>
<!DOCTYPE html>
<html>
<head>
  <title>About</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="../css/new.css" media="screen" />
</head>
<body>
  <div style="width: 980px; margin: 0 auto; overflow: hidden;">
    <div style="float: left; width: 80%;"></div>
    <div style="float: right; width: 20%;"></div>

<div class="bg-img">
  </div>
<form action="" method="POST">
  <div class="container" align="middle" >
    <h1>Admin Log-in</h1>
    <hr>

    <label for="admin" align="left"><b>Username</b></label><br>
    <input type="text" placeholder="Enter User name" name="admin" required>
    <br>
    <label for="psw"><b>Password</b></label><br>
    <input type="password" placeholder="Enter Password" name="psw" required>
    <br>
    <input type="submit" name="log-in" value="Log-in">
    <hr>
  </div>
  
</form>
</div>
</body>
</html>
