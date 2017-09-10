<?php
require ('connection.php');
$username = $event = $name = $gender = $email = $student_no = $salt = $password = $pass = "";
if( $_SERVER["REQUEST_METHOD"] == "POST")
{
	$username=($_POST['username']);
	$event=($_POST['event']);
$name=($_POST['name']);
$gender=($_POST['gender']);
$email=($_POST['email']);
$student_no=($_POST['student_no']);
$salt = '910610nc5672cciakdl1';
$password = ($_POST['pass'].$pass);
$password=sha1($_POST['pass']);
$pass=($_POST['pass1']);
function test_input($data){
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}
 if (empty($username)) {
    $usernameErr = "username is required";
  }
  else{
  	$query="INSERT INTO `registrations`(`username`) VALUES('$username')";
  	}



if(empty($name)){
	$nameErr = "name is required";
     }
   else{ 
    
        
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed"; 
    }
    else{$query = "INSERT INTO `registrations`(`name`) VALUES('$name')";
    	}
    }


     if (empty($email)) {
    $emailErr = "Email is required";
  } else {
    
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
       }
      else{$query = "INSERT INTO `registrations`(`email`) VALUES('$email')";
    	}

    }

    if(empty($event)){
	$eventErr = "event is required";
     }
   else{ 
   
        
    
    $query = "INSERT INTO `registrations`(`event`) VALUES('$event')";
    	
    }
  
  if(empty($gender)){
	$genderErr = "gender is required";
     }
   else{ 
    
        
   
    $query = "INSERT INTO `registrations`(`gender`) VALUES('$gender')";
    	
    }

    if(empty($student_no)){
	$student_noErr = "student number is required";
     }
   else{ 
    // check if name only contains letters and whitespace
    if (strlen($student_no) != 7){
      $student_noErr = "student no must be of 7 number"; 
    }
    else{$query = "INSERT INTO `registrations`(`student_no`) VALUES('$student_no')";
    	}
    }

    if(empty($pass)){
	$passErr = "password is required";
     }
   else{
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$password)) {
      $passErr = "Only letters and white space allowed"; 
    }
    else{$query = "INSERT INTO `registrations`(`password`) VALUES('$password')";
    	}
    }
$query_run=mysqli_query($link,$query);
if($query_run==true)
	{echo 'you have been register';
}else
	{echo 'error';echo 'error'.mysqli_error($link);
}
}
?>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
username<br>
<input type="text" name="username"><br>
event<br>
<input type ="text" name="event"><br>
Name<br>
<input type ="text" name="name"> <br>
gender<br>
<select name ="gender"><br>
<option value="male">male</option>
<option value="female">female</option>
</select><br>
email<br>
<input type="text" name="email"><br>
student no<br>
<input type="text" name="student_no"><br>
<br>
password<br>
<input type="password" name="pass"><br>
<br>confirm password<br>
<input type="password" name="pass1"><br>
<br><input type="submit" value="submit">
</form>