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
$connection = mysqli_connect("localhost", "root","1234");
 if(mysqli_connect_errno())
 {
  echo "failed to connect to mysql:" . mysqli_connect_errno();
 }


// Selecting Database 
$db = mysqli_select_db($connection, "ems1");

if($d=="0")
{
$query = mysqli_query($connection,"select * from login where password='$password'AND username='$username' AND designation='0'");
$rows = mysqli_num_rows($query);
if ($rows == 1 ) {
 

header("location: admin.html"); // Redirecting To Other Page
}
}
if($d=="1")
{
$query = mysqli_query($connection,"select * from login where password='$password' AND username='$username' AND designation='1'");
$rows = mysqli_num_rows($query);
if ($rows == 1 ) {
 

header("location: coordinator.php"); 	
}
}
else 
{
$error = "Username or Password is invalid";
}
mysqli_close($connection); // Closing Connection
}
function test_input($data) 
{
  $data = mysqli_real_escape_string($connection, $_POST['data']);
  return $data;
}
?>
