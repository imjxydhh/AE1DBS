function chkusName(){
	var dom = document.getElementById("register");
	var usName = dom.elements[0].value;
	var blank_box = document.getElementById("username");
	if(usName.length < 6 || usName.length > 15){
		blank_box.innerHTML = "Username needs to be at least 6 characters and less than 15 characters";
	}else{
		blank_box.innerHTML = "";
	}
}

function chkPass(){
	var dom = document.getElementById("register");
	var password1 = dom.elements[1].value;
	var blank_box = document.getElementById("password");
	if(password1.length < 6 || password1.length > 20){
		blank_box.innerHTML = "Password needs to be at least 6 characters and less than 20 characters";
	}else{
		blank_box.innerHTML = "";
	}
}
 
function chkPassC(){
	var dom = document.getElementById("register");
	var password1 = dom.elements[1];
	var password2 = dom.elements[2];
	var blank_box = document.getElementById("passwordC");
	if(password1.value != password2.value){
		blank_box.innerHTML = "Password of the second time is different form the first time";
	}else{
		blank_box.innerHTML = "";
	}
}

function chkEmail(){
	var dom = document.getElementById("register");
	var email = dom.elements[6].value;
	var format = /^\S+@\S+\.\S+[a-zA-Z]$/;
	var blank_box = document.getElementById("email");
	if(!format.test(email)){
		blank_box.innerHTML = "Please enter correct email address";
	}else{
		blank_box.innerHTML = "";
	}
}

function refreshRname(){
	var dom = document.getElementById("register");
	var realName = dom.elements[3].value;
	if(realName != ""){
		var blank_box = document.getElementById("real_name");
		blank_box.innerHTML = "";
	}
}

function refreshPassport(){
	var dom = document.getElementById("register");
	var Passport = dom.elements[4].value;
	if(Passport != ""){
		var blank_box = document.getElementById("passport");
		blank_box.innerHTML = "";
	}
}

function refreshTel(){
	var dom = document.getElementById("register");
	var tel = dom.elements[5].value;
	if(tel != ""){
		var blank_box = document.getElementById("telnumber");
		blank_box.innerHTML = "";
	}
}

function ifSubmit(){
	var blank_box1 = document.getElementById("username");
	var blank_box2 = document.getElementById("password");
	var blank_box3 = document.getElementById("passwordC");
	var blank_box4 = document.getElementById("real_name");
	var blank_box5 = document.getElementById("passport");
	var blank_box6 = document.getElementById("telnumber");
	var blank_box7 = document.getElementById("email");
	if(blank_box1.innerHTML != "" || blank_box2.innerHTML != "" || 
	   blank_box3.innerHTML != "" || blank_box4.innerHTML != "" ||
	   blank_box5.innerHTML != "" || blank_box6.innerHTML != "" ||
	   blank_box7.innerHTML != ""){
		return false;
	}
	return true;
}