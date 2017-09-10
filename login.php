<?php
 
$error=''; // Variable To Store Error Message
if (isset($_POST['submit'])) 
{
if (empty($_POST['username']) || empty($_POST['password']))
 {
$error = "Username or Password is invalid";
}
else
{
// Define $username and $password
$d=$_POST['desn'];
$username=test_input($_POST['username']);
$password=test_input($_POST['password']);

}

// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$connection = mysql_connect("localhost", "root","1234");


// Selecting Database 
$db = mysql_select_db("ems1", $connection);

if($d=="0")
{
$query = mysql_query("select * from login where password='$password' AND username='$username' AND designation='0'", $connection);
$rows = mysql_num_rows($query);
if ($rows == 1 ) {
 

header("location: admin.html"); // Redirecting To Other Page
}
}
if($d=="1")
{
$query = mysql_query("select * from login where password='$password' AND username='$username' AND designation='1'", $connection);
$rows = mysql_num_rows($query);
if ($rows == 1 ) {
 

header("location: coordinator.php"); 	
}
}
else 
{
$error = "Username or Password is invalid";
}
mysql_close($connection); // Closing Connection
}
function test_input($data) 
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>