<?php 
 include('db_connection.php'); 
 $error=""; // Variable To Store Error Message 
 if (isset($_POST['submit']))  
 { 
 if (empty($_POST['username']) || empty($_POST['password'])) 
  { 
     $error = "required field"; 
  } 

 
 
 else{// Define $username and $password 
 $d=$_POST['desn']; 
$username=mysqli_real_escape_string($connection, $_POST['username']); 
 $password=mysqli_real_escape_string($connection, $_POST['password']); 
  }
  if($d=="0") 
 { 
 $query = mysqli_query($connection,"INSERT INTO login(username, password, designation) VALUES('$username', '$password', '$d')"); 
if(!$query)
{
	echo "CANNOT REGISTER";
}
echo "registered as a admin";
} 
 if($d=="1") 
 { 
 $query = mysqli_query($connection,"INSERT INTO login(username, password,designation) VALUES('$username', '$password', '$d')"); 
if(!$query)
{
	echo "cannot register";
} 
echo "registered as a coordinator";
}

  
 
 mysqli_close($connection);
}


 ?> 
