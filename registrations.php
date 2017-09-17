<?php 
require('connection.php');
$errusername=$errname=$errbranch=$erryear=$errevent=$errstudent_no=$errcontact_no=$errhostler=$erremail=$errgender=$errpassword=$errsociety_name="";$error=0;
if(isset($_POST['event'],$_POST['society_name'],$_POST['name'],$_POST['email'],$_POST['student_no'],$_POST['contact_no'],$_POST['branch'],$_POST['year'],$_POST['username'],$_POST['password']))
{ echo 'vaishali';
	if(isset($_POST['gender']))
{$gender=$_POST['gender'];}
else{
	$errgender = "please choose one field";
      $error=1;} 
      if(isset($_POST['hostler']))
{$hostler=$_POST['hostler'];}
else{
	$errgender = "please choose one field";
      $error=1;}
	$username=$_POST['username'];	
	$name=$_POST['name'];
		$branch=$_POST['branch'];
			$year=$_POST['year'];
				$event=$_POST['event'];
   
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
$username=type_cast($username);
if(empty($username))
{$errusername="plz fill the username ";$error=1;}
$name = type_cast($name);
if(empty($name))
{$errname="plz fill the name ";$error=1;}
$banch=type_cast($branch);
if(empty($branch))
{$errbranch="plz fill the branch ";$error=1;}
$year = type_cast($year);
if(empty($year))
{$erryear="plz fill your year ";$error=1;}
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
	{$query="INSERT INTO `registrations`(`event`,`name`,`gender`,`email`,`student_no`,`contact_no`,`branch`,`year`,`hostler`,`username`,`password`,`society_name`) VALUES('$event','$name','$gender','$email','$student_no','$contact_no','$branch','$year','$hostler','$username','$password1','$society_name')";
echo mysqli_errno($link).":".mysqli_error($link);
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
	
<form action="registrations.php" method="POST">
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
<input type ="text" name="contact_no" maxlength="10" value="<?php if(!empty($contact_no)) echo $contact_no;?>">
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


