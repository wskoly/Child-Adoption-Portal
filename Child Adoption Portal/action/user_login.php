<?php
 include_once("../include/database.php")
 ?>
 <?php
               ini_set('session.cookie_lifetime', '600000');
               session_start();
               $_SESSION['email']=$_POST['email'];
                 $email= $_SESSION['email'];
                 $psw= $_POST['psw'];
                 $sql="SELECT * FROM users WHERE email='$email';";
                 $result= mysqli_query($connect, $sql)
                 or die("failed to query".mysqli_error());
                 $row = mysqli_fetch_array($result);
                 if($row['email'] == $email && $row['password'] == base64_encode($psw)){
                  
                  //ini_set('session.gc-maxlifetime', 60 * 60 * 24 * 365);
                  
                  echo "<script type='text/javascript'>
              window.location = '../user/Home.php';
              </script>"; 
                 }

                else{
                  $alert= "password or email did not match";
                   echo "<script type='text/javascript'>
              alert('$alert');
              window.location = '../login.php';
              </script>";
                }

            ?>