<?php
include('connection.php');
if(isset($_POST['society_id']))
{$society_id=mysqli_real_escape_string($link,$_POST['society_id']);
	if(!empty($society_id))
	{$query="SELECT `society_name` FROM `co-ordinator` WHERE `society_id`='$society_id'";
	$query_run=mysqli_query($link,$query);
		if($query_run==true)
		{if(mysqli_num_rows($query_run))
		  {	$_SESSION['society_id']=$society_id;
			header('location:content_delete.php');
		}
		else
		{
			echo 'invalid society id';
		}
	}
	
		else
		{echo 'ERROR'.mysqli_error($link);}
		}
	else
	{
		echo 'plz fill the field';
	}
}
?>



<form action="go_to_delete.php" method="POST">
society_id:
<input type ="password" name="society_id">
<input type ="submit" value="submit">
