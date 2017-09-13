<?php
require('db_connection.php');
include('society_regis.php');
?>
<html>
<head>
<form action="" method="post">
<h1>registration form</h1>

<label>society Name :</label> 
<input id="soc_name" name="name"  type="text"> 
<label>coordinator_name :</label> 
<input id="cod_name" name="cod_name"  type="text"> 
<label>coordinator_id</label>
<input id="cod_id" type="number" name="cod_id" value="<?php echo $cod_id;?>"> 
 <label>society_id:</label> 
 <input id="soc_id" type="number" name="soc_id" value="<?php echo "$soc_id";?>"> 
<input name="submit" type="submit" value="submit">
</form>
</head>
</html>
