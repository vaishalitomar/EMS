<?php
include('connect_data.php');
if(!empty($_SESSION['username']))
{if(!empty($_SESSION['society_id']))
	{$society_name=$_SESSION['society_name'];
     header('location:uploaded/'.$society_name.'/');
	}
	
	else
	{ header('location:go_to.php');}
}
else
{header('location:login.php');}
?>