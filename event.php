<?php
require('connection.php');
$errevent_name=$errevent_category=$errsociety_name=$errevent_date=$errevent_timing=$errevent_venue=$errsociety_id="";
$error = 0;
if(isset($_POST['event_category'],$_POST['event_name'],$_POST['society_name'],$_POST['event_date'],$_POST['event_timing'],$_POST['event_tim_min'],$_POST['event_venue'],$_POST['society_id'],$_POST['event_month'],$_POST['event_year'],$_POST['event_ist']))
{ 
  $event_category = $_POST['event_category'];
  $event_name = $_POST['event_name'];
  $society_name =$_POST['society_name'];
  $event_date = $_POST['event_date'];
  $event_month =$_POST['event_month'];
  $event_year =$_POST['event_year'];
  $event_timing =$_POST['event_timing'];
  $event_tim_min = $_POST['event_tim_min'];
  $event_ist =$_POST['event_ist'];
  $event_venue = $_POST['event_venue'];
  $society_id =$_POST['society_id'];
  //$about_event =$_POST['about_event'];
   
   if(empty($event_category))
        {$errevent_category = "please choose the event Category";}
   
   if(empty($event_name))
       {$errevent_name="please fill the  event name ";$error=1;}
   if(empty($society_name))
       {$errsociety_name="please fill the society name";$error=1;}
   if(empty(($event_date)&&($event_month)&&($event_year)))
       {$errevent_date="please fill the event date";$error=1;}

   if(empty(($event_timing)&&($event_tim_min)&&($event_ist)))
       {$errevent_timing="please select the event timing";$error=1;}
   if(empty($event_venue))
       {$errevent_venue=  "please fill the event venue ";$error=1;}

   if(empty($society_id))
       {$errsociety_id="please fill the society Id";$error=1;}
    
  // if(empty($about_event))
      // { $errabout_event="please fill about the event";$error=1;}
   //if(preg_match("/^[a-zA-Z0-9]+$/",$event_venue)==0)
     //  {$errname ="special character is not allowed";$error=1;}
  
  //if(empty ($gender))
  //{
    //  $errgender = "please choose one field";
      //$c=1;
  
  if($error!=1)
  {$query="INSERT INTO `co-ordinator`(`event_category`,`event_name`,`society_name`,`event_date`,`event_month`,`event_year`,`event_timing`,`event_tim_min`,`event_ist`,`event_venue`,`society_id`) VALUES('$event_category','$event_name','$society_name','$event_date','$event_month','$event_year','$event_timing','$event_tim_min','$event_ist','$event_venue','$society_id')";
$query_run=mysqli_query($link,$query);
if($query_run==true)
{echo "you have register sucessfully";}
else
{echo 'error'.mysqli_error($link);}
  }
  else 
    {echo 'sai hai';}
}
?>
 
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
    <form action="event.php" method = "POST">
         <!--   <label style="text-align: left;"><b>Society Id.:</b></label>
            <input type="text" name="number" pattern="^[+0-9]{1,3})?([0-9]{10}$" id="textdeco" placeholder="Enter Event Id (5 digits)" required="required" />
            <br><br> -->
            <label style="text-align: left;"><b>Event Name:</b></label>  <span class="error">*<?php echo $errevent_name;?>
            <input type="text" name="event_name" id="textdeco" placeholder="Enter Event Name" required="required" pattern="^[a-zA-Z]{1,40}$" value = "<?php if(!empty($event_name)) echo $event_name;?>" />
            <br><br>
             <label style="text-align: left;"><b>Society Name:</b></label><span class="error">*<?php echo $errsociety_name;?>
            <input type="text" name="society_name" id="textdeco" placeholder="Enter Event Name" required="required" pattern="^[a-zA-Z]{1,40}$" value = "<?php if(!empty($society_name)) echo $society_name;?>" />
            
            <br><br>

            <label style="text-align: left;"><b>Event Category: </b></label><span class="error">*<?php echo $errevent_category;?>
            <select name="event_category" id="textdeco" required="required" value = "<?php if(!empty($event_category)) echo $event_category;?>" >
                <option>select</option>
                <option>Culture</option> 
                <option>Technical</option> 
            </select>
             
            <br><br>
            <label style="text-align: left;"><b>Event Date: </b></label>
            <select style="width: 15%" name="event_date" id="textdeco" required="required" value = "<?php if(!empty($event_date)) echo $event_date;?>" >
                <option>DD</option> 
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
                <option>13</option> 
                <option>14</option> 
                <option>15</option> 
                <option>16</option> 
                <option>17</option> 
                <option>18</option> 
                <option>19</option> 
                <option>20</option> 
                <option>21</option> 
                <option>22</option> 
                <option>23</option> 
                <option>24</option> 
                <option>25</option> 
                <option>26</option> 
                <option>27</option> 
                <option>28</option> 
                <option>29</option> 
                <option>30</option> 
                <option>31</option> 
    </select>
    <select style="width: 15%" name="event_month" id="textdeco" required="required" value = "<?php if(!empty($event_month)) echo $event_month;?>" >
                <option>MM</option> 
                <option>january</option> 
                <option>feburary</option> 
                <option>march</option> 
                <option>april</option> 
                <option>may</option> 
                <option>june</option>
                <option>july</option> 
                <option>august</option> 
                <option>september</option> 
                <option>october</option> 
                <option>november</option> 
                <option>december</option> 
                
    </select>
    <select style="width: 20%" name="event_year" id="textdeco" required="required" value = "<?php if(!empty($event_year)) echo $event_year;?>">
                <option>YYYY</option> 
                <option>2017</option> 
                <option>2018</option> 
    </select>
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
    <select style="width: 15%" name="event_tim_min" id="textdeco" required="required" value = "<?php if(!empty($event_tim_min)) echo $event_tim_min;?>">
                <option>MM</option> 
                <option>00</option>
                <option>05</option> 
                <option>10</option> 
                <option>15</option> 
                <option>20</option> 
                <option>25</option> 
                <option>30</option> 
                <option>35</option> 
                <option>40</option>
                <option>45</option>
                <option>50</option>
                <option>55</option> 
                
                
                
    </select>
    <select style="width: 15%" name="event_ist" id="textdeco" required="required" value = "<?php if(!empty($event_ist)) echo $event_ist;?>">
                <option>AM/PM</option> 
                <option>AM</option> 
                <option>PM</option> 
    </select>
     <span class="error">*<?php echo $errevent_timing;?>
    <br><br>
    <label style="text-align: left;"><b>Venue:</b></label><span class="error">*<?php echo $errevent_venue;?>
            <input type="text" name="event_venue" id="textdeco" placeholder="Enter event's venue name" required="required" value = "<?php if(!empty($event_venue)) echo $event_venue;?>"/>
                         <br><br>
    
            <label style="text-align: left;"><b>Society Id.:</b></label> <span class="error">*<?php echo $errsociety_id;?>
            <input type="text" name="society_id" pattern="^[+0-9]{1,3})?([0-9]{10}$" id="textdeco" placeholder="Enter Event Id (5 digits)" required="required" value = "<?php if(!empty($society_id)) echo $society_id;?>"/>
             
            <br><br> 

          <!--  <label style="text-align: left;" name="participants" value = "<?php if(!empty($participants)) echo $participants;?>"><b>Participants:</b></label><span class="error">*<?php echo $errparticipants;?>
            <br><br>
            <input type="checkbox" name="first" value="First" /> First year<br>
            <input type="checkbox" name="second" value="Second" /> Second year<br>
            <input type="checkbox" name="third" value="Third" /> Third year<br>
            <input type="checkbox" name="fourth" value="Fourth" /> Fourth year<br>
             
            <br><br> -->
            <label style="text-align: left;"><b>Upload Event Pic (420x600px and 200kB ):</b></label><br>
            <input type="file" name="fileToUpload" id="fileToUpload"><br><br>
            <input style="width: 20%" type="submit" value="Upload Image" name="submit">
            <br><br>
            <!--
            <label style="text-align: left;"><b>Upload Event details:</b></label> <span class="error">*<?php echo $errabout_event;?><br>
            <input type="file" name="about_event" id="fileToUpload" value = "<?php if(!empty($about_event)) echo $about_event;?>"><br><br>
             
            <input style="width: 20%" type="submit" value="Upload" name="submit">

            <br><br> -->
            <button type="submit" class="button2">Submit</button>
           <!--<button type="reset" class="button3">Reset</button> -->
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
