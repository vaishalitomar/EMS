
<?php
include('db_connection.php');
if(!empty($_SESSION['username']))
   {
     if(!empty($_SESSION['society_id']))
     {
       echo ' you have suceesfully abort the event';
     }
     else
      {header('location:go_to.php');}
   }

     else
      {header('location:login.php');}

?>