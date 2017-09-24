<?php
include('db_connection.php');
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
    case 'C':if(empty($_SESSION['society_id']))
 {

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

        <script >
           var snd1= new Audio("sounds/welcomecood.mp3");
             snd1.play();
             </script>

            <div class="header">
                 <a href="http://www.akgec.in/" target="_blank"> 
                 <img style="float: left;" src="images/akgeclogo.png"> 
                 </a>
                <a > 
                <img class='imgpop' style="float: right;" src="images/lo.png">
                </a>
                <a href="index.html" title="HOME" >
                <img class='imgpop' style="float: right;" src="images/home2.png">
                </a>
                <h1 style="text-align: center;" >EVENT MANAGEMENT SYSTEM
                </h1>
            </div>

            <div class="welcome">Welcome Coordinator
            </div>

        <div class="row">
                 <div class="requests">
                      <div class="aside">
                          <h1>EVENTS GOING ON</h1>
                          <button onclick="location.href='view_current_event.php'" class="button">Check
                          </button>
                     </div>
                 </div>

            <div class="requests">
                  <div class="aside">
                      <h1>NEW EVENT</h1>
                      <button onclick="location.href='create_event.php'" class="button">Apply
                      </button>
                  </div>
            </div>

            <div class="requests">
                  <div class="aside">
                     <h1>ENTER TO YOUR SOCIETY</h1>
                     <button onclick="location.href='enter_society.php'" class="button">Enter
                     </button>
                 </div>
           </div>

       </div>
           <div class="footer">
                <p>Thank You</p>
           </div>

</body>
     </html>
<?php
      
 }



	 if(!empty($_SESSION['society_id']))
       {
			 	?>
			 <!DOCTYPE html>
             <html>
               <head>
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                   <title>EMS-AKGEC
                   </title>
                      <link rel="stylesheet" type="text/css" href="css/emscss.css">
                 <style>
                   body{
                        background: url("images/coodpgbg.jpg") no-repeat center fixed; 
                        background-size: cover;
                       }
                 </style>
               </head>
                   <body>

                      <div class="header">
                           <a href="http://www.akgec.in/" target="_blank">
                           <img style="float: left;" src="images/akgeclogo.png">
                           </a>
                           <a >
                           <img class='imgpop' style="float: right;" src="images/lo.png">
                           </a>
                           <a href="index.html" title="HOME" >
                           <img class='imgpop' style="float: right;" src="images/home2.png">
                           </a>
                           <h1 style="text-align: center;" >EVENT MANAGEMENT SYSTEM
                           </h1>
                           </div>
                           <div class="welcome">Welcome Coordinator
                           </div>
          <div class="row">

                              <div class="requests">
                                  <div class="aside">
                                      <h1>UPLOAD A FILE</h1>
                                      <button onclick="location.href='uploading.php'" class="button">UPLOAD FILE
                                      </button>
                                  </div>
                              </div>

                              <div class="requests">
                                 <div class="aside">
                                   <h1>VIEW/DELETE FILES</h1>
                                      <button onclick="location.href='view_upload.php'" class="button">File
                                      </button>
                                 </div>
                              </div>

                              <div class="requests">
                                 <div class="aside">
                                    <h1>STUDENT DETAILS</h1>
                                     <button onclick="location.href='view_student_detail.php'" class="button">Details
                                     </button>
                                  </div>
                              </div>

                              <div class="requests">
                                <div class="aside">
                                    <h1>ABORT EVENT</h1>
                                    <button onclick="location.href='abort2.php'" class="button">Abort
                                    </button>
                                </div>
                              </div>

                              <div class="requests">
                                <div class="aside">
                                    <h1>LOGOUT FROM SOCIETY</h1>
                                    <button onclick="location.href='log_out_society.php'" class="button">Abort
                                    </button>
                                </div>
                              </div>


          </div>
     </body>
</html>

			 <?php 
        }
			 break;
			 
}
   ?>


            <a href="logout.php">LOGG OUT</a><?php
$query="SELECT `time` FROM `login` WHERE `username`='$username'";
 $query_run=mysqli_query($connection,$query);
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



			 