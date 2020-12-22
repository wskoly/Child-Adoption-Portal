<?php
     ini_set('session.cookie_lifetime', '600000');
     session_start();
     $_SESSION['email'] = $_POST['email'];
     $_SESSION['pwd'] = $_POST['psw'];
     echo $_POST['email'];
     echo $_COOKIE['email'];
     if($_POST['login'] == "0")
       header("Location: user_login.php");
     else if($_POST['login'] == "1")
       header("Location: c_login.php");
     else
         echo "error occured"; 
 ?>