<?php
require('connection.php');
if(isset($_POST['society_id']))
{$society_id=mysqli_real_escape_string($link,$_POST['society_id']);
	if(!empty($society_id))
	{$query="SELECT `event_id` FROM `co-ordinator` WHERE `society_id`='$society_id'";
$query_run=mysqli_query($link,$query);
if($query_run==true)
{
	if(mysqli_num_rows($query_run)==1)
	{
		header('Location:upload.php');
	}
	else
	{
		echo 'incoorect society_id';
	}
}
else
{echo 'error'.mysqli_error($link);
	}
}
else
{echo 'plz enter your society_id';}
}

?>

<form action="cordinator_check.php" method="POST">
<strong>society_id</strong><br>
<input type ="password" name="society_id" >
<input type="submit">
</form>