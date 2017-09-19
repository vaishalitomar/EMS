<?php
include('connect_data.php');
if(isset($_POST['username'],$_POST['password']))
{$username=mysqli_real_escape_string($link,$_POST['username']);
$password=mysqli_real_escape_string($link,$_POST['password']);
if(!empty($username)&&!empty($password))
{$query="SELECT `position`,`password` FROM `login` WHERE `username`='$username'";
$query_run=mysqli_query($link,$query);
if($query_run==true)
{$row=mysqli_fetch_assoc($query_run);
if($row['password']==$password)
	{$_SESSION['username']=$username;
     $_SESSION['position']=$row['position'];
	 header('location:go_to.php');
	}
	else
	{echo 'invalid password or username';
	}
}
else
{echo 'error'.mysqli_error($link);
}
}
else
{echo 'plz fill all the field';
}
}?>

<form action ="login.php" method="POST">
USERNAME:<br>
<input type="text" name ="username"><br><br>
PASSWORD:<br>
<input type="password" name ="password"><br><br>
<input type="submit" name="submit">
</form>
<html>
<a href="registration.php">FIRST TIME STUDENT</a>
</html>

