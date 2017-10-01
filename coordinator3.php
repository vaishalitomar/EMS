
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
<button onclick="topFunction()" id="myBtn" title="Go to top">&nbsp;^&nbsp;</button>
<!--
<form action=index2.php method="post">
<button  style="float: center;" type="logout" class="button3" name="logout" action="index2.php">logout</button>
</form>
-->
<div class="header">
<a href="http://www.akgec.in/" title="AKGEC WEBSITE" target="_blank"><img style="float: left;" src="images/akgeclogo.png"></a>
  <a href="logout.php" title="LOGOUT"><img class='imgpop' style="float: right;" src="images/lo.png"></a>
  <a  href = "coordinator_frontpage.php" title="HOME" ><img class='imgpop' style="float: right;" src="images/home2.png"></a>
 <div style="text-align: center;">
  <img  src="images/headerlogo.png">
  <h1 style="color: #00ABDC">EVENT MANAGEMENT SYSTEM</h1>
  </div>
</div>
<div class="welcome">Welcome Coordinator</div>
<div class="row">

<div class="requests">
  <div class="aside">
    <h1 style="color:green">APPROVED EVENTS</h1>
    
  </div>
</div>

<div style="overflow-x:auto;opacity: 0.8;padding: 20px;">
  
  
<?php
  
/*echo "<table border ='3'>
<tr>
<th>EVENT NAME</th>
<th>EVENT DATE</th>
<th>EVENT TIME</th>
<th>EVENT VENUE</th>

</tr>";*/

   
    
  
require('db_connection.php');
session_start();
if(isset($_SESSION["name"]))
{
  $query= "SELECT `event_name`,`event_date`,`event_timing`,`event_venue` FROM `event` WHERE `event_status`='granted'";
  $query1=mysqli_query($connection,$query);
  if($query1)
  {
    if($query1==true)
    {
      echo "<table border ='3'>
<tr>
<th>EVENT NAME</th>
<th>EVENT DATE</th>
<th>EVENT TIME</th>
<th>EVENT VENUE</th>

</tr>";
      $count=1;
    while($row=mysqli_fetch_array($query1))
    { 
      echo "<tr>"; 
  echo "<td>".$row['event_name']."</td>";
  echo "<td>".$row['event_date']."</td>";
  echo "<td>".$row['event_timing']."</td>";
  echo "<td>".$row['event_venue']."</td>";
 
     
     
         
          // echo "<table><tr>";
            $count=$count+1;
          
    }
    }
    else
    {
      echo 'no current event';
    }
  }
  else
  {
    echo 'error'.mysqli_error($connection);
  }
}
  

else
{
  header('location:login.php');
}
?>



    
    
     
    
    
  
</div>
</div>

<div class="footer">
  <p>Thank You</p>
</div>
<script src="js/emsjs.js">
</script>

</body>
</html>
