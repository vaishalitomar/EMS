<?php
include('connect_data.php');
if(!empty($_SESSION['username']))
{if(!empty($_SESSION['society_id']))
	{if(isset($_FILES['file']['name'])&&isset($_POST['rename']))
{ $name=$_FILES['file']['name'];$rename=$_POST['rename'];$society_id=$_SESSION['society_id'];$society_name=$_SESSION['society_name'];
   if(!empty($name)&&!empty($rename))
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
    
	{   $query="INSERT INTO `upload`(`file_name`,`society_id`) VALUES('$rename','$society_id')";
            $query_run=mysqli_query($link,$query);
             if($query_run==true)
{$from=$_FILES['file']['tmp_name'];
                  $to='c:\xampp\htdocs\vaishali\uploaded/';
              if(move_uploaded_file($from,$to.$society_name.'/'.$rename))
                {echo 'file has been uploaded';}
              else{echo 'upload in directory failed';}			
echo 'data has been entered succesfully'.'<br>';}
else
{echo 'error'.mysqli_error($link);}

			
				}
			 else{ echo 'enter a valid extension';}
			  }
              else{
              	echo 'plz choose allowed extension name file';}
              
              
      }else{echo 'plz fill all the field';}
	}
	}
	else
	{ header('location:go_to.php');}
}
else
{header('location:login.php');}

?><html>

<form action="uploading.php" method="POST" enctype="multipart/form-data">
 <strong>Upload option:</strong><br><br>
  Choose a file to upload:<br>
<input type="file" name="file">
<br><br>Rename the file with extension:<br>
<input type ="text" name="rename" >
<br><br>
<input type="submit" value="Submit"><br><br>
</form>
<a href="go_to.php">HOME</a>
</html>
       