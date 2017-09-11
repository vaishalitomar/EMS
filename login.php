<?php
 include('db_connection.php');
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
$username=mysqli_real_escape_string($connection, $_POST['username']);
$password=mysqli_real_escape_string($connection, $_POST['password']);

}

// Establishing Connection with Server by passing server_name, user_id and password as a parameter
if($d=="2")
{
 $query = mysqli_query($connection,"select * from login where password='$password'AND username='$username' AND designation='2'");
$rows = mysqli_num_rows($query);
if ($rows == 1 ) {
 

header("location: superadmin.html"); // Redirecting To Other Page
}
}
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

?>
