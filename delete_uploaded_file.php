<?php
include ('connect_data.php');
if(!empty($_SESSION['username']))
{if(!empty($_SESSION['society_id']))
{if(isset($_POST['file_name']))
{$file_name=mysqli_real_escape_string($link,$_POST['file_name']);
if(!empty($file_name))
{$society_name=$_SESSION['society_name'];
	var_dump($society_name);
	if(unlink("uploaded/".$society_name."/".$_POST['file_name']))
		{echo 'file has been deleted'.'<br>';}
else{
	echo 'file deleteion fail enter a valid name ';
}
$query="DELETE  FROM `upload` WHERE `file_name`='$file_name'";
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
		<form method="post" action=" delete_uploaded_file.php">
 
 <label >file name</label>
 
 <select name="file_name">
 
  <?php
if($query_run==true)
{
	
	{$count=1;
		
  if(mysqli_num_rows($query_run)>=1){
	while($row=mysqli_fetch_assoc($query_run))
	{ ?><option>
<option > 
	<?php echo $row['file_name']?>
</option> 

<?php
	     $count=$count+1;
	 }
	}
	else

	{
		echo 'no file';
	}
}}?><input type ="submit" value="DELETE">
</form>
<?php
//else
//{ echo 'no file ';}
//else
//{echo 'error'.mysqli_error($link);}
//}
}
else
	{ header('location:go_to.php');}
}
else
{header('location:login.php');}

?>
<!--<form action="delete_uploaded_file.php" method="POST">
<input type ="text" name ="delete_file" maxlength="30"> 
<input type ="submit" value="DELETE">
</form>
