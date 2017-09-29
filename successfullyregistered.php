<?php
require('db_connection.php')
session_start();
if(isset($_SESSION["name"]))
{
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>EMS-AKGEC</title>
<link rel="icon" href="images/icon.ico">
    <link rel="stylesheet" type="text/css" href="css/emscss.css">
<style>
body{
       background: url("images/adminpgbg.jpg") no-repeat center fixed; 
       background-size: cover;
     }
</style>
</head>

<script>
window.onload= function() {
    modal.style.display = "block";
}
</script>
<body>


<button onclick="topFunction()" id="myBtn" title="Go to top">&nbsp;^&nbsp;</button>


<div class="header">
<a href="http://www.akgec.in/" target="_blank"><img style="float: left;" src="images/akgeclogo.png"></a>
  <a ><img class='imgpop' style="float: right;" src="images/lo.png"></a>
  <a href="index.html" title="HOME" ><img class='imgpop' style="float: right;" src="images/home2.png"></a>
  <div style="text-align: center;">
  <img class='imgpop' src="images/headerlogo.png">
  <h1 style="color: #00ABDC">EVENT MANAGEMENT SYSTEM</h1>
  </div>
</div>
<div class="row">
<div style="text-align: center;">
<br><br>


<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <span class="close">&times;</span>
      <h1 style="font-color:red; text-align: center; font-size:25px">Successfull</h1>
      <!-- change here -->
      <a href="admin1.html"><button style="float: center;" type="back" class="button3" >Go Back</button></a>

    </div>
  </div>

</div>
<br>
</div>
</div>
<h4 style="text-align: center; color: white">*For mobile users best result on landscape mode</h4>
<div class="footer">
  <p>Thank You</p>
</div>
<script src="js/emsjs.js">
</script>
</body>
</html>
<?php
}
else
header('location:index.php');
?>