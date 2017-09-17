<?php
include ('connection.php');
{ $society_id=$_SESSION['society_id'];
 $society_id=mysqli_real_escape_string($link,$society_id);
$query="SELECT * FROM `upload` WHERE `society_id`='$society_id'";
$query_run=mysqli_query($link,$query);
if($query_run==true)
{$count=1;
	while($row=mysqli_fetch_assoc($query_run))
	{echo $count.' '.$row['file_name'].'<br>';
	     $count=$count+1;
	}
}
else
{echo 'error'.mysqli_error($link);}
}
?>
<form action="delete.php" method="POST">
<enter the name of file:<br>
<input type ="text" name ="delete_file" maxlength="30">
<input type ="submit" value="DELETE">
</form>
