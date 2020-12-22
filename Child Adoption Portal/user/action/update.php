<?php
 include_once("../include/database.php")
 ?>
 <?php
               session_start();
               $email = $_SESSION['email'];
               //echo $email;
               $name=$_POST['name'];
               $birth=$_POST['birth'];
               $contact=$_POST['contact'];
                 $city=$_POST['city'];
                 $address=$_POST['address'];
                 $sql="UPDATE users SET name = '$name', birth = '$birth', city ='$city', address ='$address', contact ='$contact' WHERE email = '$email' ;";
                 mysqli_query($connect, $sql);
                $alert= "Done succesfully";
              echo "<script type='text/javascript'>
              alert('$alert');
            window.location = '../Home.php';
              </script>";

            ?>