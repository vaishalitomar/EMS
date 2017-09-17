<?php
include('connection.php');
if(isset($_POST['society_id']))
{$society_id=$_POST['society_id'];
if(!empty($society_id))
{$society_id=mysqli_real_escape_string($link,$society_id);
	$query=" SELECT `society_name` FROM `co-ordinator` WHERE `society_id`=$society_id";
	$query_run=mysqli_query($link,$query);
              if($query_run==true)
                {$row=mysqli_fetch_assoc($query_run);
                    $society_name=$row['society_name'];
echo $society_name;
$to='c:\xampp\htdocs\EMS\uploaded/';
header('Location:uploaded/'.$society_name);// put here $society name;

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
}?>







<form action="view_upload.php" method="POST">
society_id:
<input type="password" name="society_id" ><br><br>
<input type="submit" value ="Submit">
</form>