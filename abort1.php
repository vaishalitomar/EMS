<?php
<?php
include('connection.php');
if(!empty($_SESSION['username']))
{if(!empty($_SESSION['society_id']))
if($c==1)
{echo ' you have suceesfully abort the event';
}
else
{header('location:go_to.php');
}
else
	
	{ header('location:go_to.php');}
}
else
{header('location:login.php');}

?>