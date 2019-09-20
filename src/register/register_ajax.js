var xmlHttp;
function chkInfo(){
	var regi_form = document.getElementById("register");
	var state = 0;
	for(var i = 0;i < regi_form.length - 1; i++){
		if(regi_form.elements[i].value === ""){
			var blank_box = document.getElementById(regi_form.elements[i].name);
			blank_box.innerHTML = "We need this information to complete register. Please fill in.";
			state = 1;	
		}
	}
	chkusName();
	chkPass();
	chkPassC();
	chkEmail();
	xmlHttp = GetXmlHttpObject();
	var url = "register_ajax.php";
	var param1 = regi_form.elements[0].value;
	var param2 = regi_form.elements[4].value;
	//url = url + "&sid=" + Math.random();
	xmlHttp.onreadystatechange = stateChanged;
	xmlHttp.open("POST", url, false);
	xmlHttp.setRequestHeader('content-type','application/x-www-form-urlencoded');
	xmlHttp.send("username=" + param1 + "&passport=" + param2);
	return ifSubmit();
}

function stateChanged(){
	if(xmlHttp.readyState == 4 || xmlHttp.readyState == "complete"){
		xmldoc = xmlHttp.responseXML; 

		var xmldom = xmldoc.getElementsByTagName("wrong");
		var xmlval = xmldom[0].childNodes[0].nodeValue;		
		
		var blank_box = document.getElementById("username");
		if(xmlval != 1){
			blank_box.innerHTML = xmlval;				  
		}
		xmlval = xmldom[1].childNodes[0].nodeValue;
		var blank_box = document.getElementById("passport");
		if(xmlval != 1){
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

 
