<?php
include('connection.php');
if(isset($_POST['event']))
{$event=mysqli_real_escape_string($link,$_POST['event']);
	$event=strtolower($event);
if(!empty($event))
{$query="SELECT * FROM `registrations` WHERE `event`='$event' ";
$query_run=mysqli_query($link,$query);
if($query_run==true)
{echo "<table border ='1'>
<tr>
<th>STUDENT NAME</th>
<th>STUDENT NO</th>



<th>EMAIL ID</th>
</tr>";


while($row=mysqli_fetch_assoc($query_run))
{echo "<tr>"; 
	echo "<td>".$row['name']."</td>";
	echo "<td>".$row['student_no']."</td>";
	//echo "<td>".$row['branch']."</td>";
	//echo "<td>".$row['']."</td>";
	//echo "<td>".$row['name']."</td>";
	echo "<td>".$row['email']."</td>";

	//' '.$row['student_no'].' '.$row['branch'].' '.$row['student_no'].'<br>';
}
}
else
	{echo 'error'.mysqli_error($link);}
}
else
{echo 'plz enter a valid event name';}
}
?>
<form action="view_student_detail.php" method="POST">
event name<br><br>
<input type="text" name="event" >
<input type="submit">
</form>