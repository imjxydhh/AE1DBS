var xmlHttp;
function chkLogin(){
	var login_form = document.getElementById("login_form");
	var blank_box = document.getElementById("blankMsg");
	for(var i = 0;i < login_form.length; i++){
		if(login_form.elements[i].value === ""){
			blank_box.innerHTML = "Username or password can not be empty.";
			return false;
		}
	}
	xmlHttp = GetXmlHttpObject();
	var url = "login.php";
    var param1 = login_form.elements[0].value;
	var param2 = login_form.elements[1].value;
	xmlHttp.onreadystatechange = stateChanged;
	xmlHttp.open("POST", url, true);
	xmlHttp.setRequestHeader('content-type','application/x-www-form-urlencoded');
	xmlHttp.send("username=" + param1 + "&password=" + param2);
	return false;
}

function stateChanged(){
	if(xmlHttp.readyState == 4 || xmlHttp.readyState == "complete"){
		xmldoc = xmlHttp.responseXML; 

		var xmldom = xmldoc.getElementsByTagName("Guests");

		var xmlval = xmldom[0].childNodes[0].childNodes[0].nodeValue;
		
		var blank_box = document.getElementById("blankMsg");
		if(xmlval == "room/booking.php"){
			var content = xmldom[0].childNodes[1].childNodes[0].nodeValue;
			if(content != 1){
				content = content + '&nbsp;&nbsp;<button class = "logout" onclick = "window.location.href= \'room/logout.php\';">';
				content = content + 'Log out';
				content = content + '</button>';
				content = content + '&nbsp;&nbsp;<button class = "logout" onclick = "window.location.href= \'room/booking.php\';">';
				content = content + 'Cancel';
				content = content + '</button>';
				blank_box.innerHTML = content;
			}else{
				window.location.href = xmlval;
			}					  
		}else{
			blank_box.innerHTML = xmlval;
		}
	}
}

function GetXmlHttpObject()
 { 
 var objXMLHttp=null
 if (window.XMLHttpRequest)
  {
  objXMLHttp=new XMLHttpRequest()
  }
 else if (window.ActiveXObject)
  {
  objXMLHttp=new ActiveXObject("Microsoft.XMLHTTP")
  }
 return objXMLHttp
 }
 
 
