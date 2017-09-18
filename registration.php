<?php 
require('connect_data.php');
$errusername=$errname=$errbranch=$erryear=$errevent=$errstudent_no=$errcontact_no=$errhostler=$erremail=$errgender=$errpassword=$errsociety_name=$errevent_category="";$error=0;
if(isset($_POST['event'],$_POST['society_name'],$_POST['name'],$_POST['email'],$_POST['student_no'],$_POST['contact_no'],$_POST['branch'],$_POST['year'],$_POST['username'],$_POST['password'],$_POST['gender'],$_POST['hostler'],$_POST['event_category']))
{ $error=0;
$gender=$_POST['gender'];
	if(empty($gender))
{	$errgender = "please choose one field";
      $error=1;} 
   
$hostler=$_POST['hostler'];
   if(empty($hostler))
{	$errhostler = "please choose one field";
      $error=1;}
	$username=$_POST['username'];	
	$name=$_POST['name'];
		$branch=$_POST['branch'];
			$year=$_POST['year'];
				$event=$_POST['event'];
$event_category = $_POST['event_category']; 
$student_no=$_POST['student_no'];
$contact_no=$_POST['contact_no'];
$hostler=$_POST['hostler'];
 $email=$_POST['email'];
 $gender=$_POST['gender'];
$salt = '8529608973893';
$password=($_POST['password']);
$society_name = $_POST['society_name'];
function type_cast($data)
 {$data=trim($data);
 $data=htmlspecialchars($data);
 $data=stripslashes($data);
  return $data; } 

  $username=type_cast($event_category);
if(empty($event_category))
{$errevent_category="plz choose the field ";$error=1;}
$username=type_cast($username);
if(empty($username))
{$errusername="plz fill the username ";$error=1;}
$name = type_cast($name);
if(empty($name))
{$errname="plz fill the name ";$error=1;}
$banch=type_cast($branch);
if(empty(($branch)&&($year)))
{$errbranch="plz fill the branch ";$error=1;}

$event=type_cast($event);
if(empty($event))
{$errevent="plz fill the event name ";$error=1;}
$student_no=type_cast($student_no);
if(empty($student_no))
{$errstudent_no="plz fill the student no ";$error=1;}
$contact_no=type_cast($contact_no);
if(empty($contact_no))
{$errcontact_no="please enter contact no";$error=1;}
$hostler=type_cast($hostler);
if(empty($hostler))
{$errhostler="please choose the field";$error=1;}
$society_name=type_cast($society_name);
if(empty($society_name))
{$errsociety_name="please choose the field";$error=1;}

$password=type_cast($password);
if(empty($password))
	{	$errpassword="plz fill the password";$error=1;}
  	if(preg_match("/^[a-zA-Z ]+$/",$name)==0)
	{$errname ="only letters and white space allowed";$error=1;}
  if(!filter_var($email,FILTER_VALIDATE_EMAIL))
  {$erremail="plz enter a valid email id";$error=1;}
	if(preg_match("/^[A-Z][a-zA-Z0-9 ]+$/",$password)==0)
	{$errpassword=	"password must contain first letter as capital & not any special  character";
	$error=1;}
	$password1 = sha1($password).$salt;
	//if(empty ($gender))
	//{
    //  $errgender = "please choose one field";
      //$c=1;
	
	if($error!=1)
	{$query="INSERT INTO `registrations`(`event_category`,`event_name`,`name`,`gender`,`email`,`student_no`,`contact_no`,`branch`,`year`,`hostler`,`username`,`password`,`society_name`) VALUES('$event_category','$event','$name','$gender','$email','$student_no','$contact_no','$branch','$year','$hostler','$username','$password1','$society_name')";

$query_run=mysqli_query($link,$query);
if($query_run==true)
{$query="INSERT INTO `login`(`username`,`password`,`position`)VALUES('$username','$password','S')";
if($query_run==true)
{echo 'you have register succesfully';
}
	else
{echo 'error'.mysqli_error($link);}
	}
	else
	{echo 'eror'.mysqli_error($link);
	}
}
	}

?>
	
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

<!--
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>EMS-AKGEC</title>
    <link rel="stylesheet" type="text/css" href="css/emscss.css">

<style>
body{
       background: url("images/regpgbg.jpg") no-repeat center fixed; 
       background-size: cover;
     }
</style>

</head>
<body>
<script src="js/emsjs.js">
</script>

<script >
var snd1= new Audio("sounds/welcomestudent.mp3");
snd1.play();
</script>

<button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>

<div class="header">
<a href="http://www.akgec.in/" target="_blank"><img style="float: left;" src="images/akgeclogo.png"></a>
  <h1 style="opacity: 1;">Event Management system</h1>
</div>
<div class="welcome">Welcome Student</div>
<div class="row">

<div class="register">
  <div class="aside3">
    <h2 style="color: red;text-align: center;"><b><u>Register Here</u></b></h2><br>
    <form action="registration.php" method="POST">
    <label style="text-align: left;"><b>Event</b></label>
    <select name="event" id="textdeco" required="required" value = "<?php if(!empty($event)) echo $event; ?>">
<span class="error">*<?php echo $errevent;?></span><br> 
                <option value = "1">dance</option> 
                <option value = "2">codechef</option> 
                <option value = "3">echlon</option> 
                <option value = "4">scrolls</option> 
                <option value = "5">battle</option> 
                <option value ="6">workshop</option> 
                <option>F</option> 
    </select><br><br>
            <label style="text-align: left;"><b>Society Name</b></label>
            <input type="text" name="society_name" id="textdeco" placeholder="Enter Society Name" required="required"   value="<?php if(!empty($society_name)) echo $society_name; ?>" />
            <span class="error">*<?php echo $errsociety_name;?></span>
            <br><br>
            <label style="text-align: left;"><b>Name</b></label>
            <input type="text" name="name" id="textdeco" placeholder="Enter Name" required="required"   value="<?php if(!empty($name))echo $name;?>" />
            <span class="error">*<?php echo $errname;?></span>
            <br><br>
            <label style="text-align: left;"><b>Gender</b></label>
            <input type="radio" name="gender" value="M" style=""/>Male
            <input type="radio" name="gender" value="F"/>Female
            <span class="error">* <?php echo $errgender;?></span>
            <br><br>
            <label style="text-align: left;"><b>Email</b></label>
            <input type="email" name="email" id="textdeco" placeholder="Enter Email" required="required"  value="<?php if(!empty($email)) echo $email;?>"/>
            <span class="error">* <?php echo $erremail;?></span>
            <br><br>
            <label style="text-align: left;"><b>Student No.</b></label>
            <input type="text" name="student_no" maxlength="7" pattern="^[+0-9]{1,3})?([0-9]{10}$" placeholder="Enter Student Number" id="textdeco" required="required"  value="<?php if(!empty($student_no))echo $student_no;?>" />
             <span class="error">*<?php echo $errstudent_no;?></span>
            <br><br>
            <label style="text-align: left;"><b>Contact No.</b></label>
            <input type="text" name="contact_no" maxlength="10" pattern="^[+0-9]{1,3})?([0-9]{10}$" placeholder="Enter Mobile Number" id="textdeco" required="required" value="<?php if(!empty($contact_no)) echo $contact_no;?>" />
            <span class="error">*<?php echo $errcontact_no;?><br>
            <br><br>
            <label style="text-align: left;"><b>Branch and year: </b></label>
            <select style="width: 15%" name="branch" id="textdeco" required="required" value="<?php if(!empty($branch))echo $branch;?>"  >
                <option value="1">CS</option>
     <option value="2">IT</option>
      <option value="3" >EC</option>
       <option value="4">CL</option>
      <option value="5">EN</option> 
     <option value="6">ME</option>
    <option value="7">EI</option>
    </select>
    <select style="width: 15%" name="year" id="textdeco" required="required" value="<?php if(!empty($year))echo $year;?>" >
             <option value="1">1st</option>
     <option value="2">2nd</option>
      <option value="3" >3rd</option>
       <option value="4">4th</option>    
                
                
    </select>
    <span class="error">*<?php echo $errbranch;?>
            <br><br>
            <label style="text-align: left;"><b>Hosteler</b></label>
            <input type="radio" name="hostler" value="y" required="required"/>Yes<input type="radio" name="hostler" value="n" required="required" />No
            <span class="error">*<?php echo $errhostler;?><br>

            <br><br>
            <label style="text-align: left;"><b>Upload document(if any):</b></label><br>
            <input type="file" name="fileToUpload" id="fileToUpload"><br><br>
            <input style="width: 20%" type="submit" value="Upload Image" name="submit">
            <br><br>
            <label p style="text-align: left;"><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="username" required  value="<?php if(!empty($username)) echo $username;?>">
            <span class="error">*<?php echo $errusername;?>
            <br><br>
            <label style="text-align: left;"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="password" required>
            <span class="error">*<?php echo $errpassword;?></span>
            <br><br>
            <div style="text-align: center;">
            <br><br>
            <button type="submit" class="button2">Submit</button>
           <button type="reset" class="button3">Reset</button>
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
  <p>Thank You</p>
</div>

</body>
</html>
-->