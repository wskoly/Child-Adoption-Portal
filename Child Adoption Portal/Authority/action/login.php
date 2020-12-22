<?php
 include "../include/database.php";
 ?>
 <?php
               ini_set('session.cookie_lifetime', '600000');
               session_start();
                 $_SESSION['username']= $_POST['username'];
                 $username = $_SESSION['username'];
                 $psw= $_POST['pwd'];
                 $sql="SELECT * FROM authority WHERE username='$username';";
                 $result= mysqli_query($connect, $sql)
                 or die("failed to query".mysqli_error());
                 $row = mysqli_fetch_array($result);
                 if($row['username'] == $username && $row['password'] == base64_encode($psw)){
                  
                  echo "<script type='text/javascript'>
                          window.location = '../Home.php';
                       </script>"; 
                 }

                else
                {
                  $alert= "password or email did not match";
                   echo "<script type='text/javascript'>
              alert('$alert');
              window.location = '../index.php';
              </script>";
                }

            ?>