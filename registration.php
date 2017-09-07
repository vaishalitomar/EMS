<?php
require ('connection.php');
if(isset($_POST['username'])&&($_POST['event'])&&($_POST['name'])&&($_POST['gender'])&&($_POST['email'])&&($_POST['student_no'])&&($_POST['pass'])&&($_POST['pass1']))
{
	$username=$_POST['username'];
	$event=$_POST['event'];
$name=$_POST['name'];
$gender=$_POST['gender'];
$email=$_POST['email'];
$student_no=$_POST['student_no'];
$password=$_POST['pass'];
$pass=$_POST['pass1'];
if((!empty($username))&&(!empty($event))&&(!empty($name))&&(!empty($gender))&&(!empty($email))&&(!empty($student_no))&&(!empty($password))&&(!empty($pass)))
{if($password==$pass)
{$query="INSERT INTO `registrations`(`username`,`event`,`name`,`gender`,`email`,`student_no`,`password`) VALUES('$username','$event','$name','$gender','$email','$student_no','$password')";
$query_run=mysqli_query($link,$query);echo 'run';
if($query_run==true)
	{echo 'you have been register';
}else
	{echo 'error bol';echo 'error'.mysqli_error($link);
}
}
else
{echo 'password not match';}
}else
{echo 'plss fill all the field';}

}?>
<form action="registration.php" method="POST">
username<br>
<input type="text" name="username"><br>
event<br>
<input type ="text" name="event"><br>
Name<br>
<input type ="text" name="name"> <br>
gender<br>
<input type="text" name ="gender"><br>
email<br>
<input type="text" name="email"><br>
student no<br>
<input type="text" name="student_no"><br>
<br>
password<br>
<input type="password" name="pass"><br>
<br>confirm password<br>
<input type="password" name="pass1"><br>
<br><input type="submit" value="submit">
</form>

<!--
//pregmatch
//filtervalidatemail -regex
//regexr.com
//sql injection
//DB-->