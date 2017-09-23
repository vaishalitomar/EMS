<?php
include('db_connection.php');
if(!empty($_SESSION['username']))
   {
    if(!empty($_SESSION['society_id']))
	    {
        if(isset($_FILES['file']['name'])&&isset($_POST['rename']))
         {
          $name=$_FILES['file']['name'];$rename=$_POST['rename'];$society_id=$_SESSION['society_id'];$society_name=$_SESSION['society_name'];
           if(!empty($name)&&!empty($rename))
             {
              $offset=0; 
                while($count=strpos($name,'.',$offset))
                {
                 $offset=$count+1;}
                $ext= strtoupper(substr($name,$offset));

                if(($ext=='PDF')||($ext=='TXT')||($ext=='PNG')||($ext=='JPEG')||($ext=='JPG'))
                 {
                   $offset=0; 
                    while($count=strpos($rename,'.',$offset))
                  {
                   $offset=$count+1;}
                  $ext= strtoupper(substr($rename,$offset));
                  if(($ext=='PDF')||($ext=='TXT')||($ext=='PNG')||($ext=='JPEG')||($ext=='JPG'))
    
                  	{  
                      $query="INSERT INTO `upload`(`file_name`,`society_id`) VALUES('$rename','$society_id')";
                      $query_run=mysqli_query($connection,$query);
                     if($query_run==true)
                       {
                           $from=$_FILES['file']['tmp_name'];
                           $to='c:\xampp\htdocs\EMS\uploaded/';
                          if(move_uploaded_file($from,$to.$society_name.'/'.$rename))
                          {echo 'file has been uploaded';}
                          else{echo 'upload in directory failed';}			
                           echo 'data has been entered succesfully'.'<br>';
                       }
                     else
                          {echo 'error'.mysqli_error($connection);}
      
			
		             		}
			            else
                    { echo 'enter a valid extension';}
			           }       
              else
                {echo 'plz choose allowed extension name file';}
              
              
            }
            else
              {echo 'plz fill all the field';}
	       }
	}
	     else
	        { header('location:go_to.php');}
}
else
{header('location:login.php');}

?>

       

       <!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
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

<button onclick="topFunction()" id="myBtn" title="Go to top">&nbsp;^&nbsp;</button>

<div class="header">
     <a href="http://www.akgec.in/" target="_blank"><img style="float: left;" src="images/akgeclogo.png">
     </a>
     <a ><img class='imgpop' style="float: right;" src="images/lo.png">
     </a>
     <a href="index.html" title="HOME" ><img class='imgpop' style="float: right;" src="images/home2.png">
     </a>
      <h1 style="text-align: center;" >EVENT MANAGEMENT SYSTEM</h1>
</div>
<div class="welcome">Welcome Coordinator</div>

  <div class="row">
   
   <div class="register">
     <div class="aside3">
       <h2 style="color: blue;text-align: center;"><b>Upload File</b></h2><br>
         <form action="uploading.php" method = "POST" enctype="multipart/form-data">

            <label style="text-align: left;"><b>Upload File:</b></label><br><br>
            <input type="file" name="file" id="fileToUpload"><br><br>
            <label style="text-align: left;"><b>RENAME FILE:</b></label>
            <input type="text" name="rename" id="textdeco" placeholder="Enter file name" required="required"/>
            <br><br> 
            
            <input style="width: 20%" type="submit" value="submit">
            <br><br>       
         </form>
  </div>
</div>

</div>

<div class="footer">
  <p>Thank You</p>
</div>


</body>
</html>
