<?php

  if(isset($_SESSION["name"]))
{
  ?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>EMS-AKGEC</title>
<link rel="icon" href="images/logoic.ico">
    <link rel="stylesheet" type="text/css" href="css/emscss.css">

<style>
body{
       background: url("images/coodpgbg.jpg") no-repeat center fixed; 
       background-size: cover;
     }
</style>

</head>
<body>

<script >
var snd1= new Audio("sounds/welcomecood.mp3");
snd1.play();
</script>

<div class="header">
<a href="http://www.akgec.in/" title="AKGEC WEBSITE" target="_blank"><img style="float: left;" src="images/akgeclogo.png"></a>
  <a href="index2.php" title="LOGOUT"><img class='imgpop' style="float: right;" src="images/lo.png"></a>
  <a href = "coordinator1.html" title="HOME" ><img class='imgpop' style="float: right;" src="images/home2.png"></a>
 <div style="text-align: center;">
  <img  src="images/headerlogo.png">
  <h1 style="color: #00ABDC">EVENT MANAGEMENT SYSTEM</h1>
  </div>
</div>
<div class="welcome">Welcome Coordinator</div>
<div class="row">

<div class="requests">
  <div class="aside">
    <h1>EVENTS APPROVED</h1>
    <button onclick="location.href='coordinator3.php'" class="button">Check</button>
  </div>
</div>

<div class="requests">
  <div class="aside">
    <h1>NEW EVENT</h1>
    <button onclick="location.href='create_event.php'" class="button">Apply</button>
  </div>
</div>

<div class="requests">
  <div class="aside">
    <h1>UPLOAD CONTENT</h1>
    <button onclick="location.href='uploading.php'" class="button">Enter</button>
  </div>
</div>



<div class="requests">
  <div class="aside">
    <h1>VIEW STUDENT DETAIL</h1>
    <button onclick="location.href='view_student_detail.php'" class="button">Enter</button>
  </div>
</div>

<div class="requests">
  <div class="aside">
    <h1>ABORT EVENT</h1>
    <button onclick="location.href='abort2.php'" class="button">Enter</button>
  </div>
</div>

</div>
<div class="footer">
  <p>EMS AKGEC 2017</p>
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
