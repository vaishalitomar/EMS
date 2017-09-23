<?php 
require('connection.php');
$errusername=$errname=$errevent=$errstudent_no=$erremail=$errgender=$errpassword="";$c=0;
if(isset($_POST['username'],$_POST['name'],$_POST['event'],$_POST['student_no'],$_POST['email'],$_POST['password']))
{
	if(isset($_POST['gender']))
{$gender=$_POST['gender'];}
else{
	$errgender = "please choose one field";
      $c=1;}
	$username=$_POST['username'];	$event=$_POST['event'];
$name=($_POST['name']);
//$gender=$_POST['gender'];
$email=$_POST['email'];
$student_no=$_POST['student_no'];
$salt = '8529608973893';
$password=($_POST['password']);
function type_cast($data)
 {$data=trim($data);
 $data=htmlspecialchars($data);
 $data=stripslashes($data);
  return $data; }
$name=type_cast($name);
if(empty($name))
{$errname="plz fill the name ";$c=1;}
$email=type_cast($email);
if(empty($email))
{$erremail="plz fill the email";$c=1;}
$student_no=type_cast($student_no);
if(empty($student_no))
{$errstudent_no="plz fill the student_no";$c=1;}
$username=type_cast($username);
if(empty($username))
	{$errusername=	"plz fill the	username ";$c=1;}
$event=type_cast($event);
if(empty($event))
{$errevent="plz fill the event";$c=1;}
$password=type_cast($password);
if(empty($password))
	{	$errpassword="plz fill the password";$c=1;}
  	if(preg_match("/^[a-zA-Z ]+$/",$name)==0)
	{$errname ="only letters and white space allowed";$c=1;}
  if(!filter_var($email,FILTER_VALIDATE_EMAIL))
  {$erremail="plz enter a valid email id";$c=1;}
	if(preg_match("/^[A-Z][a-zA-Z0-9 ]+$/",$password)==0)
	{$errpassword=	"plz enter  a valid password it must contain first capital letter & not any special  character";
	$c=1;}
	$password1 = sha1($password).$salt;
	//if(empty ($gender))
	//{
    //  $errgender = "please choose one field";
      //$c=1;
	
	if($c!=1)
	{$query="INSERT INTO `registrations`(`username`,`name`,`gender`,`event`,`email`,`student_no`,`password`) VALUES('$username','$name','$gender','$event','$email','$student_no','$password1')";
$query_run=mysqli_query($link,$query);
if($query_run==true)
{echo "you have register sucessfully";}
else
{echo 'error'.mysqli_error($link);}
	}
}
//mysqli_real_escape_string($conn, $_POST['data'])
//password_hash()
?>
	
<form action="registrations.php"	method="POST">
username:<br>
<input type ="text" name="username" maxlength="30" value="<?php if(!empty($username)) echo $username;?>">
<span class="error">*<?php echo $errusername;?><br>
name<br>
<input type ="text" name="name" maxlength="30" value="<?php if(!empty($name))echo $name;?>">
<span class="error">*<?php echo $errname;?></span><br>
event<br>
<input type ="text" name="event" maxlength="30" value="<?php if(!empty($event))echo $event;?>">
<span class="error">*<?php echo $errevent;?></span><br>
student no<br>
<input type ="integer" name="student_no" maxlength="7" value="<?php if(!empty($student_no))echo $student_no;?>">
<span class="error">*<?php echo $errstudent_no;?></span><br>
E-mail<br>
<input type="text" name="email" value="<?php if(!empty($email)) echo $email;?>">
<span class="error">* <?php echo $erremail;?></span>
<br>
gender
<input type="radio" name="gender" value="male">MALE
<input type="radio" name="gender" value="female">FEMALE
<span class="error">* <?php echo $errgender;?></span>
<br>

password<br>
<input type ="password" name="password" >
<span class="error">*<?php echo $errpassword;?></span><br><br>
<input type="submit" value="Submit">
</form>