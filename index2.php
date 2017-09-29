<?php

require('db_connection.php');

	session_start();
	if(isset($_SESSION["name"]))
	{
	session_destroy();
	session_unset();
	$_SESSION=[];
	if(!isset($_SESSION["name"]))
	header('location:index.php');
}
?>