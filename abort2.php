<?php
include('connection.php');
if(isset($_POST['society_id']))
{$society_id=$_POST['society_id'];
if(!empty($society_id))
{$society_id=mysqli_real_escape_string($link,$society_id);$_SESSION['society_id']=$_POST['society_id'];
	$query="SELECT `society_name`FROM `co-ordinator` WHERE `society_id`='$society_id'";

	  $query_run=mysqli_query($link,$query);
		if($query_run==true)
		{if(mysqli_num_rows($query_run))
			{$row=mysqli_fetch_assoc($query_run);
				if($_SESSION['society_name']=$row['society_name'])
                     {header('location:abort1.php');

                     }
			}
		
			else
			{echo 'no such society_id';
			}
		}
		else
		{echo 'error'.mysqli_error($link);}
		
}
else 
{echo 'plz fill all the field';}
}
?>
				
<form action="abort2.php" method="POST">
society_id:<br>
<input type="password" name="society_id">
<input type="submit" value="submit" >
</form>
