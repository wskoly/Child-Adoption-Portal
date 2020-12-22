<?php
 include_once("../include/database.php")
 ?>
 <?php
          if($_POST['psw-n'] == $_POST['psw-r'])
               {
                 session_start();
                 $email = $_SESSION['email'];
                  $pwd = $_SESSION['password'];
                  $pwdO = base64_encode($_POST['psw-o']);
                  $pwdN=base64_encode($_POST['psw-n']);
                  if( $pwdO == $pwd)
                      {
                         $sql="UPDATE users SET password ='$pwdN' WHERE email = '$email' ;";
                         mysqli_query($connect, $sql);
                           $alert= "Done succesfully";
                         echo "<script type='text/javascript'>
                           alert('$alert');
                         window.location = '../Home.php';
                           </script>";
                      }
                      else
                      {
                         $alert= "Please enter correct password";
                         echo "<script type='text/javascript'>
                           alert('$alert');
                         window.location = '../pwd.php';
                           </script>";
                      }
            }
            else
                      {
                         $alert= "New password and repeat password did not match";
                         echo "<script type='text/javascript'>
                           alert('$alert');
                         window.location = '../pwd.php';
                           </script>";
                      }

            ?>