<?php
require('db_connection.php');
session_start();
if(isset($_SESSION["name"]))
{
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>EMS-AKGEC</title>
    <link rel="stylesheet" type="text/css" href="css/emscss.css">
<style>
body{
       background: url("images/adminpgbg.jpg") no-repeat center fixed; 
       background-size: cover;
     }
</style>
</head>
<body>

<script >
var snd1= new Audio("sounds/welcomeadmin.mp3");
snd1.play();
</script>

<div class="header">
<a href="http://www.akgec.in/" target="_blank"><img style="float: left;" src="images/akgeclogo.png"></a>
  <a href="index2.php"><img class='imgpop' style="float: right;" src="images/lo.png"></a>
  <a href= title="HOME" ><img class='imgpop' style="float: right;" src="images/home2.png"></a>
  <h1 style="text-align: center;" >EVENT MANAGEMENT SYSTEM</h1>
</div>
<div class="welcome">Welcome Admin</div>
<div class="row">

<div class="requests">
  <div class="aside">
    <h1>REQUESTS SECTION</h1>
    <button onclick="location.href='admin3.php'" class="button">Requests</button>
  </div>
</div>

<div class="requests">
  <div class="aside">
    <h1>NEW SOCIETY</h1>
    <button onclick="location.href='society_registration.php'" class="button">New Society</button>
  </div>
</div>

</div>
</body>
</html>
<?php
}
else
{
  header('location:index.php');
}
?>