
function validateonclick()

{   

	console.log("a");
	var err="";
    var err1="wrong username or password";
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
	
function validatesoconclick()
{
	var form1=document.getElementById("socregistration");
	var cod_name=document.getElementById("coordinatorname");
	var password1=document.getElementById("pass");
	var confirm_pass=document.getElementById("confirm_pass");
	var emaill=document.getElementById("email1");
	var name=form1.name.value;
	var codname =form1.codname.value;
	var password=form1.password.value;
	var confirm=form1.confirm_password.value;
	var email=form1.email.value;
cod_name.onfocus()=function()
{
if(name=="")
{
name1=document.getElementById("socname");
name1.innerHTML="please enter name";
return false;
}
};
if(password1.onfocus())
{
if(name=="")
{
name1=document.getElementById("socname");
name1.innerHTML="please enter  name";
}

if(codname=="")
{
codname1=document.getElementById("codname");
codname1.innerHTML="please enter name";
return false;
}	
};


 
	
if(confirm_pass.onfocus())
{
if(name=="")
{
name1=document.getElementById("socname");
name1.innerHTML="please enter  name";
}

if(codname=="")
{
codname1=document.getElementById("codname");
codname1.innerHTML="please enter name";

}
if(password=="")
{
	passs=document.getElementById("password");
passs.innerHTML="please enter password";
return false;	
}
};
	
if(emaill.onfocus())
{
if(name=="")
{
name1=document.getElementById("socname");
name1.innerHTML="please enter  name";
}

if(codname=="")
{
codname1=document.getElementById("codname");
codname1.innerHTML="please enter name";

}
if(password=="")
{
	passs=document.getElementById("password");
passs.innerHTML="please enter password";

}
if(confirm=="")
{
	conf=document.getElementById("confpass");
conf.innerHTML="please enter password";
return false;
}
};
}
		
	

	
	





