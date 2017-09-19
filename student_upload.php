<?php
include('connect_data.php');
if(!empty($_SESSION['username']))
{$username=$_SESSION['username'];
$query="SELECT `society_name` FROM `registrations` WHERE `username`='$username'";
$query_run=mysqli_query($link,$query);
if($query_run==true)
{$row=mysqli_fetch_assoc($query_run);
$society_name=$row['society_name'];
header('location:uploaded/'.$society_name.'/');
}
else
{echo 'error'.mysqli_error($link);
}
}
else
{header('location:login.php');
}
?>
