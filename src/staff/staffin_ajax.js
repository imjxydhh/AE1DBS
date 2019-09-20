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
	var url = "staffin_ajax.php";
	var username = login_form.elements[0].value;
	var password_ = login_form.elements[1].value;
	xmlHttp.onreadystatechange = stateChanged;
	xmlHttp.open("POST", url, true);
	xmlHttp.setRequestHeader('content-type','application/x-www-form-urlencoded');
	xmlHttp.send("username="+username+"&password="+password_);
	return false;
}

function stateChanged(){
	if(xmlHttp.readyState == 4 || xmlHttp.readyState == "complete"){
		xmldoc = xmlHttp.responseXML; 

		var xmldom = xmldoc.getElementsByTagName("Staffs");

		var xmlval = xmldom[0].childNodes[0].childNodes[0].nodeValue;
		console.log(xmlval);
		var blank_box = document.getElementById("blankMsg");
		if(xmlval == "index.html" || xmlval == "staffviewall.php"){
			var content = xmldom[0].childNodes[1].childNodes[0].nodeValue;
			if(content != 1){
				content = content + '&nbsp;&nbsp;<button class = "logout" onclick = "window.location.href= \'stafflogout.php\';">';
				content = content + 'Log out';
				content = content + '</button>';
				content = content + '&nbsp;&nbsp;<button class = "logout" onclick = "window.location.href= \'' + xmlval + '\';">';
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
 
 
