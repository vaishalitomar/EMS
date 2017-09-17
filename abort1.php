<?php
include('connection.php');
if(isset($_POST['event_name']))
{$event=mysqli_real_escape_string($link,$_POST['event_name']);
if(!empty($event))
{
	$society_name=mysqli_real_escape_string($link,$_SESSION['society_name']);

	$query="SELECT `student_no` FROM `registrations` WHERE (`society_name`='$society_name' AND `event`='$event')";
$query_run=mysqli_query($link,$query);
if($query_run==true)
{ $number=mysqli_num_rows($query_run);
	if($number!=0)
		{$query="DELETE FROM `registrations` WHERE `event`='$event'";
		$query_run=mysqli_query($link,$query); var_dump($query_run);
		if($query_run==true)
		{
	$number=mysqli_num_rows($query_run);
	var_dump($number);
		  echo $number.'data has beem deleted';$society_id=$_SESSION['society_id'];
		  $query="DELETE  FROM `co-ordinator` WHERE (`event_name`='$event' AND `society_id`='$society_id')";
		  $query_run=mysqli_query($link,$query);
		if($query_run==true)
		{$number=mysqli_num_rows($query_run);
		  echo $number.'data has beem deleted';
		session_destroy();
		}

		else
		{echo 'ERROR';}
		}
		else
		{echo 'error';}
		}
	
	else
	{echo 'no data found related to this event or u are not allowed to delete';
	}
}
else
{echo 'error';}
}
else{
echo 'plz fill the field';}
}
?>
<form action="abort1.php" method="POST">
event_name to be aborted:
<input type ="text" name="event_name" >
<input type ="submit">
</form>