<?php
include('db_connection.php');
session_start();
if(isset($_SESSION['name']))
{
  
   
    if(isset($_POST['event']))
       {
       
           if(isset($_POST['submit']))
             
                { 
                     
                  $event_name=$_POST['event'];

                                
                   $query1=mysqli_query($connection, "SELECT * FROM `event` WHERE `event_name`='$event_name'");
                      $rows=mysqli_num_rows($query1);
                      if($rows>0)
              {
                        $row1=mysqli_fetch_array($query1);
                        $event_id=$row1['event_id'];

                }

                  $query2 = "DELETE FROM `registrations` WHERE (`event_id` = '$event_id')";
                $query_run2=mysqli_query($connection,$query2);
                 $query=" DELETE FROM `event` WHERE (`event_name`='$event_name')";
                   $query_run=mysqli_query($connection,$query);

             

              if((($query_run)&&($query_run2))==true)
             {
            {
              
              header('location:success.php');
            }
                 }
          else
           { echo 'invalid event name or no such event';}
          }
             }

           
           
        
        
    
     


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
<script src="validation.js"></script>
<div class="header">
<a href="http://www.akgec.in/" title="AKGEC WEBSITE" target="_blank"><img style="float: left;" src="images/akgeclogo.png"></a>
  <a href="logout.php" title="LOGOUT"><img class='imgpop' style="float: right;" src="images/lo.png"></a>
  <a href = "coordinator_frontpage.php" title="HOME" ><img class='imgpop' style="float: right;" src="images/home2.png"></a>
  <div style="text-align: center;">
  <img src="images/headerlogo.png">
  <h1 style="font-size: 40px; color: #00ABDC">EVENT MANAGEMENT SYSTEM</h1>
  </div>>
    </div>
<div class="welcome">Welcome Coordinator</div>
<div class="row">

<div class="register">
  <div class="aside">
    <h1>Do you Want to Abort the event ?</h1>
      <form id="abort" action="abort2.php" method="post" onsubmit="return abortonsubmit()">
      <p id="name"></p>
      <?php

  $cod_name=$_SESSION["name"];
                      $query1=mysqli_query($connection, "SELECT * FROM coordinator WHERE `coordiantor_name`='$cod_name'");
                      $rows=mysqli_num_rows($query1);
                      if($rows>0)
        {
                        $row=mysqli_fetch_array($query1);
                        $society_id=$row['society_id'];

$query2="SELECT * FROM `event` WHERE `society_id`='$society_id' AND  `event_status` = 'granted'";
$query_run2=mysqli_query($connection,$query2);
}
?>
   
 <label ></label>
 
 <select style="margin-left: 30%; width: 40%" placeholder="Enter Event Name" type="text" name="event">


 
 
  <?php
if($query_run2==true)
{
  
  {
    $count=1;
    
    if(mysqli_num_rows($query_run2)>=1)
       {
              while($row=mysqli_fetch_assoc($query_run2))
          { ?>
             <option > 
             <?php echo $row['event_name']?>
             </option> 

             <?php
             $count=$count+1;
         }
       }
  else

      {
         echo 'no file';
     }
  }
}
?>
            <br>
            <br>  
             <input style="width: 15%" type="submit" name = "submit" value = "submit" >
      
      </form>
     <br>
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