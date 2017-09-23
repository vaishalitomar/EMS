<?php
include('db_connection.php');
if(!empty($_SESSION['username']))
{
	if(($_SESSION['position']=='A')||!empty($_SESSION['society_id']))
	{ 
		if(isset($_POST['event_name']))
       {
       	$event_name=$_POST['event_name'];
          if(!empty($event_name))
             $society_id=mysqli_real_escape_string($connection,$_SESSION['society_id']);
	         if(isset($_POST['yes']))
	           {
                { $query=" DELETE FROM `event` WHERE (`event_name`='$event_name')";
                    $query_run=mysqli_query($connection,$query);
		          if($query_run==true)
		         {
			      {
			      	header('location:abort1.php');
			      }
                 }
			    else
					 { echo 'invalid event name or no such event';}
			    }
	           }
             else
                { echo 'invalid entry dont try to delete of another society';}

        }
        else 
          {echo 'plz fill all the field';}
    }
      else
	    { header('location:go_to.php');}
}

  else
     {header('location:login.php');}


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
