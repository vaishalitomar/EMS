<?php
require('db_connection.php');
$errevent_name=$errsociety_name=$errevent_date=$errevent_timing=$errevent_venue=$errsociety_id=$errabout_event=$errevent_category="";


if(isset($_POST['submit']))
{
  $event_name = mysqli_real_escape_string($connection,$_POST['event_name']);
  $event_category =mysqli_real_escape_string($connection,$_POST['event_category']);
  $event_date = mysqli_real_escape_string($connection,$_POST['event_date']);
  $event_timing =mysqli_real_escape_string($connection,$_POST['event_timing']);
  $event_ist =mysqli_real_escape_string($connection,$_POST['event_ist']);
  $event_venue = mysqli_real_escape_string($connection,$_POST['event_venue']);
  
  $about_event =mysqli_real_escape_string($connection,$_POST['about_event']);
   $society_name=mysqli_real_escape_string($connection, $_POST['society_name']);

   if(empty($society_name))
       {$errsociety_name="please fill the society name ";$error=1;}
   if(empty($event_name))
       {$errevent_name="please fill the  event name ";$error=1;}
   if(empty($society_name))
       {$errsociety_name="please fill the society name";$error=1;}
   if(empty(($event_date)))
       {$errevent_date="please fill the event date";$error=1;}

   if(empty(($event_timing)&&($event_ist)))
       {$errevent_timing="please select the event timing";$error=1;}
   if(empty($event_venue))
       {$errevent_venue=  "please fill the event venue ";$error=1;}

   if(empty($society_id))
       {$errsociety_id="please fill the society Id";$error=1;}
   if(empty($about_event))
       { $errabout_event="please fill about the event";$error=1;}
   if(preg_match("/^[a-zA-Z0-9]+$/",$event_venue)==0)
       {$errname ="special character is not allowed";$error=1;}
     

 $event_id=rand(10000, 20000);
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


  else
  {
    echo 'cannot register';
    echo mysqli_errno($connection).":".mysqli_error($connection);
  }
}
else
{
  echo "cannot";
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

<button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>

<div class="header">
<a href="http://www.akgec.in/" target="_blank"><img style="float: left;" src="images/akgeclogo.png"></a>
  <h1 style="opacity: 1;">Event Management system</h1>
</div>
<div class="welcome">Welcome Coordinator</div>

<div class="row">

<div class="register">
  <div class="aside3">
    <h2 style="color: blue;text-align: center;"><b><u>New Event Details</u></b></h2><br>
    <form action="" method="post">
         <!--   <label style="text-align: left;"><b>Society Id.:</b></label>
            <input type="text" name="number" pattern="^[+0-9]{1,3})?([0-9]{10}$" id="textdeco" placeholder="Enter Event Id (5 digits)" required="required" />
            <br><br> -->
            <label style="text-align: left;"><b>Event Name:</b></label>
            <input type="text" name="event_name" id="textdeco" placeholder="Enter Event Name" required="required" pattern="^[a-zA-Z]{1,40}$" value = "<?php if(!empty($event_name)) echo $event_name;?>" />
            <span class="error">*<?php echo $errevent_name;?>


            <br><br>
             <label style="text-align: left;"><b>Society Name:</b></label>
            <input type="text" name="society_name" id="textdeco" placeholder="Enter Event Name" required="required" pattern="^[a-zA-Z]{1,40}$" value = "<?php if(!empty($society_name)) echo $society_name;?>" />
             <span class="error">*<?php echo $errsociety_name;?>
            <br><br>

            <label style="text-align: left;"><b>Event Category: </b></label>
            <select name="event_category" id="textdeco" required="required" value = "<?php if(!empty($event_category)) echo $event_category;?>" >
                <option>select</option>
                <option>Culture</option> 
                <option>Technical</option> 
            </select>
             <span class="error">*<?php echo $errevent_category;?>
            <br><br>
            <label style="text-align: left;"><b>Event Date: </b></label>
            <input type = "text" style="width: 15%" name="event_date" id="textdeco" required="required" placeholder = "YY-MM-DD" value = "<?php if(!empty($event_date)) echo $event_date;?>" >
               
     <span class="error">*<?php echo $errevent_date;?>
    <br><br>
    <label style="text-align: left;"><b>Event Time: </b></label>
            <select style="width: 15%" name="event_timing" id="textdeco" required="required" value = "<?php if(!empty($event_timing)) echo $event_timing;?>" >
                <option>HH</option> 
                <option>1</option> 
                <option>2</option> 
                <option>3</option> 
                <option>4</option> 
                <option>5</option> 
                <option>6</option> 
                <option>7</option> 
                <option>8</option> 
                <option>9</option> 
                <option>10</option> 
                <option>11</option> 
                <option>12</option> 
    </select>:
   
    <select style="width: 15%" name="event_ist" id="textdeco" required="required" value = "<?php if(!empty($event_ist)) echo $event_ist;?>">
                <option>AM/PM</option> 
                <option>AM</option> 
                <option>PM</option> 
    </select>
     <span class="error">*<?php echo $errevent_timing;?>
    <br><br>
    <label style="text-align: left;"><b>Venue:</b></label>
            <input type="text" name="event_venue" id="textdeco" placeholder="Enter event's venue name" required="required" value = "<?php if(!empty($event_venue)) echo $event_venue;?>"/>
             <span class="error">*<?php echo $errevent_venue;?>
            <br><br>
    
            
          
            <label style="text-align: left;"><b>Upload Event details:</b></label> <span class="error">*<?php echo $errabout_event;?><br>
            <input type="text" name="about_event" id="fileToUpload" value = "<?php if(!empty($about_event)) echo $about_event;?>"><br><br>
             
           

            <br><br>
            <button type="submit" class="button2" name="submit">Submit</button>
           
           <br>.
           </div>
    </form>
  </div>
</div>

</div>

<div class="footer">
  <p>Thank You</p>
</div>


</body>
</html>


