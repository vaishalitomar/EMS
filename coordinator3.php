
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>EMS-AKGEC</title>
    <link rel="stylesheet" type="text/css" href="css/emscss.css">

<style>
body{
       background: url("images/coodpgbg.jpg") no-repeat center fixed; 
       background-size: cover;
     }
</style>

</head>

<body>
<div class="header">
<form action=index2.php method="post">
<button  style="float: center;" type="logout" class="button3" name="logout" action="index2.php">logout</button>
</form>
<a href="http://www.akgec.in/" target="_blank"><img style="float: left;" src="images/akgeclogo.png"></a>
  <h1>Event Management system</h1>
</div>
<div class="welcome">Welcome Coordinator</div>
<div class="row">
<div class="register">
  <div class="aside">
    <h1>STATUS:</h1>
    <h2 style="color: blue">PENDING</h2>
    <h2 style="color: green" >ACTIVE</h2>
    <h2 style="color: red" >CANCELLED</h2>
    
  </div>
</div>
<div style="overflow-x:auto;opacity: 0.8;padding: 20px;">
  <table>
  
<?php
  
echo "<table border ='3'>
<tr>
<th>EVENT NAME</th>
<th>EVENT DATE</th>
<th>EVENT TIME</th>
<th>EVENT VENUE</th>

</tr>";

   
    
  
require('db_connection.php');
session_start();
if(isset($_SESSION["name"]))
{
  $query= "SELECT `event_name`,`event_date`,`event_timing`,`event_venue` FROM `event` WHERE `event_status`='granted'";
  $query1=mysqli_query($connection,$query);
  if($query1)
  {
    if(mysqli_num_rows($query1)>=1)
    {
      $count=1;
    while($row=mysqli_fetch_array($query1))
    { 
      echo "<tr>"; 
  echo "<td>".$row['event_name']."</td>";
  echo "<td>".$row['event_date']."</td>";
  echo "<td>".$row['event_timing']."</td>";
  echo "<td>".$row['event_venue']."</td>";
 
     
     
          $count=$count+1;
           echo "<table><tr>";
          
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


</table>
    
    
     
    
    
  </table>
</div>
</div>

<div class="footer">
  <p>Thank You</p>
</div>

</body>
</html>
