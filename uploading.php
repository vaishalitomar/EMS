<?php
include('db_connection.php');
session_start();
if(isset($_SESSION['name']))
   {
          if(isset($_POST['submit']))
         {
          $name=$_FILES['file']['name'];
          $rename=$_POST['rename'];
               if(!empty($name)&&!empty($rename))
             {
              $offset=0; 
                   while($count=strpos($name,'.',$offset))
                {
                 $offset=$count+1;
                }
                $ext= strtoupper(substr($name,$offset));

                     if(($ext=='PNG')||($ext=='JPEG')||($ext=='JPG'))
                 {
                   $offset=0; 
                        while($count=strpos($rename,'.',$offset))
                  {
                   $offset=$count+1;}
                  $ext= strtoupper(substr($rename,$offset));
                          if(($ext=='PNG')||($ext=='JPEG')||($ext=='JPG'))
    
                    {  
                      $cod_name=$_SESSION["name"];
                      $query1=mysqli_query($connection, "SELECT * FROM coordinator WHERE `coordiantor_name`='$cod_name'");
                      $rows=mysqli_num_rows($query1);
                      if($rows>0)
                      {
                        $row=mysqli_fetch_array($query1);
                        $society_id=$row['society_id'];
                      $query="INSERT INTO `upload`(`file_name`,`society_id`) VALUES('$rename','$society_id')";
                      $query_run=mysqli_query($connection,$query);
                     if($query_run==true)
                       {
                           $from=$_FILES['file']['tmp_name'];
                           $to='c:\xampp\htdocs\EMS2\uploaded/';
                          if(move_uploaded_file($from,$to.$rename))
                          { 
                            header('location:success.php');
                          }
                          else
                            {
                              echo 'upload in directory failed';
                        }     
                           
                       }
                     else
                          {
                            echo 'error'.mysqli_error($connection);
                          }
      
      
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
  <img  src="images/headerlogo.png">
  <h1 style="color: #00ABDC">EVENT MANAGEMENT SYSTEM</h1>
  </div>
</div>
<div class="welcome">Welcome Coordinator</div>

  <div class="row">
   
   <div class="register">
     <div class="aside3">
       <h2 style="color: blue;text-align: center;"><b>Upload File</b></h2><br>
         <form action="uploading.php" method = "post" enctype="multipart/form-data">

            <label style="text-align: left;"><b>Upload File:</b></label><br><br>
            <input type="file" name="file" id="fileToUpload"><br><br>
            <label style="text-align: left;"><b>RENAME FILE:</b></label>
            <input type="text" name="rename" id="textdeco" placeholder="Enter file name" required="required"/>
            <br><br> 
            
            
            <input style="width: 20%" type="submit" name = "submit" value="submit">
            <br><br>       
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
  header('location:index.php');
?>