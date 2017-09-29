
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

	






