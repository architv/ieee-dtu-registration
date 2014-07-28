function validateRegEx(regex, inputStr)
{
	if( !regex.test(inputStr))
		return false;
	else
		return true;
}


function validateName(inputField)
{
	if(inputField.value.length == 0)
	{
		document.getElementById("name_help").innerHTML = "The field cannot be left blank." ;
		document.getElementById("name").style.borderColor="#FE642E";
		return false;
	}//^[A-Za-z]+ ([A-Za-z])*
	
	/*else if(!validateRegEx(/^[A-Za-z]+(\s[A-Za-z])*$/, inputField.value))
	{
		document.getElementById("name_help").innerHTML = "Please enter only alphabets." ;
		document.getElementById("name").style.borderColor="#FE642E";
		return false;
	}*/
	
	else
	{
		document.getElementById("name_help").innerHTML = "" ;
		document.getElementById("name").style.borderColor="#40FF00";
		return true;
	}
	
	
}	

function validateFathername(inputField)
{
	if(inputField.value.length == 0)
	{
		document.getElementById("fathername_help").innerHTML = "The field cannot be left blank." ;
		document.getElementById("fathername").style.borderColor="#FE642E";
		return false;
	}
	
	/*else if(!validateRegEx(/^[A-Za-z]+(\s[A-Za-z])*$/, inputField.value))
	{
		document.getElementById("fathername_help").innerHTML = "Please enter only alphabets." ;
		document.getElementById("fathername").style.borderColor="#FE642E";
		return false;
	}*/
	
	else
	{
		document.getElementById("fathername_help").innerHTML = "" ;
		document.getElementById("fathername").style.borderColor="#40FF00";
		return true;
	}
	
}	
	
	
	
function validateDate(inputField) 
{	
	if(inputField.value.length == 0)
	{
		document.getElementById("dob_help").innerHTML = "The field cannot be left blank." ;
		document.getElementById("dob").style.borderColor="#FE642E";
		return false;
	}
	
	/*else if(!validateRegEx(/^\d{2}\/\d{2}\/\d{4}$/, inputField.value))
	{
		document.getElementById("dob_help").innerHTML = "The date should be of the format dd/mm/yyyy" ;
		return false;
	}*/
	
	else 
	{
		document.getElementById("dob_help").innerHTML = "" ;
		document.getElementById("dob").style.borderColor="#40FF00";
		return true;
	}
	

}
function validateNumber(inputField)
{
	if(inputField.value.length == 0)
	{
		document.getElementById("mobile_help").innerHTML = "The field cannot be left blank." ;
		document.getElementById("mobile").style.borderColor="#FE642E";
		return false;
	}
	
	else if(isNaN(inputField.value))
	{
	   document.getElementById("mobile_help").innerHTML = "Please enter only digits." ;
	   document.getElementById("mobile").style.borderColor="#FE642E";
	   return false;
	}
	
	else if(inputField.value.length != 10)
	{
		document.getElementById("mobile_help").innerHTML = "Please enter exactly 10 digits." ;
		document.getElementById("mobile").style.borderColor="#FE642E";
		return false;
	}

	else
	{
	 document.getElementById("mobile_help").innerHTML = "" ;
	 document.getElementById("mobile").style.borderColor="#40FF00";
	 return true;
	}
	
		
}


function validateEmail(inputField)
{
	if(inputField.value.length == 0)
	{
		document.getElementById("email_help").innerHTML = "Please enter your email-id." ;
		document.getElementById("email").style.borderColor="#FE642E";
		return false;
	}
	else if(!validateRegEx(/^[\w\.-_\+]+@[\w-]+(\.\w{2,4})+$/, inputField.value))
	{
		document.getElementById("email_help").innerHTML = "The email-id should be of the form something@example.com." ;
		document.getElementById("email").style.borderColor="#FE642E";
		return false;
	}
	else
	{
		document.getElementById("email_help").innerHTML = "" ;
		document.getElementById("email").style.borderColor="#40FF00";
		return true;
	}
	
}

function validatePassword(inputField)
{
	if(inputField.value.length == 0)
	{
		document.getElementById("pass_help").innerHTML = "This field cannot be left blank." ;
		document.getElementById("pass").style.borderColor="#FE642E";
		return false;
	}
	else if(!validateRegEx(/^.{6,20}$/, inputField.value))
	{
		document.getElementById("pass_help").innerHTML = "Password should be 6-20 characters long" ;
		document.getElementById("pass").style.borderColor="#FE642E";
		return false;
	}
	else
	{
		document.getElementById("pass_help").innerHTML = "" ;
		document.getElementById("pass").style.borderColor="#40FF00";
		return true;
	}
	
}

function validateConfirmpassword(inputField) 
{
	if(inputField.value.length == 0)
	{
		document.getElementById("confirmpass_help").innerHTML = "This field cannot be left blank." ;
		document.getElementById("confirmpass").style.borderColor="#FE642E";
		return false;
	}
	else if(inputField.value!=(document.getElementById("pass").value))
	{
		document.getElementById("confirmpass_help").innerHTML = "The password does not match" ;
		document.getElementById("confirmpass").style.borderColor="#FE642E";
		return false;
	}
	else
	{
		document.getElementById("confirmpass_help").innerHTML = "Password matched!" ;
		document.getElementById("confirmpass").style.borderColor="#40FF00";
		return true;
	}
	
	
}

function validateRollno(inputField) 
{	
	if(inputField.value.length == 0)
	{
		document.getElementById("rollno_help").innerHTML = "This field cannot be left blank." ;
		document.getElementById("rollno").style.borderColor="#FE642E";
		return false;
	}
	else if(!validateRegEx(/(DTU\/)? ?\w{4}\/\w{2,3}\/\d{3,4}$/, inputField.value))
	{
		document.getElementById("rollno_help").innerHTML = "Please enter the roll number correctly" ;
		document.getElementById("rollno").style.borderColor="#FE642E";
		return false;
	}
	else
	{
		document.getElementById("rollno_help").innerHTML = "" ;
		document.getElementById("rollno").style.borderColor="#40FF00";
		return true;
	}
	
	
}

function validateAddress(inputField)
{
	if(inputField.value.length == 0)
	{
		document.getElementById("address_help").innerHTML = "The field cannot be left blank." ;
		document.getElementById("address").style.borderColor="#FE642E";
		return false;
	}
	else
	{
		document.getElementById("address_help").innerHTML = "" ;
		document.getElementById("address").style.borderColor="#40FF00";
		return true;
	}
	
	
}


/*
function formCheck(inputField.value) 
{
	if (validateName(form["name"]) && validateName(form["fathername"]) && validateMobile(form["mobile"]) && validateEmail(form["email"]) && validatePassword(form["pass"]) && validateConfirmpassword(form["confirmpass"]) && validateAddress(form["address"]) && validateRollno(form["rollno"]) && validateDate(form["dob"]))
		document.getElementById('submit').disabled = false;
}
*/

function formSubmit(form)
{
  if (validateName(form["name"]) && validateName(form["fathername"]) && validateMobile(form["mobile"]) && validateEmail(form["email"]) && validatePassword(form["pass"]) && validateConfirmpassword(form["confirmpass"]) && validateAddress(form["address"]) && validateRollno(form["rollno"]) && validateDate(form["dob"]))
	{
		
		alert("Thank you for submitting the form");
		form.submit();
	}
  else
  {
	
    alert("There is some problem with the data you submitted");

  }
}
