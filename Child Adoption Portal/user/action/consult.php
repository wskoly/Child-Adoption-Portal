<?php
 include_once("../include/database.php")
 ?>
 <?php
 session_start();
                 $date=str_replace(" ", "-", $_POST['date']);;
                 $status="pending";
                 $u_id=$_SESSION['id'];
                 $c_id=$_COOKIE['opt'];
                 $sql="SELECT * FROM consult WHERE user_id='$u_id' AND center_id='$c_id' AND status='pending' ;";
                 $result= mysqli_query($connect,$sql);
                 $num= mysqli_num_rows($result);
                 echo $num;
                 if($num == 0)
                    {
                      $sql="INSERT INTO consult (date, status, user_id, center_id) VALUES('$date','$status','$u_id', '$c_id');";
                       mysqli_query($connect, $sql);
                       $alert= "Done succesfully";
                       echo "<script type='text/javascript'>
                       alert('$alert');
                       window.location = '../Home.php';
                       </script>";
                    }
                    else
                      {
                         $alert= "You already have an appoinment pending";
                         echo "<script type='text/javascript'>
                         alert('$alert');
                         window.location = '../Home.php';
                         </script>";
                      }
            ?>
