<?php
include ('connect_data.php');
if(!empty($_SESSION['username']))
{if(!empty($_SESSION['society_id']))
{if(isset($_POST['delete_file']))
{$delete_file=mysqli_real_escape_string($link,$_POST['delete_file']);
if(!empty($delete_file))
{$society_name=$_SESSION['society_name'];
	if(unlink("uploaded/$society_name/".$_POST['delete_file']))
		{echo 'file has been deleted'.'<br>';}
else{
	echo 'file deleteion fail enter a valid name ';
}
$query="DELETE  FROM `upload` WHERE `file_name`='$delete_file'";
$query_run=mysqli_query($link,$query);
             if($query_run==false)

			 {	 echo 'error'.mysqli_error($link);
			 }
	}else
	{echo 'plz enter the name';}
}
	$society_id=$_SESSION['society_id'];
$query="SELECT * FROM `upload` WHERE `society_id`='$society_id'";
$query_run=mysqli_query($link,$query);
?>
		<form method="post" action=" delete_uploaded_file">
 
 <label >file name</label>
 
 <select name="file_names">
 
  <?php
if($query_run==true)
{
	
	{$count=1;
		
  if(mysqli_num_rows($query_run)>=1){
	while($row=mysqli_fetch_assoc($query_run))
	{ ?><option>
<option value="1"> <?php echo $count.' '.$row['file_name']?>

</option> ?>
<?php
	     $count=$count+1;
	 }
	}
	else

	{
		echo 'no file';
	}
}
//else
//{ echo 'no file ';}
}else
{echo 'error'.mysqli_error($link);}
}
else
	{ header('location:go_to.php');}
}
else
{header('location:login.php');}

?>
<form action="delete_uploaded_file.php" method="POST">
<!--<input type ="text" name ="delete_file" maxlength="30">--> 
<input type ="submit" value="DELETE">
</form>
