<?php
include('connect_data.php');
if(!empty($_SESSION['username']))
{
	$query= "SELECT `event_name`,`society_name`,`event_date`,`event_venue` FROM `event` WHERE `event_status`='granted'";
	$query_run=mysqli_query($link,$query);
	if($query_run==true)
	{if(mysqli_num_rows($query_run)>=1)
		{$count=1;
		while($row=mysqli_fetch_assoc($query_run))
		{printf(" %d\t .event %s by society %s on %s at %s\n",$count,$row['event_name'],$row['society_name'],$row['event_date'],$row['event_venue']);
          $count=$count+1;
		}
		}
		else
		{echo 'no current event';
		}
	}
	else
	{echo 'error'.mysqli_error($link);
	}
}
else
{header('location:login.php');
}
?>