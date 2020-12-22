<?php
 include_once("../include/database.php")
 ?>
 <?php
                 $admin=$_POST['admin'];
                 $psw=$_POST['psw'];
                 $sql="SELECT * FROM admin WHERE userName='$admin';";
                 $result= mysqli_query($connect, $sql)
                 or die("failed to query".mysqli_error());
                 $row = mysqli_fetch_array($result);
                 if($row['userName'] == $admin && $row['password'] == $psw){
                  $alert= "log-in succesfull";
                  echo "<script type='text/javascript'>
              alert('$alert');
              window.location = '../admin/panel.php';
              </script>";
                 }

                else{
                  $alert= "password or User name did not match";
                   echo "<script type='text/javascript'>
              alert('$alert');
              window.location = '../admin/home.php';
              </script>";
                }

            ?>