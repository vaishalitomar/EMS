<?php
require('db_connection.php');
session_start();

$usernameerr=$passworderr="";

$msg="";
$msg1="";
if(!isset($_SESSION["name"]))
{
  if(isset($_POST['submit']))
  {
   $error=0;
   if(empty($_POST['uname']))
   {
    $usernameerr="username is required";
    $error='1';
   }

  $username=mysqli_real_escape_string($connection, $_POST['uname']);
  if(empty($_POST['psw']))
  {
   $passworderr="password is required";
   echo $passworderr; 
   $error='1';  
  }

 $password=mysqli_real_escape_string($connection, $_POST['psw']);

 
 $query=mysqli_query($connection, "SELECT * FROM login WHERE username='$username' AND password='$password'");

 $rows=mysqli_num_rows($query);
 if($rows>=1)
 {
  $_SESSION["name"]=$username;
  $row=mysqli_fetch_array($query);
  $d=$row['position'];
  if($d=="0")
  {
    header('location:admin1.php');
  }
  if($d=="1")
  {
    header('location:coordinator1.php');
  }
  if($d=="2")
  {
    header('location:superadmin.php');
  }
}
else
{
  ?>
  <script >
    var wrong=document.getElementById("name");
    wrong.innerHTML="WRONG USERNAME OR PASSWORD";
  </script>
  <?php
}
}



?>

<!DOCTYPE html>
<html>
<head>

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>EMS-AKGEC</title>
  <link rel="icon" href="images/icon.ico">
  <link rel="stylesheet" type="text/css" href="css/emscss.css">
  <link href="https://fonts.googleapis.com/css?family=Passion+One|Raleway:700|Open+Sans|Karla" rel="stylesheet">
  <style>

    body{
     background: url("images/homepgbg2.jpg") no-repeat center fixed; 
     background-size: cover;
   }
 </style>

</head>

<body onload="typeWriter()">
<script src="validation.js"></script>
  <div class="header">


    <a href="http://www.akgec.in/" target="_blank"><img style="float: left;" src="images/akgeclogo.png">  </a>
    <a href="index2.php" ><img class='imgpop' style="float: right;" src="images/lo.png"></a>
    <a  title="HOME" ><img class='imgpop' style="float: right;" src="images/home2.png"></a>


    <div style="text-align: center;">
    <img class='imgpop' src="images/headerlogo.png">
    <h1 style="color: #00ABDC">EVENT MANAGEMENT SYSTEM</h1>
    </div>
  </div>
  <!-- upcoming events -->
  
  <h1 style="margin-left: 10%; font-family:'Karla', sans-serif; color:white; font-size:70px" id="demo"></h1>

  <div class="row">
    <div class="slider" id="main-slider"><!-- outermost container element -->
      <div class="slider-wrapper">
      <!-- innermost wrapper element -->
      <img class="slide" src="images/Sample01.jpg">
      <img class="slide" src="images/Sample02.jpg">
      <img class="slide" src="images/Sample03.jpg">
      <img class="slide" src="images/Sample04.jpg">
      <img class="slide" src="images/Sample02.jpg">
     <!-- <?php
      $query2=mysqli_query($connection, "SELECT * FROM 'upload'");
      while($row=mysqli_fetch_assoc($query2)){
      ?>

 <img class="slide" src="<?php echo 'uploaded/'.$row['file_name'];?>" height="400" width="300" alt>
 <?php
       } 
       ?>-->
      </div>  
      
    </div>


      <div class="col-3a">
      <div class="aside">

        <h1>STUDENTS</h1>
        <button onclick="location.href='registration.php'" class="button">Registration</button>
      </div>
      </div>

    <div class="col-3a">
      <div class="aside">
        <h1>LOGIN</h1> 
        <button id="btn" class="button">Login</button>
      </div>
    </div>


    <div id="myModal" class="modal">

      <!-- Modal content -->
      <div class="modal-content">
        <div class="modal-header">
          <span class="close">&times;</span>
          <h1 style="text-align: center; font-size:25px">LOGIN</h1><hr>
        </div>
        <div class="modal-body">
          <form id="indexform" action="" method="post" onsubmit="return validateonsubmit();" >    
           <p id="name"></p>
            <label style="text-align: left;"><b>USERNAME</b></label>
            <input type="text" placeholder="Enter Username" name="uname"  > <br><br>
            <p id="pass"></p>
            <label style="text-align: left;"><b>PASSWORD</b></label>

            <input type="password" placeholder="Enter Password" name="psw"  onclick="return validateonclick();"> 
            <br>
            <input style="margin-left: 20%;" type="submit" value="Login" name="submit">
            <br>
            <a href="phpmailer2\reset_pass.html">forgot password</a>
          </form>
        </div>
      </div>

    </div>

  </div>

  <div class="footer">
    <p>Thank You</p>
  </div>
  <script src="js/emsjs.js">
  </script>
  
  
  <script >
    function() {

      function Slideshow( element ) {
        this.el = document.querySelector( element );
        this.init();
      }

      Slideshow.prototype = {
        init: function() {
          this.wrapper = this.el.querySelector( ".slider-wrapper" );
          this.slides = this.el.querySelectorAll( ".slide" );
          this.previous = this.el.querySelector( ".slider-previous" );
          this.next = this.el.querySelector( ".slider-next" );
          this.index = 0;
          this.total = this.slides.length;
          this.timer = null;

          this.action();
          this.stopStart(); 
        },
        _slideTo: function( slide ) {
          var currentSlide = this.slides[slide];
          currentSlide.style.opacity = 1;

          for( var i = 0; i < this.slides.length; i++ ) {
            var slide = this.slides[i];
            if( slide !== currentSlide ) {
              slide.style.opacity = 0;
            }
          }
        },
        action: function() {
          var self = this;
          self.timer = setInterval(function() {
            self.index++;
            if( self.index == self.slides.length ) {
              self.index = 0;
            }
            self._slideTo( self.index );

          }, 3000);
        },
        stopStart: function() {
          var self = this;
          self.el.addEventListener( "mouseover", function() {
            clearInterval( self.timer );
            self.timer = null;

          }, false);
          self.el.addEventListener( "mouseout", function() {
            self.action();

          }, false);
        }


      };

      document.addEventListener( "DOMContentLoaded", function() {

        var slider = new Slideshow( "#main-slider" );

      })
    }


  </script>
</body>
</html>
<?php
}
else
{
  header('location:loggedin.php');
}
?>