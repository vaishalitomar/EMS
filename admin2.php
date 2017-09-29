<?php
require('db_connection.php');
include('search.php');
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
<div class="header">
<a href="http://www.akgec.in/" target="_blank"><img style="float: left;" src="images/akgeclogo.png"></a>
  <h1>Event Management system</h1>
</div>
<div class="welcome">Welcome Admin</div>
<div class="row">

<div class="requests">
  <div class="aside">
    <h1>Current Requests:</h1>
    <h4 style="color: red">*For mobile users best result on landscape mode</h4>
  </div>
</div>
<br><br>
<div style="overflow-x:auto;opacity: 0.8;padding: 20px;">
  <table>
    <tr>
      <th>Event ID</th>
      <th>Event Name</th>
      <th>Society Name</th>
      
      <th>Event type</th>
      <th>Event date</th>
      
      <th>Event Venue</th>
      <th style="color: red;">Status</th>
    </tr>
    <form action="add.php" method="post">
    <?php

$query = mysqli_query($connection,"SELECT * FROM `co-ordinator`");
echo mysqli_errno($connection).":".mysqli_error($connection);

      $rows = mysqli_num_rows($query);

      while($rows>0)
      {
        
 
         $row = mysqli_fetch_array($query);
    echo "<table><tr>";
        
          echo"<td>" . "id: " . $row['event_id']."</td>"."<td>". " - event Name: " . $row['event_name']."</td> "."<td>"."society name " . $row['society_name']."</td>"."<td>"."event_type". $row['event_type']."</td>"."<td>"."event_date".$row['event_date']."</td>"."<td>"."event_venue".$row['event_venue']."</td>";
          $k=$row['event_id'];
          ?>

          
<td>
          <select name="status[]" >
          <option value='1'><?php $query = mysqli_query($connection,"SELECT event_status FROM `co-ordinator` WHERE event_id='$k'");   $row = mysqli_fetch_array($query); if($row['event_status']==2){echo"pending";}if($row['event_status']==3){echo"approve";}if($row['event_status']==4){echo"cancel";}?></option>
          <option value='2'>Pending</option>
          <option value='3'>Approve</option>
           <option value='4'>Cancel</option> 
           </select>
           
           </td>
    <?php

        $rows=$rows-1;
         echo"</tr></table>";
        
      }

        
mysqli_close($connection);
?>

    </td>
    </tr>
    
  </table>
</div>
<div style="text-align: center;">
<br><br>

<input type="submit" name="submit" value="login">
<button  style="float: center;" type="Cancel" class="button3">Cancel</button>
</form>

<br>.
</div>
</div>
<div class="footer">
  <p>Thank You</p>
</div>
</body>
</html> 
 



    
     
      
       
     
      
     
