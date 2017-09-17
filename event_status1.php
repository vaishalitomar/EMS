<?php
require('db_connection.php');
if(isset($_POST['submit']))
{
$s= $_POST['status'];
$query1=mysqli_query($connection,"SELECT * FROM `co-ordinator`");
foreach ($s as $value ) 
{
$row = mysqli_fetch_array($query1);
$k=$row['event_id'];
$query=mysqli_query($connection,"UPDATE `co-ordinator` SET event_status='$value' WHERE event_id='$k'");
if($query)
{
	echo "done";
}
}
}
?>