<?php
include('connect_data.php');
if(!empty($_SESSION['username']))
{if(($_SESSION['position']=='A')||!empty($_SESSION['society_id']))
	{if(isset($_POST['society_name'],$_POST['event_name']))
 {$society_name=$_POST['society_name'];$event_name=$_POST['event_name'];
if(!empty($society_name)&&!empty($event_name))
{$society_name=mysqli_real_escape_string($link,$society_name);$society_name=strtolower($society_name);$society_id=mysqli_real_escape_string($link,$_SESSION['society_id']);
if($society_name==$_SESSION['society_name'])
{$query=" DELETE FROM `event` WHERE (`event_name`='$event_name' AND `society_id`='$society_id')";

	  $query_run=mysqli_query($link,$query);
		if($query_run==true)
		{$r=mysqli_num_rows($query_run);
			if($r==1)
			{header('location:abort1.php');
				

                     }
					 else
					 { echo 'invalid event name or no such event';}
			}
		else
		{echo 'error'.mysqli_error($link);}
		
}
else
{ echo 'invalid entry dont try to delete of another society';
}
}else 
{echo 'plz fill all the field';}
 }
}else
	
	{ header('location:go_to.php');}
}
else
{header('location:login.php');}


?>
	<em><br> BE CAREFUL DELETED DATA CANNOT BE RETRIVED</em>			
<form action="abort2.php" method="POST">
society name:<br>
<input type="text" name="society_name">
<br><br>event name:<br>
<input type="text" name ="event_name"><br><br>
<input type="submit" value="submit" >
</form>
