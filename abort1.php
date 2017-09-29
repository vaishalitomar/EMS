
<?php
include('db_connection.php');
if(!empty($_SESSION['username']))
   {
     
       echo ' you have suceesfully abort the event';
       header('location:abort2.php');
     
     else
      {
        header('location:index.php');}
   }

     }

?>