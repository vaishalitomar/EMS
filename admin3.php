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
<link rel="icon" href="images/logoic.ico">
    <link rel="stylesheet" type="text/css" href="css/emscss.css">
<style>
body{
       background: url("images/adminpgbg.jpg") no-repeat center fixed; 
       background-size: cover;
     }
     td{
      table-layout: fixed;
      width: 60px;
     }
     th{
      table-layout: fixed;
      width: 60px;
       }
       table
       {
        table-layout: fixed;
       }
</style>
</head>
<body>

<button onclick="topFunction()" id="myBtn" title="Go to top">&nbsp;^&nbsp;</button>
<div class="header">
<a href="http://www.akgec.in/" title="AKGEC WEBSITE" target="_blank"><img style="float: left;" src="images/akgeclogo.png"></a>
  <a href="index2.php" title="LOGOUT"><img class='imgpop' style="float: right;" src="images/lo.png"></a>
  <a title="HOME" ><img class='imgpop' style="float:right;" src="images/home2.png"></a>
  <div style="text-align: center;">
  <img src="images/headerlogo.png">
  <h1 style="color: #00ABDC">EVENT MANAGEMENT SYSTEM</h1>
  </div>
</div>
<div class="welcome">Welcome Admin</div>
<div class="row">

<form action="search.php" method="post">
      <input style="margin-left: 30%; width: 40%" type="text" name="search" id="textdeco" placeholder="search for any event name here"  pattern="^[a-zA-Z]{1,40}$" />
      <button type="submit" id="btn" class="button3" name="search1">Search</button>
    </form>

<div class="requests">
  <div class="aside">
    <h1>CURRENT REQUESTS</h1>
    
  </div>
</div>
<br><br>

<div style="overflow-x:auto;opacity: 0.8;padding: 20px;" class="box-body table-responsive no-padding">
  <table>
    <tr>
      <th>Event ID</th>
      <th>Event Name</th>
      <th>Society Name</th>
      <th>Coordinator Name</th>
      <th>Event date time</th>
      <th>Event Venue</th>
      <th style="color: red;">Status</th>
    </tr>
    <form action="add.php" method="post">

    <?php

$query0 = mysqli_query($connection,"SELECT * FROM `event`");


      $rows = mysqli_num_rows($query0);

      while($rows>0)
      {
        
 
         $row = mysqli_fetch_array($query0);
    echo "<table><tr>";
        $s=$row['society_id'];
        $query1=mysqli_query($connection, "SELECT * FROM society WHERE society_id=$s");
        $row1=mysqli_fetch_array($query1);
        $socname=$row1['society_name'];
        $query2=mysqli_query($connection, "SELECT * FROM coordinator WHERE society_id=$s");
        $row2=mysqli_fetch_array($query2);
        $codname=$row2['coordiantor_name'];
          echo"<td>"  . $row['event_id']."</td>"."<td>" . $row['event_name']."</td> "."<td>".$socname."</td>"."<td>".$codname."</td>". $row['event_category']."</td>"."<td>".$row['event_date']."</td>"."<td>".$row['event_venue']."</td>";
          $k=$row['event_id'];
          ?>

          
<td>
          <select name="status[]" required="required">
          <option value='1'><?php $query1 = mysqli_query($connection,"SELECT event_status FROM `event` where event_id=$k"); 
              $row1 = mysqli_fetch_array($query1); if($row1['event_status']=='pending'){echo"pending"; $s="pending";}if($row1['event_status']=='granted'){echo"approve"; $s="granted";}if($row1['event_status']=='cancelled'){echo"cancel";$s="cancelled";}?></option>
          <option value='pending'>Pending</option>
          <option value='granted'>Approve</option>
           <option value='cancelled'>Cancel</option> 
           </select>
           
           </td>
    <?php

        $rows=$rows-1;
         echo"</tr></table>";
        
      }


?>
    </tr>
    
  </table>
</div>
<div style="text-align: center;">
<br><br>
<button style="float: center" type="submit" id="btn" class="button2" name="submit1">Save</button>




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
else{
  header('location:index.php');
}
?>