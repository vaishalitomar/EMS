<?php
require('db_connection.php');
?>

<?php
if(isset($_POST['submit']))
{
$search=$_POST['search1'];

$query=mysqli_query($connection, "SELECT * FROM `co-ordinator` WHERE event_name  LIKE '%".$search."%'");
$rows=mysqli_num_rows($query);
if($rows>0)
{
while($rows>0)
{

         $row = mysqli_fetch_array($query);
         echo $row['event_name'];
$rows=$rows-1;
}
}

else
{
  echo "no result found";
}
}
?>
<html>
<form action="" method="post">
<input type="text" name="search1" value="search1">
<button  style="float: center;" type="submit" class="button3" name="submit">search</button>
</form>
</html>