<?php
include('db_connection.php');
if(!empty($_SESSION['username']))
  {
	if(isset($_POST['society_id'],$_POST['society_name']))
       {
       	  $society_id=$_POST['society_id'];$society_name=$_POST['society_name'];
         if(!empty($society_id)&&!empty($society_name))
             {
                $society_id=mysqli_real_escape_string($connection,$society_id);
                $society_name=mysqli_real_escape_string($connection,$society_name);$society_name=strtolower($society_name);
	            $query=" SELECT * FROM `co-ordinator` WHERE (`society_name`='$society_name' AND `society_id`='$society_id')";
	            $query_run=mysqli_query($connection,$query);
                   if($query_run==true)
                     {
                     	if(mysqli_num_rows($query_run)==1)
					        {
					        	$row=mysqli_fetch_assoc($query_run);
                                $_SESSION['society_name']=$row['society_name'];
					            $_SESSION['society_id']=$row['society_id'];
                               header('location:go_to.php');
					        }
					    else
					        {
					        	echo 'invalid society_name or society_id';
					        }
				     }
                   else
                     {
	                   echo 'error'.mysqli_error($connection);
                     }
             }
              else
                {
	               echo 'plz fill the society_id';
                }
        }
  }
   else
     {
     	header('location:login.php');
     }
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
     <a href="http://www.akgec.in/" target="_blank"><img style="float: left;" src="images/akgeclogo.png">
     </a>
     <a >
     <img class='imgpop' style="float: right;" src="images/lo.png"></a>
     <a href="index.html" title="HOME" ><img class='imgpop' style="float: right;" src="images/home2.png">
     </a>
    <h1 style="text-align: center;" >EVENT MANAGEMENT SYSTEM</h1>
</div>
  <div class="welcome">Welcome Coordinator</div>

  <div class="row">

     <div class="register">
         <div class="aside3">
            <h2 style="color: darkgreen;text-align: center;"><b>LOGIN</b></h2><hr><br>
               <form action="enter_society.php" method = "POST">
                  <label><p style="text-align: left;"><b>SOCIETY ID</b><p></label>
                    <input type="password" placeholder="Enter Society ID" name="society_id" required>
                    <label><p style="text-align: left;"><b>SOCIETY NAME</b></p></label>
                    <input type="text" placeholder="Enter Event name" name="society_name" required>
                    <input style="margin-left: 20%" type="submit" name = "submit" value="Login">
               </form>
                <br><br>
         </div>
      </div>
  </div>

<div class="footer">
  <p>Thank You</p>
</div>

</body>
</html>
