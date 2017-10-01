<?php 
require('db_connection.php');
$errusername=$errname=$errstudent_no=$erremail=$errpassword="";$error=0;

if(isset($_POST['username'],$_POST['name'],$_POST['branch'],$_POST['year'],$_POST['event'],$_POST['student_no'],$_POST['contact_no'],$_POST['password']))
{ $error=0;


	$username=mysqli_real_escape_string($connection,$_POST['username']);	
	$name = mysqli_real_escape_string($connection,$_POST['name']);
		$branch = mysqli_real_escape_string($connection,$_POST['branch']);
			$year=mysqli_real_escape_string($connection,$_POST['year']);
				$event=mysqli_real_escape_string($connection,$_POST['event']);
   
$student_no=mysqli_real_escape_string($connection,$_POST['student_no']);
$contact_no=mysqli_real_escape_string($connection,$_POST['contact_no']);

 $email=mysqli_real_escape_string($connection,$_POST['email']);

$salt = '8529608973893';
$password=mysqli_real_escape_string($connection,$_POST['password']);

if(empty($student_no))
{
  $errstudent_no="* please fill the student no " ;
  $error=1;
}
else
  if(preg_match("/^[1][4-7 ][0-9 ]+$/",$student_no)==0)
  {
    $errstudent_no =" * enter a valid student no " ; 
  $error=1;
}

    if(empty($name))
    {
      $errname = " * please enter the name ";
    }
   else
    if(preg_match("/^[a-zA-Z ]+$/",$name)==0)
	  {
      $errname =" * only letters and white space allowed";
      $error=1;
    }
   
   if(empty($email))
   {
    $erremail = " * please enter your email id";
   }
  else
    if(!filter_var($email,FILTER_VALIDATE_EMAIL))
  {
    $erremail="* please enter a valid email id";$error=1;
  }

 if(empty($password))
 {
  $errpassword = "* please enter the password ";
 }
	else
    if(preg_match("/^[a-zA-Z0-9 ]+$/",$password)==0)
	{$errpassword=	" password must contain letters and numbers only";
	$error=1;}
	$password1 = sha1($password).$salt;
	//if(empty ($gender))
	//{
    //  $errgender = "please choose one field";
      //$c=1;
	
	 $query1=mysqli_query($connection, "SELECT * FROM event WHERE `event_name`='$event' AND `event_status`='granted'");

  $rows=mysqli_num_rows($query1);
  if($rows>=1)
  {
   
    $row=mysqli_fetch_array($query1);
    $event_id=$row['event_id'];
    
	if($error!=1)
	{$query="INSERT INTO `registrations`(`name`,`gender`,`email`,`student_no`,`contact_no`,`branch`,`year`,`hosteler`,`username`,`password`,`event_id`) VALUES('$name','$gender','$email','$student_no','$contact_no','$branch','$year','$hosteler','$username','$password1','$event_id')";

$query_run=mysqli_query($connection,$query);
if($query_run==true)
{$query="INSERT INTO `login`(`username`,`password`,`position`)VALUES('$username','$password','S')";
if($query_run==true)
{ header('location:success1.php');

}
	else
{echo 'error'.mysqli_error($connection);}
	}
	else
	{
		echo 'eror'.'NOT CREATED EVENT'.mysqli_error($connection);
	}
}
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
       background: url("images/regpgbg.jpg") no-repeat center fixed; 
       background-size: cover;
     }
</style>

</head>
<body>

<script >
var snd1= new Audio("sounds/welcomestudent.mp3");
snd1.play();
</script>
<script src="validation.js">
</script>

<button onclick="topFunction()" id="myBtn" title="Go to top"><b>^</b></button>

<div class="header">
<a href="http://www.akgec.in/" title="AKGEC WEBSITE" target="_blank"><img style="float: left;" src="images/akgeclogo.png"></a>
  <a href="logout.php" title="LOGOUT"><img class='imgpop' style="float: right;" src="images/lo.png"></a>
  <a href = "registration.php" title="HOME" ><img class='imgpop' style="float: right;" src="images/home2.png"></a>
  <div style="text-align: center;">
  <img  src="images/headerlogo.png">
  <h1 style="color: #00ABDC">EVENT MANAGEMENT SYSTEM</h1>
  </div>
</div>
<div class="welcome">Welcome Student</div>
<div class="row">

<div class="register">
  <div class="aside3">
    <h2 style="color: red;text-align: center;"><b>REGISTER HERE</b></h2><hr><br>
    <form id="registrationform" action="registration.php" name = "" method = "POST" onsubmit = "return validateonsubmit() ">
    <label style="text-align: left;"><b>Event</b></label>
    <?php
$query2="SELECT * FROM `event` WHERE `event_status` = 'granted'";
$query_run2=mysqli_query($connection,$query2);

?>
   
 
 
 <select style="margin-left: 30%; width: 40%" placeholder="Enter Event Name" type="text" name="event" value = "<?php if(!empty($event)) echo $event; ?>">


 
 
  <?php
   $query2=mysqli_query($connection, "SELECT * FROM `event` WHERE  `event_status`='granted'");

  $rows=mysqli_num_rows($query2);

if($query_run2==true)
{
  
  {$count=1;
    
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
  
  }
}
?>
</select>

                  
               <p id = "event"></p>
            <br>
            

            <label style="text-align: left;"><b>Name</b></label>
            <span class="error"><?php echo $errname;?></span><br>
            <input type="text" name="name" id="textdeco" placeholder="Enter Name"  pattern="^[a-zA-Z]{1,40}$" onclick = " return validateonclick()" value = "<?php if(!empty($name)) echo $name; ?>" />
            <br>
            
            <p id = "name"></p>
            <br>
            
            <label style="text-align: left;"><b>Gender</b></label>
            

            <input type="radio" value="M" id="male" name="gender" onclick = " return validateonclick()" />
            <label for="male" class="radio" >Male</label>
            <input type="radio" value="F" id="female" name="gender"  onclick = " return validateonclick()" />
            <label for="female" class="radio">Female</label>
            <br>
            <p id = "gender"></p>
            <br>
            
            <label style="text-align: left;"><b>Email</b></label>
            <span class="error"><?php echo $erremail;?></span><br>
            <input type="email" name="email" id="textdeco" placeholder="Enter Email"  onclick = " return validateonclick()" value = "<?php if(!empty($email)) echo $email; ?>"/>
            
            <p id = "email"></p>
            <br>
            
            <label style="text-align: left;"><b>Student No.</b></label>
            <span class="error"><?php echo $errstudent_no;?></span><br>

            <input type="text" name="student_no" maxlength="7"  placeholder="Enter Student Number" id="textdeco"  onclick = " return validateonclick()" value = "<?php if(!empty($student_no)) echo $student_no; ?>"/>
            <br>
            <p id = "student_no"></p>
            <br>

            <label style="text-align: left;"><b>contact no</b></label>
            
            <input type="text" name="contact_no" maxlength = "10" pattern="^[+0-9]{1,3})?([0-9]{10}$" placeholder="Enter Mobile Number" id="textdeco"  onclick = " return validateonclick()" value = "<?php if(!empty($contact_no)) echo $contact_no; ?>" />
            <br>
            <p id = "contact_no"></p>
            <br>
            

            <label style="text-align: left;"><b>Branch</b></label> 
              
            <select type="text" name="branch" id="textdeco"  placeholder="Enter Class" pattern="^[a-zA-Z]{3,20}$"  value = "<?php if(!empty($branch)) echo $branch; ?>"/>
              <option value="CS">CS</option>
     <option value="IT">IT</option>
      <option value="EC" >EC</option>
       <option value="CL">CL</option>
      <option value="EN">EN</option> 
     <option value="ME">ME</option>
    <option value="EI">EI</option>
    </select>
            <br>
            <p id = "branch"></p>
            <br>
            

             <label style="text-align: left;"><b>Year</b></label>
                 
            <select type="text" name="year" id="textdeco"  placeholder="Enter Class" pattern="^[a-zA-Z]{3,20}$"  value = "<?php if(!empty($year)) echo $year; ?>"/>
            <option value="1">1st</option>
            <option value="2">2nd</option>
          <option value="3" >3rd</option>
           <option value="4">4th</option>
           </select>

            <br>
            <p id = "year"></p>
            <br>

            

            <label style="text-align: left;"><b>Hosteler</b></label>
            
            <input type="radio" value="y" id="Y" name="hosteler"  onclick = " return validateonclick()" />
            <label for="Y" class="radio" >Yes</label>
            <input type="radio" value="N" id="N" name="hosteler"  onclick = " return validateonclick()" />
            <label for="N" class="radio">No</label>

            <br>
            <p id = "hosteler"></p>
            <br>
            

            <label p style="text-align: left;"><b>Username</b></label>
            

            <input type="text" placeholder="Enter Username" name="username"  value="<?php if(!empty($username)) echo $username;?>" onclick = " return validateonclick()" value = "<?php if(!empty($username)) echo $username; ?>"/>
           
            <br>
            <p id = "username"></p>
            <br>
            
            <label style="text-align: left;"><b>Password</b></label>
            <span class="error"><?php echo $errpassword;?></span><br>
            <input type="password" placeholder="Enter Password" name="password" onclick = " return validateonclick()" value = "<?php if(!empty($password)) echo $password; ?>"/>
            
            <br>
            <p id = "password"></p>
            <br>
            

            <div style="text-align: center;">
            <button type="submit" class="button2" name="submit" >Submit</button>

           </div>
    </form>
    <br><br>
    <div id="overlay" onclick="off()">
           <div id="text">Terms And Conditions</div>
           </div>

           <div style="text-align: center;">
           <button style="color:white; background-color:blue;" class="button" onclick="on()">TermsAndCondition</button>
           <br>.
           </div>
  </div>
</div>

</div>

<div class="footer">
  <p>EMS AKGEC 2017</p>
</div>
<script src="js/emsjs.js">
</script>
</body>
</html>