<?php
include('connect_data.php');
if(!empty($_SESSION['username']))
{$c=$_SESSION['position'];$username=$_SESSION['username'];
  switch($c)
{
	case 'S':?><html><a href="view_current_event.php">VIEW CURRENT EVENT</a><br>
	         <a href="student_upload.php">VIEW FILE</a><br>
			 <a href="furtherr_query.php">FURTHER QUERY</a><br></html><?php
			 break;
    case 'A':?><html><a href="view_current_event.php">VIEW CURRENT EVENT</a><br>
	         <a href="about_event.php">ABOUT_EVENT</a><br>
			 <a href="abort2.php">ABORT</a><br>
			 <a href="uploaded/">VIEW UPLOAD FILE</a><br>
			 <a href="view_student_detail.php">VIEW STUDENT DETAIL</a><br></html><?php
			 break;	
    case 'C':if(empty($_SESSION['society_id'])) {?><html><a href="view_current_event.php">VIEW CURRENT EVENT</a><br>
	         <a href="create_event.php">CREATE_EVENT</a><br>
	         <a href="enter_society.php">ENTER INTO SOCIETY</a><br></html><?php }
			 if(!empty($_SESSION['society_id']))
			 {?><html><a href="uploading.php">UPLOAD A FILE</a><br>
		     <a href="view_upload.php">VIEW UPLOAD FILE</a><br>
			 <a href="view_student_detail.php">VIEW STUDENT DETAIL</a><br>
			 <a href="delete_uploaded_file.php">DELETE UPLOADED FILE</a><br>
			 <a href="abort2.php">ABORT</a><br>
			 <br><a href="log_out_society.php">LOGGING OUT FROM SOCIETY</a>
			 </html><?php }
			 break;
}
             ?><a href="logout.php">LOGG OUT</a><?php
$query="SELECT `time` FROM `login` WHERE `username`='$username'";
 $query_run=mysqli_query($link,$query);
              if($query_run==true)
                {$row=mysqli_fetch_assoc($query_run);
			echo 'you have last login '.$row['time'];
           }
		   else
		   {echo 'error'.mysqli_error();}
}else
{ header('location:login.php');
}
?>

			 