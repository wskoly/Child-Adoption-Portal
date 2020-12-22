<?php
$dbServername="localhost";
$dbUsername="root";
$dbPassword="";
$dbName="cap";

$connect= mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
function getAge($userDob)
         {
         	$dob = new DateTime($userDob);
         	$time = new DateTime();
         	$difference = $time -> diff($dob);
         	$age = $difference ->y;
         	return $age;
         }  

?>