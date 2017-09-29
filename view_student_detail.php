<?php
include('db_connection.php');
session_start();
if(isset($_SESSION["name"]))

	{
		if(isset($_POST['submit']))
		{
			
		

	$event=mysqli_real_escape_string($connection,$_POST['event']);
	
	
            {

                      $query1=mysqli_query($connection, "SELECT * FROM `event` WHERE `event_name`='$event'");
                      $rows=mysqli_num_rows($query1);
                      if($rows>0)
        {
                        $row1=mysqli_fetch_array($query1);
                        $event_id=$row1['event_id'];

	$query="SELECT * FROM `registrations` WHERE(`event_id`='$event_id')";
$query_run=mysqli_query($connection,$query);
if($query_run==true)
{echo "<table border ='3'>
<tr>
<th>STUDENT NAME</th>
<th>STUDENT NO</th>
<th>BRANCH</th>
<th>YEAR</th>
<th>CONTACT NO</th>
<th>EMAIL </th>
</tr>";
//if(mysqli_num_rows($query_run)>=1)
$count=1;
while($row=mysqli_fetch_assoc($query_run))
{	echo "<tr>"; 
	echo "<td>".$row['name']."</td>";
	echo "<td>".$row['student_no']."</td>";
	echo "<td>".$row['branch']."</td>";
	echo "<td>".$row['year']."</td>";
	echo "<td>".$row['contact_no']."</td>";
	echo "<td>".$row['email']."</td>";
//echo $count.$row['name'].' '.$row['student_no'].' '.$row['branch'].' '.$row['year'].' '.$row['email'].' '.$row['contact_no'].' '.$row['hostler'].'<br>';
$count=$count+1;
}
}
}
else
{ echo 'no student regisrter for this';}
}

}
}



	
	


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
       background: url("images/coodpgbg.jpg") no-repeat center fixed; 
       background-size: cover;
     }
</style>

</head>

<body>

<script src="js/emsjs.js">
</script>

<button onclick="topFunction()" id="myBtn" title="Go to top">&nbsp;^&nbsp;</button>

<div class="header">
<a href="http://www.akgec.in/" title="AKGEC WEBSITE" target="_blank"><img style="float: left;" src="images/akgeclogo.png"></a>
  <a href="index2.php" title="LOGOUT"><img class='imgpop' style="float: right;" src="images/lo.png"></a>
  <a href = "coordinator1.html" title="HOME" ><img class='imgpop' style="float: right;" src="images/home2.png"></a>
  <div style="text-align: center;">
  <img src="images/headerlogo.png">
  <h1 style="font-size: 40px; color: #00ABDC">EVENT MANAGEMENT SYSTEM</h1>
  </div>
</div>
<div class="welcome">Students who have registered</div>
<div style="overflow-x:auto;opacity: 0.8;padding: 20px;">

<form action="view_student_detail.php" method="post">
<input style="margin-left: 30%; width: 40%" placeholder="Enter Event Name" type="text" name="event" >
<input style="width: 15%" type="submit" name = "submit" value = "submit" >
</form>
  <!--<table>
    <tr>
      <th>Student number</th>
      <th>Student Name</th>
      <th>Gender</th>
      <th>Email</th>
      <th>Mobile No.</th>
      <th>Class</th>
      <th>Hostler</th>
      <th>Document uploaded</th>
    </tr>
    <tr>
      <td>Jill</td>
      <td>Smith</td>
      <td>50</td>
      <td>50</td>
      <td>50</td>
      <td>50</td>
      <td>50</td>
      <td> 
      <button type="submit" class="button2">View</button>
      </td>
    </tr>
    <tr>
      <td>Jill</td>
      <td>Smith</td>
      <td>50</td>
      <td>50</td>
      <td>50</td>
      <td>50</td>
      <td>50</td>
      <td> 
      <button type="submit" class="button2">View</button>
      </td>
    </tr>
    <tr>
      <td>Jill</td>
      <td>Smith</td>
      <td>50</td>
      <td>50</td>
      <td>50</td>
      <td>50</td>
      <td>50</td>
      <td> 
      <button type="submit" class="button2">View</button>
      </td>
    </tr>
    
  </table> -->
</div>
</div>

<div class="footer">
  <p>EMS AKGEC 2017</p>
</div>

</body>
</html>
<?php
}
else
  header('location:index.php');
?>