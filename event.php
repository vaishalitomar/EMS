<?php
require('connection.php');
$errevent_name=$errsociety_name=$errevent_date=$errevent_timing=$errevent_venue=$errsociety_id=$errabout_event="";
$error = 0;
if(isset($_POST['event_name'],$_POST['society_name'],$_POST['event_date'],$_POST['event_timing'],$_POST['event_venue'],$_POST['society_id'],$_POST['about_event'],$_POST['event_month'],$_POST['event_year'],$_POST['event_ist']))
{ 
  $event_name = $_POST['event_name'];
  $society_name =$_POST['society_name'];
  $event_date = $_POST['event_date'];
  $event_month =$_POST['event_month'];
  $event_year =$_POST['event_year'];
  $event_timing =$_POST['event_timing'];
  $event_ist =$_POST['event_ist'];
  $event_venue = $_POST['event_venue'];
  $society_id =$_POST['society_id'];
  $about_event =$_POST['about_event'];
   

   if(empty($society_name))
       {$errsociety_name="please fill the society name ";$error=1;}
   if(empty($event_name))
       {$errevent_name="please fill the  event name ";$error=1;}
   if(empty($society_name))
       {$errsociety_name="please fill the society name";$error=1;}
   if(empty(($event_date)&&($event_month)&&($event_year)))
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
  
  //if(empty ($gender))
  //{
    //  $errgender = "please choose one field";
      //$c=1;
  
  if($error!=1)
  {$query="INSERT INTO `co-ordinator`(`society_name`,`event_name`,`event_date`,`event_month`,`event_year`,`event_timing`,`event_ist`,`event_venue`,`society_id`,`about_event`) VALUES('$society_name','$event_name','$event_date','$event_month','$event_year','$event_timing','$event_ist','$event_venue','$society_id','$about_event')";
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
  
<form action="event.php"  method="POST">
  Society Name : <br>
    <input type="text"  name="society_name" value = "<?php if(!empty($society_name)) echo $society_name;?>">
    <span class="error">*<?php echo $errsociety_name;?><br>
  Event Name:<br>
    <input type ="text" name="event_name" maxlength="30" value="<?php if(!empty($event_name)) echo $event_name;?>">
        <span class="error">*<?php echo $errevent_name;?><br>
  Event date :<br>
  <input type="text" value="date" name="event_date" maxlength ="2" value="<?php if(!empty($event_date))echo $event_date;?>">
  <select name="event_month"  value="<?php if(!empty($event_date))echo $event_date;?>">
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
  Event Id : <br>
    <input type="text" name="society_id" value="<?php if(!empty($society_id)) echo $society_id;?>">
        <span class="error">* <?php echo $errsociety_id;?></span>
<br>
  About Event :<br><br>

<textarea  name="about_event" rows="5" cols="50" value="<?php if(!empty($about_event)) echo $about_event;?>"></textarea>

<span class="error">* <?php echo $errabout_event;?></span>
<br><br>
<input type="submit" value="Submit">
</form>


