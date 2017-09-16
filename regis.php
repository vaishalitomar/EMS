<?php  
2  include('db_connection.php');  
3  $error=""; // Variable To Store Error Message  
4 session_start(); 
5 if(isset($_SESSION["name"]) 
6    { 
7  if (isset($_POST['submit']))   
8  {  
9  if (empty($_POST['username']) || empty($_POST['password']))  
10   {  
11      $error = "required field";  
12   }  
13  
14   
15   
16  else{// Define $username and $password  
17  $d=$_POST['desn'];  
18 $username=mysqli_real_escape_string($connection, $_POST['username']);  
19  $password=mysqli_real_escape_string($connection, $_POST['password']);  
20  } 
21  } 
22   if($d=="0")  
23  {  
24  $query = mysqli_query($connection,"INSERT INTO login(username, password, designation) VALUES('$username', '$password', '$d')");  
25 if(!$query) 
26 { 
27 	echo "CANNOT REGISTER"; 
28 } 
29 echo "registered as a admin"; 
30 }  
31  if($d=="1")  
32  {  
33  $query = mysqli_query($connection,"INSERT INTO login(username, password,designation) VALUES('$username', '$password', '$d')");  
34 if(!$query) 
35 { 
36 	echo "cannot register"; 
37 }  
38 echo "registered as a coordinator"; 
39 } 
40  
41   if(isset($_POST["logout"]) 
42      { 
43       session_destroy(); 
44 header("location:enter.php"); 
45      } 
46   
47  mysqli_close($connection); 
48 } 
49  
50     
51  ?>  
