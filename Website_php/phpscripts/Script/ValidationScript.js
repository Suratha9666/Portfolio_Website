
/* JS Functions for form validations*/

/* Contact Validation */

function validateContact(){
	var x = document.forms["contactform"]["name"].value;
  	if (x == "") {
    	alert("Name must be filled out");
    	return false;
    }
    var y = document.forms["contactform"]["email"].value;
    var emailRegx = /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$/
  	if (y == "") {
    	alert("Email is required");
    	return false;
    }
    else if(!(emailRegx.test(y))){
    	alert("Email should be in proper format e.g. john_doe@gmail.com")
    	return false;
    }
    var z = document.forms["contactform"]["message"].value;
    if (z == "") {
    	alert("Please type in the message!");
    	return false;
    }
    else if(document.forms["contactform"]["message"].maxlength>200){
    	alert("Message cannot exceed 200 characters");
    	return false;
    }
    return true;
}


/* Login Validation */	

function validateLogin(){
	var x = document.forms["loginform"]["name"].value;
  	if (x == "") {
    	alert("UserName is required for login");
    	return false;
    }
    var y = document.forms["loginform"]["password"].value;
  	if (y == "") {
    	alert("Password is required for login");
    	return false;
    }
    return true;
}


/* Signup Validation */

function validateSignup(){
	var x = document.forms["signupform"]["name"].value;
  	if (x == "") {
    	alert("FirstName must be entered");
    	return false;
    }
    var z = document.forms["signupform"]["lastname"].value;
  	if (z == "") {
    	alert("LastName must be filled out");
    	return false;
    }
    var y = document.forms["signupform"]["email"].value;
    var emailRegx = /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$/
  	if (y == "") {
    	alert("Email is required");
    	return false;
    }
    else if(!emailRegx.test(y)){
    	alert("Email should be in proper format e.g. john_doe@gmail.com")
    	return false;
    }
    var u = document.forms["signupform"]["user"].value;
    if(u == "") {
    	alert("UserName is needed for Signup");
    	return false;
    }
    else if(!(8<=document.forms["signupform"]["user"].maxlength<=16)){
    	alert("Username must be of length 8 to 16 characters");
    	return false;
    }
    var p = document.forms["signupform"]["password"].value;
    var passRegx = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}$/
  	if (p == "") {
    	alert("Password is required for Signup");
    	return false;
    }
    else if(!(passRegx.test(p))){
    	alert("Password must contain at least 6 characters, including UPPER/lowercase and numbers")
    	return false;
    }
    var r = document.forms["signupform"]["repeatpassword"].value;
    if (r == "") {
    	alert("Please confirm password");
    	return false;
    }
    else if (r!=p){
    	alert("Passwords must match to proceed!");
    	return false;
    }
    return true;
}