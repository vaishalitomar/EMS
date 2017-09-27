<?php
include('db_connection.php');
session_start();
if(isset($_SESSION['name']))
{
	
	 
		if(isset($_POST['event_name']))
       {
       	$event_name=$_POST['event_name'];
          if(!empty($event_name))
           { 
	         if(isset($_POST['yes']))
	           
                { 

                                
                   $query1=mysqli_query($connection, "SELECT * FROM `event` WHERE `event_name`='$event_name'");
                      $rows=mysqli_num_rows($query1);
                      if($rows>0)
              {
                        $row=mysqli_fetch_array($query1);
                        $event_id=$row['event_id'];

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

             else
                { echo 'invalid entry dont try to delete of another society event';}
           
        }
        
    }
     


  else
     //{header('location:index.php');}
{echo "noooo";}

?>
	
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
<a href="http://www.akgec.in/" target="_blank"><img style="float: left;" src="images/akgeclogo.png">  </a>
    <h1>Event Management system</h1>
    </div>
<div class="welcome">Welcome Coordinator</div>
<div class="row">

<div class="register">
  <div class="aside">
    <h1>Do you Want to Abort the event ?</h1>
      <form action="abort2.php" method="post">
        event name:<br>
            <input type="text" name ="event_name"><br><br>
               <button name="yes" class="button">Yes</button>
               <button name = "no" class="button">No</button>
      </form>
     <br>
  </div>
</div>
</div>

<div class="footer">
  <p>Thank You</p>
</div>

</body>
</html>
