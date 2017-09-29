<?php
require('connection.php');
if(isset($_FILES['file']['name'],$_POST['rename'],$_POST['society_id']))
{ $name=$_FILES['file']['name'];$rename=$_POST['rename'];$society_id=$_POST['society_id'];
   if(!empty($name)&&!empty($rename)&&!empty($society_id))
    { $offset=0; 
        while($count=strpos($name,'.',$offset))
         { $offset=$count+1;}
          $ext= strtoupper(substr($name,$offset));

           if(($ext=='PDF')||($ext=='TXT')||($ext=='DOC')||($ext=='HTML')||($ext=='HTM')||($ext=='ZIP')||($ext=='JPEG')||($ext=='JPG'))
              {$offset=0; 
        while($count=strpos($rename,'.',$offset))
         { $offset=$count+1;}
          $ext= strtoupper(substr($rename,$offset));
          if(($ext=='PDF')||($ext=='TXT')||($ext=='DOC')||($ext=='HTML')||($ext=='HTM')||($ext=='ZIP')||($ext=='JPEG')||($ext=='JPG'))
    
             {$society_id=mysqli_real_escape_string($link,$society_id);
              $query="INSERT INTO `upload`(`file_name`,`society_id`) VALUES('$rename','$society_id')";
              $query_run=mysqli_query($link,$query);
              if($query_run==true)
                {echo 'data has been enterd';
            }
            else
            {
              echo 'error'.mysqli_error($link);
            }
            $query="SELECT `society_name` FROM `co-ordinator` WHERE `society_id` ='$society_id'";
            $query_run=mysqli_query($link,$query);
              if($query_run==true)
                {if(mysqli_num_rows($query_run))
                  {$row=mysqli_fetch_assoc($query_run);
                  $society_name=$row['society_name'];echo $society_name;

                
              $from=$_FILES['file']['tmp_name'];
                  $to='c:\xampp\htdocs\EMS2\uploaded/';
              if(move_uploaded_file($from,$to.$society_name.'/'.$rename))
                {echo 'file has been uploaded';}
                 else{ echo 'uploading failed ';}
              }
              else{echo 'society id not found';}
            }
                else
            {
              echo 'error'.mysqli_error($link);
          }        
          
             } else{
              	echo 'plz enter a valid extension name';}
              
              }   
            else
              {echo  'plz put the valid extension';}
      }else{echo 'plz fill all the field';}
}
?>
<html>

<form action="upload.php" method="POST" enctype="multipart/form-data">
 <strong>Upload option:</strong><br><br>
  Choose a file to upload:<br>
<input type="file" name="file">
<br><br>Rename the file with extension:<br>
<input type ="text" name="rename" ><br><br>
society_id:<br><br>
<input type="password" name="society_id">
<br><br>
<input type="submit" value="Submit"><br><br>

 <a href="view_upload.php"><strong>VIEW UPLOADED FILE</strong></a><br><br>
 <a  href="delete.php"><strong>BACK</strong></a>

</form>
</html>
       