<?php
 include_once("../include/database.php")
 ?>
 <?php
               $email=$_POST['email'];
                $name=$_POST['name'];
                 $msg=$_POST['subject'];
                 $sql="INSERT INTO messages (email, name, msg) VALUES('$email','$name','$msg');";
                 mysqli_query($connect, $sql);
              $alert= "Done succesfully";
              echo "<script type='text/javascript'>
              alert('$alert');
              window.location = '../contact.php';
              </script>";

            ?>