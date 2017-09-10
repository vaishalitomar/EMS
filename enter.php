<?php
include("login2.php");
?>


   
<html>
<head>
<title>Login Form in PHP with Session</title>

</head>
<body>
<div id="main">

<div id="login">
<h2>Login Form</h2>

<form name="enter" action="" method="post">
<label>admin:</label>
<input type="radio" name="desn" value="0">
<label>coordinator:</label>
<input type="radio" name="desn" value="1">
<br><br>
<label>UserName :</label>
<input id="name" name="username" placeholder="username" type="text">
<label>Password :</label>
<input id="password" name="password" placeholder="**********" type="password">
<input name="submit" type="submit" value=" Login ">
<span><?php echo $error; ?></span>
</form>
</div>
</div>
</body>
</html>
