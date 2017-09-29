<?php
require('db_connection.php');
if(isset($_POST['submit']))
{
	session_start();
	$email=$_SESSION['email'];
	
	$password=$_POST['password'];
	$query=mysqli_query($connection, "UPDATE login SET `password`='$password' WHERE `email`='$email'");
	if($query)
	{
		echo "updated";
	}
	else
	{
		echo "sorry";
	}
}
session_destroy();
?>