<?php
 include_once("../include/database.php")
 ?>
 <?php
               $name=$_POST['name'];
               $email=$_POST['email'];
               $phone=$_POST['phone'];
                 $day=$_POST['day'];
                 $time=$_POST['time'];
                 $date=$_POST['date'];
                 $comment=$_POST['comment'];
                 $sql="INSERT INTO consult (name, phone, email, day, time, date, comment) VALUES('$name','$phone','$email', '$day','$time','$date','$comment');";
                 mysqli_query($connect, $sql);
              $alert= "Done succesfully";
              echo "<script type='text/javascript'>
              alert('$alert');
              window.location = '../consult.php';
              </script>";

            ?>