<?php
include('connect_data.php');
if(!empty($_SESSION['username']))
{if(($_SESSION['position']=='A')||!empty($_SESSION['society_id']))
	{if(isset($_POST['event']))
{$event=mysqli_real_escape_string($link,$_POST['event']);
	$event=strtolower($event);
	if(!empty($_SESSION['society_name']))
	{$society_name=$_SESSION['society_name'];}
if(!empty($event))
{if($_SESSION['position']=='A')
	{$query="SELECT * FROM `registrations` WHERE`event_name`='$event'";}
else
{$query="SELECT * FROM `registrations` WHERE(`event_name`='$event' AND `society_name`='$society_name')";}
$query_run=mysqli_query($link,$query);
if($query_run==true)
{if(mysqli_num_rows($query_run)>=1)
	{$count=1;while($row=mysqli_fetch_assoc($query_run))
{	echo $count.$row['name'].' '.$row['student_no'].' '.$row['branch'].' '.$row['year'].' '.$row['email'].' '.$row['contact_no'].' '.$row['hostler'].'<br>';
$count=$count+1;
}
}
else
{ echo 'no student regisrter for this';}
}
else
	{echo 'error'.mysqli_error($link);}
}
else
{echo 'plz enter a valid event name';}
}
	}
	else
	{ header('location:go_to.php');}
}
else
{header('location:login.php');}

?>
<form action="view_student_detail.php" method="POST">
event name<br><br>
<input type="text" name="event" >
<input type="submit">
</form>