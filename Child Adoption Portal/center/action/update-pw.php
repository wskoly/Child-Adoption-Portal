<?php
 include_once("../include/database.php")
 ?>
 <?php
          if($_POST['psw-n'] == $_POST['psw-r'])
               {
                 session_start();
                 $username = $_SESSION['username'];
                  $pwd = $_SESSION['password'];
                  $pwdO = base64_encode($_POST['psw-o']);
                  $pwdN=base64_encode($_POST['psw-n']);
                  if( $pwdO == $pwd)
                      {
                         $sql="UPDATE centers SET password ='$pwdN' WHERE username = '$username' ;";
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