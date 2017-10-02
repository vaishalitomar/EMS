function validateonclick()
{   
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
	   {
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
	
	
   if(username==""||password=="")
	 {
	  if(username=="")
	    {
		var name=document.getElementById("name");
		name.innerHTML="enter username";
		}	
      if(password=="")
	   {
		var pass=document.getElementById("pass");
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
var codname2 =form1.codname.value;
var password2=form1.password.value;
var confirm=form1.confirm_password.value;
var email2=form1.email.value;

if(name2==""||codname2==""||password2==""||confirm==""||email2==""||confirm!=password2)
  {
   if(name2=="")
    {
      name1=document.getElementById("socname");
      name1.innerHTML="please enter name";
    }
    
    if(codname2=="")
    {
      codname1=document.getElementById("codname1");
      codname1.innerHTML="please enter coordiantor name";

    }	
   
    if(password2=="")
    {
	  passs=document.getElementById("password");
      passs.innerHTML="please enter password";
	
    }

	if(confirm=="")
    {

	conf=document.getElementById("confpass");
    conf.innerHTML="please re enter password";

    }

   if(password2!=confirm)
   {
	 conpass=document.getElementById("confpass");
     conpass.innerHTML="please re enter password";
    }
   if(email2=="")
   {
	  em=document.getElementById("email");
      em.innerHTML="please enter email id";
    }
       return false;
  }
else
   {
	return true;
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
if(eventname==""||societyname==""||eventdate==""||eventtime=="0"||eventvenue==""||eventcatergory=="")
  {
   if(eventname=="")
    {
      name1=document.getElementById("name");
      name1.innerHTML="please enter event name";
    }
    
    if(societyname=="")
    {
      socname1=document.getElementById("socname");
      socname1.innerHTML="please enter society name";

    }	
   
    if(eventdate=="")
    {
	  date1=document.getElementById("date");
      date1.innerHTML="please enter date of event";
	
    }

	if(eventtime=="0")
    {

	time1=document.getElementById("time");
    time1.innerHTML="please enter time of event";

    }

   if(eventvenue=="")
   {
	 venue1=document.getElementById("venue");
     venue1.innerHTML="please re enter password";
    }
    if(eventcategory=="0")
    {
      category1=document.getElementById("category");
      category1.innerHTML="please enter event category";
    }
   
       return false;
  }
else
   {
	return true;
   }		


}	

function validateupload()
{
	var uploadfile=document.getElementById("upload");
	var file1=uploadfile.file.value;
	var name=uploadfile.rename.value;
	if(file1==""||name=="")
	{
		if(file1=="")
		{
			var doc=document.getElementById("file");
			doc.innerHTML="please choose one file";
		}
		if(name=="")
		{
			rename=document.getElementById("rname");
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
	var eventname=form.event.value;
	var studentname=form.name.value;
	console.log(studentname);
	var studentemail=form.email.value;
    var contactno=form.contact_no.value;
	var username=form.username.value;
	var password=form.password.value;
	var studentno = form.student_no.value;
	console.log("a");
	if(eventname==""||studentname==""||studentemail==""||studentno==""||contactno==""||username==""||password=="")
	{ //console.log("a");
		if(eventname=="")
    {
      event=document.getElementById("event");
      event.innerHTML="please enter event name";
    }
    
    if(studentname=="")
    {
    	console.log(studentname);
      name=document.getElementById("name1");
      name.innerHTML="please enter student name";

    }	
   
    if(email=="")
    {
	  email=document.getElementById("email");
      email.innerHTML="please enter you email address";
	
    }
	else
	{
      var  email = document.getElementById('email');
    var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

    if (!filter.test(email.value)) {
    email.innerHTML = "Please provide a valid email address";

	}
    
	if(studentno=="")
    {
      event=document.getElementById("student_no");
      event.innerHTML="please enter student no";
    }
	else{
		  studentno = /^[1][4-7][0-9]+$/;  
      if(inputtxt.value.match(studentno))  
      {  
        studentno=document.getElementById("student_no");
      studentno.innerHTML="please enter a valid student name";
        
      }  
      else  
      {  
          studentno.innerHTML="please enter numeric value";
	}
	

   if(contactno=="")
   {
	 contact=document.getElementById("contact_no");
     contact.innerHTML="please enter contact no of student";
    }
    if(username=="")
    {
      user=document.getElementById("username");
      user.innerHTML="please enter username of student";
    }
    if(password=="")
    {
      pass=document.getElementById("password");
      pass.innerHTML="please enter password of student";
    }
   
       return false;
  }
else
   {
	return true;
   }		

	

}
  
  function abortonsubmit()
  {
  	var form=document.getElementById("abort");
  	var name1=form.event_name.value;
  	if(name1=="")
  	{
 var event=document.getElementById("name");
 event.innerHTML="enter any event name";
 return false;
  	}
  	else
  	{
  		return true;
  	}
  }