<?php
include('connect_data.php');
if(!empty($_SESSION['username']))
{if(isset($_POST['society_id'],$_POST['society_name']))
{$society_id=$_POST['society_id'];$society_name=$_POST['society_name'];
if(!empty($society_id)&&!empty($society_name))
{$society_id=mysqli_real_escape_string($link,$society_id);
$society_name=mysqli_real_escape_string($link,$society_name);$society_name=strtolower($society_name);
	$query=" SELECT * FROM `co-ordinator` WHERE (`society_name`='$society_name' AND `society_id`='$society_id')";
	$query_run=mysqli_query($link,$query);
              if($query_run==true)
                {if(mysqli_num_rows($query_run)==1)
					{$row=mysqli_fetch_assoc($query_run);
                    $_SESSION['society_name']=$row['society_name'];
					$_SESSION['society_id']=$row['society_id'];
                     header('location:go_to.php');
					}
					else
					{echo 'invalid society_name or society_id';
					}
				}
else
{
	echo 'error'.mysqli_error($link);
}
}
else
{
	echo 'plz fill the society_id';
}
}
}
else
{header('location:login.php');
}
?>
<form action="enter_society.php" method="POST">
society_id:
<input type="password" name="society_id" ><br><br>
society name:
<input type="text" name="society_name"><br><br>
<input type="submit" name="submit">
</form>