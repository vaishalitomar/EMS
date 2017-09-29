<?php
require('db_connection.php');

if(isset($_POST['submit_email']) )
{
  session_start();

  $email1=$_POST['email'];
  $_SESSION["email"]=$email1;
  $select=mysqli_query($connection, "SELECT `email`,`password` from login where `email`='$email1'");
  if(mysqli_num_rows($select)==1)
  {
    while($row=mysqli_fetch_array($select))
    {
      $email=md5($row['email']);
      $pass=md5($row['password']);
    }
    $link="<a href='www.samplewebsite.com/reset.php?key=".$email."&reset=".$pass."'>Click To Reset password</a>";
    require("PHPMailer_5.2.4/class.phpmailer.php");
    $mail = new PHPMailer();
    $mail->CharSet =  "utf-8";
    $mail->IsSMTP();
    // enable SMTP authentication
    $mail->SMTPAuth = true;                  
    // GMAIL username
    $mail->Username = "nidfhi@gmail.com";
    // GMAIL password
    $mail->Password = "password";
    $mail->SMTPSecure = "tls";  
    // sets GMAIL as the SMTP server
    $mail->Host = "smtp.gmail.com";
    // set the SMTP port for the GMAIL server
    $mail->Port = "587";
    $mail->From='nidfhi@gmail.com';
    $mail->FromName='nidhi';
    $mail->AddAddress($email1, 'nidhi');
    $mail->Subject  =  'Reset Password';
    $mail->IsHTML(true);
    $mail->msgHTML(file_get_contents('link.html'));
    if($mail->Send())
    {
      echo "Check Your Email and Click onthe  the link sent to your email";
    }
    else
    {
      echo "Mail Error - >".$mail->ErrorInfo;
    }
  } 
}
?>