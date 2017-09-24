function validateindexform()

{   var err="";
    var err1="wrong username or password";
   var form=document.getElementById("indexform");
   var errdiv=document.getElementById("msg");
   var error=document.getElementById("wronginfo");
   
	var username=form.uname.value;
	var password=form.psw.value;
	if(username=="")
	{
		window.alert("please enter username");
		return false
	}
	else if(password=="")
	{
		window.alert("please enter password");
		return false;
	}
	
	else
	{
		return true;
	}
	




}
function validatesocregistrationform()
{   var form1=document.getElementById("socregistrationform");
	var societyname=form1.name.value;
	var coordinatorname=form1.cod_name.value;
	if(societyname=="")
	{
		window.alert("enter society name");
		return false
	}
	else if(coordinatorname="")
	{
		window.alert("enter coordinator name");
		return false;
		
	}
	
	else
	{
		return true;
	}

}
function checkpassword()
{
	window.alert("wrong username or password");
	return false;
}