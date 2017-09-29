<?php 
require('db_connection.php');

if(isset($_POST['submit']))
{ 
$gender=$_POST['gender'];   
$hosteler=$_POST['hosteler'];  
	$username=$_POST['username'];	
	$name=$_POST['name'];
		$branch=$_POST['branch'];
			$year=$_POST['year'];
				$event=$_POST['event'];
   
$student_no=$_POST['student_no'];
$contact_no=$_POST['contact_no'];
$hostler=$_POST['hosteler'];
 $email=$_POST['email'];
 $geneder=$_POST['gender'];
$salt = '8529608973893';
$password=($_POST['password']);


	
    $query1=mysqli_query($connection, "SELECT * FROM event WHERE `event_name`='$event' AND `event_status`='granted'");

  $rows=mysqli_num_rows($query1);
  if($rows>=1)
  {
    echo $event;
    $row=mysqli_fetch_array($query1);
    $event_id=$row['event_id'];
    
  

    $query="INSERT INTO `registrations`(`event_id`, `name`,`gender`,`email`,`student_no`,`contact_no`,`branch`,`year`,`hosteler`,`username`,`password`) VALUES('$event_id','$name','$gender','$email','$student_no','$contact_no','$branch','$year','$hosteler','$username','$password1')";
$query_run=mysqli_query($connection,$query);


if($query_run==true)
{
  $query3="INSERT INTO `login`(`username`,`password`,`position`)VALUES('$username','$password','S')";
$query_run1=mysqli_query($connection,$query3);
if($query_run1==true)
{
  header('location:success1.php');
}
	else
{
  echo 'error'.mysqli_error($connection);}
	}
}
	else
	{
    echo 'eror'.'NOT CREATED EVENT'.mysqli_error($connection);
	}
}
	

?>
<!--
	
<form action="registration.php" method="POST">
Event <br>
<input type = "text" name = "event" value = "<?php if(!empty($event)) echo $event; ?>">
<span class="error">*<?php echo $errevent;?></span><br>

society name<br>
<input type="text" name="society_name" value="<?php if(!empty($society_name)) echo $society_name; ?>">
<span class="error">*<?php echo $errsociety_name;?></span><br>

name<br>
<input type ="text" name="name" maxlength="30" value="<?php if(!empty($name))echo $name;?>">
<span class="error">*<?php echo $errname;?></span><br>
gender
<input type="radio" name="gender" value="male">MALE
<input type="radio" name="gender" value="female">FEMALE
<span class="error">* <?php echo $errgender;?></span>
<br>
E-mail<br>
<input type="text" name="email" value="<?php if(!empty($email)) echo $email;?>">
<span class="error">* <?php echo $erremail;?></span>
<br>
student no<br>
<input type ="integer" name="student_no" maxlength="7" value="<?php if(!empty($student_no))echo $student_no;?>">
<span class="error">*<?php echo $errstudent_no;?></span><br>
contact no:<br>
<input type ="text" name="contact_no" maxlength="11" value="<?php if(!empty($contact_no)) echo $contact_no;?>">
<span class="error">*<?php echo $errcontact_no;?><br>
branch:<br>
<select name="branch"  value="<?php if(!empty($branch))echo $branch;?>">
    <option value="1">CS</option>
     <option value="2">IT</option>
      <option value="3" >EC</option>
       <option value="4">CL</option>
      <option value="5">EN</option> 
     <option value="6">ME</option>
    <option value="7">EI</option>
 </select>     
 <span class="error">*<?php echo $errbranch;?><br><br> 
year:<br>
<select name="year"  value="<?php if(!empty($year))echo $year;?>">
    <option value="1st">1st</option>
       <option value="2nd">2nd</option>
        <option value="3rd" >3rd</option>
    <option value="4th">4th</option>
</select>
<span class="error">*<?php echo $erryear;?><br>
hostler:<br>
<input type ="radio" name="hostler" value="YES">YES</input>
<input type = "radio" name = "hostler" value = "NO">NO</input>
<span class="error">*<?php echo $errhostler;?><br>


username:<br>
<input type ="text" name="username" maxlength="30" value="<?php if(!empty($username)) echo $username;?>">
<span class="error">*<?php echo $errusername;?><br>

password<br>
<input type ="password" name="password" >
<span class="error">*<?php echo $errpassword;?></span><br><br>
<input type="submit" value="Submit">
</form>
-->


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

<button onclick="topFunction()" id="myBtn" title="Go to top"><b>^</b></button>

<div class="header">
<a href="http://www.akgec.in/" title="AKGEC WEBSITE" target="_blank"><img style="float: left;" src="images/akgeclogo.png"></a>
  <a href="index2.php" title="LOGOUT"><img class='imgpop' style="float: right;" src="images/lo.png"></a>
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
    <input type = "text" name="event" id="textdeco" required="required" >
               <br>
               <p id = "event"></p>
            <br>
            <label style="text-align: left;"><b>Name</b></label>
            <input type="text" name="name" id="textdeco" placeholder="Enter Name"  pattern="^[a-zA-Z]{1,40}$" onclick = " return validateonclick()" />
            <br>
            <p id = "name"></p>
            <br>
            
            <label style="text-align: left;"><b>Gender</b></label>
            <input type="radio" value="M" id="male" name="gender" onclick = " return validateonclick()"/>
            <label for="male" class="radio" >Male</label>
            <input type="radio" value="F" id="female" name="gender"  onclick = " return validateonclick()"/>
            <label for="female" class="radio">Female</label>
            <br>
            <p id = "gender"></p>
            <br>
            <label style="text-align: left;"><b>Email</b></label>
            <input type="email" name="email" id="textdeco" placeholder="Enter Email"  onclick = " return validateonclick()"/>
            <br>
            <p id = "email"></p>
            <br>
            <label style="text-align: left;"><b>Student No.</b></label>
            <input type="text" name="student_no" maxlength="7" pattern="^[+0-9]{1,3})?([0-9]{10}$" placeholder="Enter Student Number" id="textdeco"  onclick = " return validateonclick()" />
            <br>
            <p id = "student_no"></p>
            <br>
            <label style="text-align: left;"><b>contact no</b></label>
            <input type="text" name="contact_no" maxlength = "10" pattern="^[+0-9]{1,3})?([0-9]{10}$" placeholder="Enter Mobile Number" id="textdeco"  onclick = " return validateonclick()" />
            <br>
            <p id = "contact_no"></p>
            <br>
            <label style="text-align: left;"><b>Branch</b></label>    
            <select type="text" name="branch" id="textdeco"  placeholder="Enter Class" pattern="^[a-zA-Z]{3,20}$" />
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
            <select type="text" name="year" id="textdeco"  placeholder="Enter Class" pattern="^[a-zA-Z]{3,20}$" />
            <option value="1">1st</option>
            <option value="2">2nd</option>
          <option value="3" >3rd</option>
           <option value="4">4th</option>
           </select>

            <br>
            <p id = "year"></p>
            <br>

            
            <label style="text-align: left;"><b>Hosteler</b></label>
            <input type="radio" value="y" id="Y" name="hosteler"  onclick = " return validateonclick()"/>
            <label for="Y" class="radio" >Yes</label>
            <input type="radio" value="N" id="N" name="hosteler"  onclick = " return validateonclick()"/>
            <label for="N" class="radio">No</label>

            <br>
            <p id = "hosteler"></p>
            <br>

            <label p style="text-align: left;"><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="username"  value="<?php if(!empty($username)) echo $username;?>" onclick = " return validateonclick()"/>
           
            <br>
            <p id = "username"></p>
            <br>

            <label style="text-align: left;"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="password" onclick = " return validateonclick()"/>
            
            <br>
            <p id = "password"></p>
            <br>

            <div style="text-align: center;">
            <button type="submit" class="button2" name="submit">Submit</button>

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

