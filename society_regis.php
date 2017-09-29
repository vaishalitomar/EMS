<?php 
 include('db_connection.php'); 
 $error="";
session_start();
 if (isset($_POST['submit']))  
 {
 if (empty($_POST['name']) || empty($_POST['cod_id'])|| empty($_POST['soc_id'])|| empty($_POST['cod_name'])) 
  { 
     $error = "required field"; 
  } 
  else
 { 
 $name=mysqli_real_escape_string($connection, $_POST['name']); 
 $soc_id= $_POST['soc_id']; 
 $cod_id=mysqli_real_escape_string($connection, $_POST['cod_id']); 
 $coordinator=mysqli_real_escape_string($connection, $_POST['cod_name']); 
 }
  
  
$query = mysqli_query($connection, "INSERT INTO society(society_name, society_id, coordinator_name, coordinator_id)  VALUES('$name', '$soc_id', '$coordinator', '$cod_id')"); 
if(!$query)
{
	echo " SORRY CANNOT REGISTER";
}
else
{
   echo "registered as a society";
}
 
mysqli_close($connection);
}
?> 
