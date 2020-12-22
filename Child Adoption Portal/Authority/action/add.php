<?php
include "../include/database.php";
ini_set('session.cookie_lifetime', '600000');
session_start();
  if(!isset($_SESSION['username']) )
       {
         header('Location: index.php');
       }
       else
       {
       $child=$_REQUEST['child'];
       $center=$_REQUEST['center'];
       $user=$_REQUEST['user'];
       $sql="INSERT INTO adoption(user_id, center_id, child_id) VALUES('$user','$center','$child');";
                 mysqli_query($connect, $sql);
       $sql="UPDATE child SET status = 'Adopted' WHERE id = '$child' ;";
                 mysqli_query($connect, $sql);
                $alert= "Done succesfully";
              echo "<script type='text/javascript'>
              alert('$alert');
            window.location = '../Home.php';
              </script>";

       }
?>