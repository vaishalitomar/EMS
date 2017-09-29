<?php

$host="localhost";
$username1="root";
$password1="";
$database="ems1";
$connection=mysqli_connect($host,  $username1, $password1, $database);
if (!$connection)
 {
   echo "not";
 }
?>