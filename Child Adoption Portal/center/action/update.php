<?php
 include_once("../include/database.php")
 ?>
 <?php
               session_start();
               $username = $_SESSION['username'];
               $name = $_POST['name'];
               $email = $_POST['email'];
               $area = $_POST['area'];
               $contact = $_POST['contact'];
               $address = $_POST['address'];
               $lat = $_POST['latitude'];
               $longi = $_POST['longitude'];
                 $sql="UPDATE centers SET name = '$name', area = '$area', address ='$address', contact ='$contact', email ='$email', lat='$lat', longitude='$longi' WHERE username = '$username' ;";
                 mysqli_query($connect, $sql);
                $alert= "Done succesfully";
              echo "<script type='text/javascript'>
              alert('$alert');
            window.location = '../Home.php';
              </script>";

            ?>