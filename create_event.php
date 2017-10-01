<?php
require('db_connection.php');
session_start();
if(isset($_SESSION["name"]))
{
$errevent_name=$errsociety_name=$errevent_date=$errevent_timing=$errevent_venue=$errsociety_id=$errabout_event=$errevent_category="";


if(isset($_POST['submit']))
{
  $event_name = mysqli_real_escape_string($connection,$_POST['event_name']);
    if (!preg_match("/^[a-zA-Z ]*$/",$event_name)) {
      $errevent_name = "Only letters and white space allowed";
      $error=1; 
    }
  $event_category =mysqli_real_escape_string($connection,$_POST['event_category']);
  $event_date = mysqli_real_escape_string($connection,$_POST['event_date']);
  $regex = '/^((([1-2][0-9])|([1-9]))/([2])/[0-9]{4})|((([1-2][0-9])|([1-9])|(3[0-1]))/((1[0-2])|([3-9])|([1]))/[0-9]{4})$/';
    if(preg_match($regex, $event_date)) {
         $errevent_date="invalid date format";
         $error=1;
       }
  $event_timing =mysqli_real_escape_string($connection,$_POST['event_timing']);
  $event_ist =mysqli_real_escape_string($connection,$_POST['event_ist']);
  $event_venue = mysqli_real_escape_string($connection,$_POST['event_venue']);
  if (!preg_match("/^[a-zA-Z0-9 ]*$/",$event_venue)) {
      $errevent_venue = "Only letters,numbers and white space allowed";
      $error=1;
    }
  
   $society_name=mysqli_real_escape_string($connection, $_POST['society_name']);

  
    if(!preg_match("/^[a-zA-Z ]*$/",$society_name)) {
      $errsociety_name = "Only letters and white space allowed";
      $error=1; 
}
   
   

 $event_id=rand(10000, 20000);
 if($error!=1)
 {
 $query1=mysqli_query($connection, "SELECT * FROM `society` WHERE `society_name`='$society_name'");
 $rows=mysqli_num_rows($query1);
 if($rows>=1)
 {
  $row=mysqli_fetch_array($query1);
  $society_id=$row['society_id'];
 

 $query="INSERT INTO `event`(`society_id`,`event_name`,`event_date`,`event_timing`,`event_ist`,`event_venue`,`event_id`,`event_category`,`event_status`) VALUES('$society_id','$event_name','$event_date','$event_timing','$event_ist','$event_venue','$event_id','$event_category','pending')";
$query_run=mysqli_query($connection,$query);
if($query_run==true)
{
	header('location:success.php');
}


  
}
else
{
  header('location:Not_Registered.php');
}

}


}
?>
 <!-- 
<form action="create_event.php"  method="POST">
  Society id : <br>
    <input type="password"  name="society_id" >
    <span class="error">*<?php echo $errsociety_id;?><br>
  
  Society Name : <br>
    <input type="text"  name="society_name" value = "<?php if(!empty($society_name)) echo $society_name;?>">
    <span class="error">*<?php echo $errsociety_name;?><br>
  Event Name:<br>
    <input type ="text" name="event_name" maxlength="30" value="<?php if(!empty($event_name)) echo $event_name;?>">
        <span class="error">*<?php echo $errevent_name;?><br>
  Event date :<br>
  <input type="text" name="event_date"  value="<?php if(!empty($event_date))echo $event_date;?>">
  <?php  echo 'plz fill in the form year-month-date';?>
    <select name="event_month"  value="
	<option value="january">january</option>
    <option value="feburary">feburary</option>
    <option value="march" >march</option>
    <option value="april">april</option>
     <option value="may">may</option> 
      <option value="june">june</option>
       <option value="july">july</option>
        <option value="August">August</option>
         <option value="september">september</option>
          <option value="october">october</option>
           <option value="november">november</option>
            <option value="december">december</option>
            </select>
         
       <input  type = "text" name="event_year" maxlength ="4" value="<?php if(!empty($event_year))echo $event_year;?>">   

  
        <span class="error">*<?php echo $errevent_name;?></span><br>
  Event Timing : <br>
    <input type ="text" name="event_timing" maxlength="30" value="<?php if(!empty($event_timing)) echo $event_timing;?>">
    <select  name="event_ist"  value="<?php if(!empty($event_ist)) echo $event_ist;?>">
    <option value = "AM">AM</option>
    <option value = "PM">PM</option>
    </select>
        <span class="error">*<?php echo $errevent_timing;?></span><br>
  Event Venue :<br>
    <input type ="integer" name="event_venue" maxlength="30" value="<?php if(!empty($event_venue)) echo $event_venue;?>">
        <span class="error">*<?php echo $errevent_venue;?></span><br>
 society Id : <br>
    <input type="text" name="society_id" value="<?php if(!empty($society_id)) echo $society_id;?>">
        <span class="error">* <?php echo $errsociety_id;?></span>
<br>
  About Event :<br><br>

<textarea  name="about_event" rows="5" cols="50" value="<?php if(!empty($about_event)) echo $about_event;?>"></textarea>

<span class="error">* <?php echo $errabout_event;?></span>
<br><br>
<input type="submit" value="Submit">
</form> -->

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width = device-width, initial-scale=1.0">
<title>EMS-AKGEC</title>
<link rel="icon" href="images/logoic.ico">
    <link rel="stylesheet" type="text/css" href="css/emscss.css">

<style>
body{
       background: url("images/coodpgbg.jpg") no-repeat center fixed; 
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
<button onclick="topFunction()" id="myBtn" title="Go to top">&nbsp;^&nbsp;</button>

<div class="header">
<a href="http://www.akgec.in/" title="AKGEC WEBSITE" target="_blank"><img style="float: left;" src="images/akgeclogo.png"></a>
  <a href="logout.php" title="LOGOUT"><img class='imgpop' style="float: right;" src="images/lo.png"></a>
  <a href = "coordinator_frontpage.php" title="HOME" ><img class='imgpop' style="float: right;" src="images/home2.png"></a>
 <div style="text-align: center;">
  <img  src="images/headerlogo.png">
  <h1 style="color: #00ABDC">EVENT MANAGEMENT SYSTEM</h1>
  </div>
</div>
<div class="welcome">Welcome Coordinator</div>

<div class="row">

<div class="register">
  <div class="aside3">
    <h2 style="color: blue;text-align: center;"><b>New Event Details</b></h2><br>
         
          <form id="event" action="" method="post" onsubmit="return validateevent();">
         
            <label style="text-align: left;"><b>Event Name:</b></label>
            <p id="name"></p>
            <input type="text" name="event_name" id="textdeco" placeholder="Enter Event Name" value = "<?php if(!empty($event_name)) echo $event_name;?>" />
            <span class="error"><?php echo $errevent_name;?></span>


            <br><br>
            <p id="socname"></p>
             <label style="text-align: left;"><b>Society Name:</b></label>
            <input type="text" name="society_name" id="textdeco" placeholder="Enter society Name"  value = "<?php if(!empty($society_name)) echo $society_name;?>" />
             <span class="error">*<?php echo $errsociety_name;?></span>
            <br><br>
             <p id ="category"></p>
            <label style="text-align: left;"><b>Event Category: </b></label>
            <select name="event_category" id="textdeco"  value = "<?php if(!empty($event_category)) echo $event_category;?>" >
                <option value="0">Select</option>
                <option value="Culture">Culture</option> 
                <option value="Technical">Technical</option> 
            </select>
            
            <br><br>
            <p id="date"></p>
            <label style="text-align: left;"><b>Event Date: </b></label>
            <input type = "text" style="width: 15%" name="event_date" id="textdeco" placeholder = "YY-MM-DD" value = "<?php if(!empty($event_date)) echo $event_date;?>" >
               
     <span class="error">*<?php echo $errevent_date;?></span>
    <br><br>
    <p id="time"></p>
    <label style="text-align: left;"><b>Event Time: </b></label>
            <select style="width: 15%" name="event_timing" id="textdeco"  value = "<?php if(!empty($event_timing)) echo $event_timing;?>" >
                <option value="0">HH</option> 
                <option value="1">1</option> 
                <option value="2">2</option> 
                <option value="3">3</option> 
                <option value="4">4</option> 
                <option value="5">5</option> 
                <option value="6">6</option> 
                <option value="7">7</option> 
                <option value="8">8</option> 
                <option value="9">9</option> 
                <option value="10">10</option> 
                <option value="11">11</option> 
                <option value="12">12</option> 
    </select>:
   
    <select style="width: 15%" name="event_ist" id="textdeco"  value = "<?php if(!empty($event_ist)) echo $event_ist;?>">
                <option>AM</option> 
                <option>PM</option> 
    </select>
     
    <br><br>
    <p id="venue"></p>
    <label style="text-align: left;"><b>Venue:</b></label>
            <input type="text" name="event_venue" id="textdeco" placeholder="Enter event's venue name"  value = "<?php if(!empty($event_venue)) echo $event_venue;?>"/>
             <span class="error"><?php echo $errevent_venue;?></span>
            <br><br>
    
            
          
           
             
           
            <div style="text-align: center;">
            <br><br>
            <button type="submit" class="button2" name="submit">Submit</button>
           
           <br>.
           </div>
    </form>
  </div>
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
{
  header('location:index.php');
}

?>