<?php
require('db_connection.php');
require('admin&coordinator_regis.php');
echo "welcome ". $_SESSION["name"];
?>
<html>
<head>
<form action="" method="post">
<h1>registration form</h1>

<label>UserName :</label> 
<input id="name" name="username" placeholder="username" type="text"> 
<label>Password :</label> 
<input id="password" name="password" placeholder="**********" type="password"> 
<label>admin</label>
<input type="radio" name="desn" value="0"> 
 <label>coordinator:</label> 
 <input type="radio" name="desn" value="1"> 
<input name="submit" type="submit" value="submit">
</form>
</head>
</html>
