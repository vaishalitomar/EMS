<?php
require('db_connection.php');
session_start();
if(isset($_SESSION["name"]))
{
  if (isset($_POST['submit']))  
 { 
 if (empty($_POST['uname']) || empty($_POST['psw'])) 
  { 
     $error = "required field"; 
  } 

 
 
 else

 {
 // Define $username and password

 
 $username=mysqli_real_escape_string($connection, $_POST['uname']); 
 $password=mysqli_real_escape_string($connection, $_POST['psw']); 
 $confirm_password=mysqli_real_escape_string($connection, $_POST['con_psw']); 
 
 
 }
 

 if($confirm_password==$password)
 { 

$query = mysqli_query($connection,"INSERT INTO login(username, password, position) VALUES('$username', '$password', '0')"); 
if(!$query)
{
  echo "CANNOT REGISTER";
}
echo "registered as a admin";



}


else
{
  ?>
  <script>
  window.alert("re enter password" );
  </script>
  <?php
}
 }

?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>EMS-AKGEC</title>
    <link rel="stylesheet" type="text/css" href="css/emscss.css">

<style>
body{
       background: url("images/adminpgbg.jpg") no-repeat center fixed; 
       background-size: cover;
     }
</style>

</head>

<body>

<div class="header">
<a href="http://www.akgec.in/" target="_blank"><img style="float: left;" src="images/akgeclogo.png"></a>
  <a href="index2.php"><img style="float: right;" src="images/lo.png"></a>
  <a  title="HOME"><img style="float: right;" src="images/home2.png"></a>
  <h1 style="text-align: center;">Event Management system</h1>
</div>
<div class="welcome">Welcome Super Admin</div>

<div class="row">

<div class="register">
  <div class="aside3">
    <h2 style="color: darkgreen;text-align: center;"><b>New Admin Details</b></h2><hr><br>
    <form action="" method="post">
    <label><p style="text-align: left;"><b>Username</b><p></label>
    <input type="text" placeholder="Enter Username" name="uname" required>
    <label><p style="text-align: left;"><b>Password</b><p></p></label>
    <input type="password" placeholder="Enter Password" name="psw" required>
    
    <label><p style="text-align: left;"><b>Confirm Password</b><p></p></label>
    <input type="password" placeholder="Re Enter Password" name="con_psw" required>
    
    
    <input type="submit"  name="submit" value="submit">
    </form>

    <br><br>
    
  </div>
</div>

</div>

<div class="footer">
  <p>Thank You</p>
</div>

</body>
</html>
<?php
}
else
  header('location:index.php');
mysqli_close($connection);
?>