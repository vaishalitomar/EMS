<?php
 include('db_connection.php');
$error=''; // Variable To Store Error Message
session_start();

if (isset($_POST['submit'])) 
{
if (empty($_POST['uname']) || empty($_POST['psw']))
 {
$error = "Username or Password is invalid";

}
else
{
// Define $username and $password
$designation=$_POST['person'];
$username=mysqli_real_escape_string($connection, $_POST['uname']);
$password=mysqli_real_escape_string($connection, $_POST['psw']);
}
$_SESSION["name"]=$username;
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
if($designation=="2")
{
 $query = mysqli_query($connection,"SELECT * from login where password='$password'AND username='$username' AND designation='2'");
$rows = mysqli_num_rows($query);
if ($rows == 1 ) {
 
header("location: registration1.php"); // Redirecting To Other Page
}
}
if($designation=="0")
{
$query = mysqli_query($connection,"SELECT * from login where password='$password'AND username='$username' AND designation='0'");
$rows = mysqli_num_rows($query);
if ($rows == 1 ) {
 
header("location: society.php"); // Redirecting To Other Page
}
}
if($designation=="1")
{
$query = mysqli_query($connection,"SELECT * from login where password='$password' AND username='$username' AND designation='1'");
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