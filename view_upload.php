<?php
include('connect_data.php');
if(!empty($_SESSION['username']))
{if(!empty($_SESSION['society_id']))
   {if(!empty($_SESSION['society_name']))
	{$society_name=$_SESSION['society_name'];
	$society_id = $_SESSION['society_id'];
	$query = "SELECT * FROM `upload` WHERE `society_id` = '$society_id'";
	$result = mysqli_query($link,$query); //or die(mysql_error()); 


?>

<table border="1" cellpadding="5" cellspacing="5">
<tr> <th>Image</th></tr>

<?php
//var_dump('file_name');
while($row = mysqli_fetch_assoc($result)) {
?>
    <tr>

        <td><img src=
        "<?php echo 'uploaded/'.$society_name.'/'.$row['file_name']; ?>" alt=" " height="300" width="300"></td>

   </tr>

<?php   
      } 
    }
  }
}
?>
</table>
	<!--function displayimage(){
		$query="SELECT * FROM `upload` ";
		$query_run = mysqli_query($link,$query);
		while($row = mysqli_fetch_array($query_run));
		{
			echo '<img height = "300" width = "300" src = "ems1:file_name;base64,'.$row[2].'">';
		} 
	
      //  mysqli_close($link);
    // header('location:view_upload.php');
	}
	displayimage();
    }
	
	
	//displayimage();
	else
	{ header('location:go_to.php');}

	}
	
else
{header('location:login.php');}-->
