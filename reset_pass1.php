<?php
if(isset($_POST["submit_email"]))
{
	$email=$_POST['email'];
	session_start();
	$_SESSION["email"]=$email;
	
	header('location:send_link.php');

}
?>
<html>
  <body>
    <form method="post" action="">
      <p>Enter Email Address To Send Password Link</p>
      <input type="text" name="email">
      <input type="submit" name="submit_email">
    </form>
  </body>
</html>