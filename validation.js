function validateonclick()
{   console.log("a");
//console.log("a");
//var err="";
//var err1="wrong username or password";
var form=document.getElementById("indexform");
   
var username=form.uname.value;
var password=form.psw.value;
	
if(username=="")
	{ 
	var name=document.getElementById("name");
	name.innerHTML="enter username";
	return false;
	
     if(password=="")
	   { window.history.go(-1)
	   var pass=document.getElementById("pass");
	   pass.innerHTML="enter password";
	   }

    }
else
	{
	return true;
	}
	
}
function validateonsubmit()
{
var form=document.getElementById("indexform");
   
   
var username=form.uname.value;
var password=form.psw.value;
	
var name=document.getElementById("name");
name.innerHTML="";
	//console.log("a");
var pass=document.getElementById("pass");
pass.innerHTML="";
   
if(username==""||password=="")

	  {  
	  
	 
   if(username=="")
	   
     {
		
		name.innerHTML="enter username";

		}	
  if(password=="")
	   
     {
		
    pass.innerHTML="enter password";
	   }

	return false;
     }
  
  else
     {  
 	return true;
     }
}
	
function validate()
{   
	//console.log("a");

var form1=document.getElementById("registration");
	
var name2=form1.name.value;
var coordinatorname2 =form1.codname.value;
var password2=form1.password.value;
var confirm=form1.confirm_password.value;
var email2=form1.email.value;


var name1=document.getElementById("socname");
name1.innerHTML="";


var coordinatorname1=document.getElementById("codname1");
coordinatorname1.innerHTML="";

var pass=document.getElementById("password");
pass.innerHTML="";

var confirmpass=document.getElementById("confpass");
confirmpass.innerHTML="";




em=document.getElementById("email");
em.innerHTML="";
 error_name=false;
 error_codname=false;
 error_passs=false;
 error_conpass=false;
error_conf=false;



if(name2==""||coordinatorname2==""||password2==""||confirm==""||email2==""||confirm!=password2)
  { 
   if(name2=="")
    {
      
      name1.innerHTML="please enter name";
      error_name=true;
    }
    
    if(coordinatorname2=="")
    {
     
      coordinatorname1.innerHTML="please enter coordiantor name";
      

    }	
   
    if(password2=="")
    {
	 
      pass.innerHTML="please enter password";
      
	
    }

	if(confirm=="")
    {

	
    confirmpass.innerHTML="please re enter password";
    error_conf=true;

    }

   if(password2!=confirm)
   {
	 
     confirmpass.innerHTML="please re enter password";
     error_conpass=true;
    }
   if(email2=="")
   {
	  
      em.innerHTML="please enter email id";
      error_em=true;
    }
   var emailvalid = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
   if(email2.match(emailvalid))
  
    {
    
    }

   else
     {
        em.innerHTML="enter a valid email address";
    
     }
  
    var pattern=/[^a-z|^A-Z|^\s]/;
    if(name2.match(pattern))
    {
       name1.innerHTML="only alphabets and white spaces are allowed";
    }
 
   if(coordinatorname2.match(pattern))
   {
      coordinatorname1.innerHTML="only alphabets and white spaces are allowed";
   }

 return false;

  }

else

{
  var emailvalid = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  
  var pattern=/[^a-z|^A-Z|^\s]/;
  if(name2.match(pattern)||coordinatorname2.match(pattern)||!email2.match(emailvalid))
  {

    if(email2.match(emailvalid))
      {
    
      }
    else
      {
        em.innerHTML="enter a valid email address";
  
      }
    if(name2.match(pattern))
      {
        name1.innerHTML="only alphabets and white spaces are allowed";

      }   

    if(coordinatorname2.match(pattern))
     {
       coordinatorname1.innerHTML="only alphabets and white spaces are allowed";

    }
    return false;
}
  else
{
  return true;
}
}	


}

function validateevent()
{
 console.log("a");
 var event1=document.getElementById("event");
 var eventname=event1.event_name.value;
 var societyname=event1.society_name.value;
 var eventdate=event1.event_date.value;
 var eventtime=event1.event_timing.value;
 var eventvenue=event1.event_venue.value;
 var eventcategory=event1.event_category.value;

name1=document.getElementById("name");
name1.innerHTML="";


socname1=document.getElementById("socname");
socname1.innerHTML="";

date1=document.getElementById("date");
date1.innerHTML="";

time1=document.getElementById("time");
time1.innerHTML="";

venue1=document.getElementById("venue");
venue1.innerHTML="";

category1=document.getElementById("category");
category1.innerHTML="";

if(eventname==""||societyname==""||eventdate==""||eventtime=="0"||eventvenue==""||eventcatergory=="")
  {
   if(eventname=="")
    {
      
      name1.innerHTML="please enter event name";
    }
    
    if(societyname=="")
    {
      
      socname1.innerHTML="please enter society name";

    }	
   
    if(eventdate=="")
    {
	  
      date1.innerHTML="please enter date of event";
	
    }

	if(eventtime=="0")
    {

	
    time1.innerHTML="please enter time of event";

    }

   if(eventvenue=="")
   {
	 venue1=document.getElementById("venue");
     venue1.innerHTML="please re enter password";
    }
    if(eventcategory=="0")
    {
      
      category1.innerHTML="please enter event category";
    }


    var pattern=/[^a-z|^A-Z|^\s]/;
   if(eventname.match(pattern))
    {
       name1.innerHTML="only alphabets and white spaces are allowed";
    }

   if(societyname.match(pattern))
    {
       socname1.innerHTML="only alphabets and white spaces are allowed";
    }
   
       return false;
  }
else
    {

       
       
           if(eventname != /[^a-z|^A-Z|^\s]/)
             {
               name1.innerHTML="only alphabets and white spaces are allowed";
             }
             


            if(societyname !=  /[^a-z|^A-Z|^\s]/)
             {
                socname1.innerHTML="only alphabets and white spaces are allowed";
              } 

          return false;

          }

        	
    

    }	

function validateupload()
{
	var uploadfile=document.getElementById("upload");
	var file1=uploadfile.file.value;
	var name=uploadfile.rename.value;

  var doc=document.getElementById("file");
  doc.innerHTML="";

  var rename=document.getElementById("rname");
  rename.innerHTML="";
	if(file1==""||name=="")
	{
		if(file1=="")
		{
			
			doc.innerHTML="please choose one file";
		}
		if(name=="")
		{
			
			rename.innerHTML="give file any name";
		}
		
		return false;

	}
	else
	{
		return true;
	}

}


function validateregisonsubmit()
{ console.log("a");
	var form=document.getElementById("registrationform");
	
	var studentname=form.name.value;
	console.log(studentname);
	var studentemail=form.email.value;
  var contactno=form.contact_no.value;
  var studentno=form.student_no.value;
	var username=form.username.value;
	var password=form.password.value;
  
	console.log("a");
 

  var name=document.getElementById("name1");
  name.innerHTML="";

  var email=document.getElementById("email1");
  email.innerHTML="";

  var contact=document.getElementById("contactno");
  contact.innerHTML="";

 var student=document.getElementById("studentno");
  student.innerHTML="";

  var user=document.getElementById("username");
  user.innerHTML="";

  var pass=document.getElementById("password");
  pass.innerHTML="";

  


	if(studentname==""||studentemail==""||studentno==""||contactno==""||username==""||password==""||studentno=="")
	{ //console.log("a");


		
    
    if(studentname=="")
    {
    	//console.log(studentname);
      
      name.innerHTML="please enter student name";

    }	
    else
    {
      if(studentname==/^[A-Za-z\s]+$/)
      {

      }
      else
      {
        name.innerHTML = "* only white spaces and letters are allowed ";
      }
    }

    if(studentno=="")
    {
      student.innerHTML="please enter student no of student";
    }
    else
    {
      
      if( (studentno > 1399999)&&(studentno < 1800000))
      
      {
        
      }
      else
      {
        student.innerHTML="enter a valid student no";
      }
    }
   
    if(studentemail=="")
    {
	  
      email.innerHTML="please enter student email id of student";
	
    }

	

   if(contactno=="")
   {  
	 
     contact.innerHTML="please enter contact no of student";
    }
    else
    {
      if(contactno > 7000000000)
      {

      }
      else
      {
        contact.innerHTML = "please enter a valid contact no";
      }
    }
    if(username=="")
    {
     
      user.innerHTML="please enter username of student";
    }
    if(password=="")
    {
      
      pass.innerHTML="please enter password of student";
    }
     

    if(studentname.match(pattern))
      {
        name.innerHTML="only alphabets and white spaces are allowed";
      }

    var emailvalid = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if(studentemail.match(emailvalid))
    {
    
    }
    else
    {
       email.innerHTML="enter a valid email address";
    
    }   
       return false;
}
   else
   {
    var pattern=/[^a-z|^A-Z|^\s]/;
    var emailvalid = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if(studentname.match(pattern)||!studentemail.match(emailvalid))
        {
          if(studentemail.match(emailvalid))
           {
    
           }
          else
           {
           email.innerHTML="enter a valid email address";
    
            } 
         

          if(studentname.match(pattern))
           {
              name.innerHTML="only alphabets and white spaces are allowed";
           }
          return false;  
        }
  else

    {
	return true;
   }
   }		

	

}
  
  function abortonsubmit()
  {  
  	var form=document.getElementById("abort");
  	var name1=form.event_name.value;

var event=document.getElementById("name");
event.innerHTML="";
 
  	if(name1=="")
  	{
 
 event.innerHTML="enter any event name";
 
 return false;
  	}

  	else
  	{
  		return true;
  	}
  }
  

  function validatesuperadmin()
{
var form=document.getElementById("superadmin");
 console.log("a") ; 
   
var username=form.uname.value;
var password=form.psw.value;
var pass1=form.confirm_psw.value;
var email1=form.email.value;
  
var name=document.getElementById("name");
name.innerHTML="";
  //console.log("a");
var pass=document.getElementById("password");
pass.innerHTML="";
var pass2=document.getElementById("confirmpass");
pass2.innerHTML="";

var email=document.getElementById("email");
email.innerHTML="";  
if(username==""||password==""||pass1==""||pass1!=password||email=="")

    {  
    
   
   if(username=="")
     
     {
    
    name.innerHTML="enter username";

    } 
  if(password=="")
     
     {
    
    pass.innerHTML="enter password";
     }

     
     if(email1=="")
     {
      email.innerHTML="enter your email id";
     }

     if(pass1=="")
     {
      pass2.innerHTML="reenter password";
     }

if(password!=pass1)
{
 pass2.innerHTML="reenter password";
}

 var emailvalid = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if(email1.match(emailvalid))
    {
    
    }
    else
    {
       email.innerHTML="enter a valid email address";
    
    }   
  return false;
     }
  
  else
     { 

     var emailvalid = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if(email1.match(emailvalid))
    {
    
    }
    else
    {
       email.innerHTML="enter a valid email address";
       return false;
    
    }    
  return true;
     }
}
  