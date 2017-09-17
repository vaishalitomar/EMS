<?php
include ('connection.php');
if(isset($_POST['delete_file']))
{$delete_file=$_POST['delete_file'];
	if(!empty($delete_file))
	{echo $_SESSION['society_id'];
	 $society_id=$_SESSION['society_id'];
		$query="SELECT `society_name` FROM `co-ordinator` WHERE `society_id` ='$society_id'";
            $query_run=mysqli_query($link,$query);
              if($query_run==true)
                {$row=mysqli_fetch_assoc($query_run);
                  $society_name=$row['society_name'];echo $society_name;
	if(unlink('uploaded/'.$society_name.'/'.$_POST['delete_file']))
		{echo 'file has been deleted';             
			   $query="DELETE  FROM `upload` WHERE `file_name`='$delete_file'";
              $query_run=mysqli_query($link,$query);
             if($query_run==false)

			 {	 echo 'error'.mysqli_error($link);
			 }
		}
		else{
	echo 'file deleteion fail enter a valid name ';
}
	
	}else
		
		{header('Location:content_delete.php');}
		}
		else{
		header('Location:content_delete.php');}
}
else{
		header('Location:content_delete.php');}
		?>	

