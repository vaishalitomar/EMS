<?php
require('db_connection.php');
session_start();
$errsociety_name=$errcoordinator_name=$erremail="";
if(isset($_SESSION["name"]))
{
  if(isset($_POST['submit']))
  {
    $soc_name=mysqli_real_escape_string($connection, $_POST["name"]);
    if (!preg_match("/^[a-zA-Z ]*$/",$soc_name)) {
      $errsociety_name = "*Only letters and white space allowed"; 
      $error=1;
    }
    $cod_name=mysqli_real_escape_string($connection, $_POST["codname"]);
    if (!preg_match("/^[a-zA-Z ]*$/",$cod_name)) {
      $errcoordinator_name = "*Only letters and white space allowed"; 
      $error=1;
    }
    $email=mysqli_real_escape_string($connection, $_POST["email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $erremail = "*Invalid email format"; 
      $error=1;
    }
    $password=mysqli_real_escape_string($connection, $_POST["password"]);
    $confirm_pass=mysqli_real_escape_string($connection, $_POST["confirm_password"]);
    $cod_id=rand(10000, 20000);
    $soc_id=rand(10000, 20000);
  
if($error!=1)
{
    
        $query=mysqli_query($connection,"INSERT INTO society(`society_name`, `society_id`) VALUES('$soc_name', '$soc_id')");
        $query1=mysqli_query($connection, "INSERT INTO coordinator(`coordinator_id`, `society_id`, `coordiantor_name`)VALUES('$cod_id', '$soc_id', '$cod_name')");
        $query3=mysqli_query($connection, "INSERT INTO login(`username`, `password`, `position`, `email`) VALUES('$cod_name', '$password', '1', '$email')");

           if(!$query||!$query1||!$query3)
            {
              header('location:tryagain.php');
            }
           else
           {
             header('location:successfullyregistered.php');
           }
}
      }
    

mysqli_close($connection);
 ?>
 <!DOCTYPE html>
 <html>
 <head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>EMS-AKGEC</title>
  <link rel="icon" href="images/logoic.ico">
  <link rel="stylesheet" type="text/css" href="css/emscss.css">

  <style>
    body{
     background: url("images/adminpgbg.jpg") no-repeat center fixed; 
     background-size: cover;
   }
   .error {color: #FF0000;}
 </style>

</head>

<body>

  <script src="js/emsjs.js">
  </script>
  <script src="validation.js">
  </script>
  <button onclick="topFunction()" id="myBtn" title="Go to top">top</button>

  <div class="header">
    <a href="http://www.akgec.in/" title="AKGEC WEBSITE" target="_blank"><img style="float: left;" src="images/akgeclogo.png"></a>
    <a href="index2.php" title="LOGOUT"><img class='imgpop' style="float: right;" src="images/lo.png"></a>
    <a  title="HOME" ><img class='imgpop' style="float: right;" src="images/home2.png"></a>
    <div style="text-align: center;">
      <img src="images/headerlogo.png">
      <h1 style="color: #00ABDC">EVENT MANAGEMENT SYSTEM</h1>
    </div>
  </div>
  <div class="welcome">Welcome Admin</div>

  <div class="row">

    <div class="register">
      <div class="aside3">
        <h2 style="color: darkgreen;text-align: center;"><b>NEW SOCIETY DETAILS</b></h2><hr><br>
        
 <form id="registration" action="" method="post" onsubmit="return validate();">
           <label style="text-align: left;"><b>Society Name:</b></label><span class="error"><?php echo $errsociety_name; ?></span>
          <p id="socname"></p>
          <input type="text" name="name" id="society_name" placeholder="Enter Society Name"  />
          <br><br>
          <p id="codname1"></p>
          <label style="text-align: left;"><b>Coordinator Name:</b></label><span class="error"><?php echo $errcoordinator_name; ?></span>
          <input type="text" name="codname" id="coordinatorname" placeholder="Coordinator name" />
          <br><br>
            <p id="password"></p>
            <label style="text-align: left;"><b>Password:</b></label>
            <input type="password" name="password" id="pass" placeholder="password" />
            <br><br>
            <p id="confpass"></p>
            <label style="text-align: left;"><b>Confirm Password:</b></label>
            <input type="password" name="confirm_password" id="Conf_pass" placeholder="confirm password" />
            <br><br>
            <p id="email"></p>
             <label style="text-align: left;"><b>Email:</b></label><span class="error"><?php echo $erremail ?></span>
            <input type="text" name="email" id="email1" placeholder="email" />
            <br><br>
            
            <input type="checkbox" value="YES" id="agree" name="agree" />
            <label for="agree" class="checkbox" ><b>Do you Agree our terms and Conditions ?</b></label><br>

            <div style="text-align: center;">
            <br><br>
            <button type="submit" class="button2" name="submit">Submit</button>
          </div>
        </form>
        <br><br>
        <div id="overlay" onclick="off()">
         <div id="text">Terms And Conditions</div>
       </div>

       <div style="text-align: center;">
         <button style="color:white; background-color:blue;" class="button" onclick="on()">TermsAndCondition</button>
         <br>.
       </div>
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
{
  header('location:index.php');
}
?>