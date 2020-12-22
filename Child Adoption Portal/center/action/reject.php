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
      $id = $_REQUEST['id'];
      $sql = "UPDATE consult SET status='rejected' WHERE id='$id';";
      			mysqli_query($connect, $sql);
      			$alert= "Done succesfully";
              echo "<script type='text/javascript'>
              alert('$alert');
            window.location = '../consult.php';
              </script>";
               
     }
?>