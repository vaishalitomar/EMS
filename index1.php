

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
 
header("location: admin1.html"); // Redirecting To Other Page
}
}
if($designation=="1")
{
$query = mysqli_query($connection,"SELECT * from login where password='$password' AND username='$username' AND designation='1'");
$rows = mysqli_num_rows($query);
if ($rows == 1 ) {
 
header("location: coordinator1.html");  
}
}
else 
{
$error = "Username or Password is invalid";
}
mysqli_close($connection); // Closing Connection
}
?>


<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>EMS-AKGEC</title>
    <link rel="stylesheet" type="text/css" href="css/emscss.css">

<style>
body{
       background: url("images/homepgbg.jpg") no-repeat center fixed; 
       background-size: cover;
     }
</style>

</head>

<body>
<div class="header">
<a href="http://www.akgec.in/" target="_blank"><img style="float: left;" src="images/akgeclogo.png"></a>
  <h1 style="opacity: 1;">Event Management system</h1>
</div>

<div class="row">

<div class="slideimg">
<img src="images/Sample01.png"></div>

<div class="col-3a">
  <div class="aside">
      <h1>Students</h1>
    <button onclick="location.href='RegForm.html'" class="button">Registration</button>
  </div>
</div>

<div class="col-3a">
  <div class="aside">
    <h1 style="font-size:25px">Login</h1>

    <form action="" method="post">
    <input type="radio" name="person" value="0">Admin<br><input type="radio" name="person" value="1">Coordinator<br><input type="radio" name="person" value="2">superadmin<br>
    <label><p style="text-align: left;"><b>Username</b><p></label>
    <input type="text" placeholder="Enter Username" name="uname" required>
    <label><p style="text-align: left;"><b>Password</b><p></p></label>
    <input type="password" placeholder="Enter Password" name="psw" required>
    <input  name="submit" type="submit" value="Login">
    </form>
  </div>
</div>

</div>

<div class="footer">
  <p>Thank You</p>
</div>

</body>
</html>
