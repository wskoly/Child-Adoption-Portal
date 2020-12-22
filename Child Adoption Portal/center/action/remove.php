<?php
include "../include/database.php";
ini_set('session.cookie_lifetime', '600000');
session_start();
  if(!isset($_SESSION['username']) )
       {
         header('Location: ../../login.php');
       }
  else
     {
      $username= $_SESSION['username'];
      $c_id = $_SESSION['id'];
      $id = $_REQUEST['id'];
      $sql= "SELECT image FROM child WHERE id ='$id';";
      $result=mysqli_query($connect, $sql);
      $row=mysqli_fetch_assoc($result);
      $image=$row['image'];
      $file = "../image/".$image;
      unlink($file);
      $sql = "DELETE FROM child WHERE id='$id';";
      			mysqli_query($connect, $sql);
      			$alert= "Done succesfully";
              echo "<script type='text/javascript'>
              alert('$alert');
            window.location = '../update.php';
              </script>";
               
     }
?>