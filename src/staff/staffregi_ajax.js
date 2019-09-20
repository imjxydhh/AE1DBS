var xmlHttp;
function chkInfo(){
	var regi_form = document.getElementById("register");
	for(var i = 0;i < regi_form.length - 1; i++){
		if(regi_form.elements[i].value === ""){
			var blank_box = document.getElementById(regi_form.elements[i].name);
			blank_box.innerHTML = "We need this information to complete register. Please fill in.";
		}
	}
	chkusName();
	chkPass();
	chkPassC();
	xmlHttp = GetXmlHttpObject();
	var url = "staffregi_ajax.php";
	xmlHttp.onreadystatechange = stateChanged;
	xmlHttp.open("POST", url, false);
	xmlHttp.setRequestHeader('content-type','application/x-www-form-urlencoded');
	xmlHttp.send('username=' + regi_form.elements[0].value);
	var blank_box1 = document.getElementById("username");
	var blank_box2 = document.getElementById("password");
	var blank_box3 = document.getElementById("passwordC");
	var blank_box4 = document.getElementById("real_name");
	var blank_box5 = document.getElementById("telnumber");
	if(blank_box1.innerHTML != "" || blank_box2.innerHTML != "" || 
	   blank_box3.innerHTML != "" || blank_box4.innerHTML != "" || 
	   blank_box5.innerHTML != "" ){
		return false;
	}
	return true;
}

function stateChanged(){
	if(xmlHttp.readyState == 4 || xmlHttp.readyState == "complete"){
		xmldoc = xmlHttp.responseXML; 

		var xmldom = xmldoc.getElementsByTagName("Staffs");
		if(xmldom[0].childNodes[0].childNodes[0].nodeValue == 'SERVER ERROR'){
			alert("Something went wrong with our server. You can visit our website later.");
		}else{
			xmldom = xmldoc.getElementsByTagName("wrong");
			var xmlval = xmldom[0].childNodes[0].nodeValue;		
			
			var blank_box = document.getElementById("username");
			if(xmlval != 1){
				blank_box.innerHTML = xmlval;				  
			}
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

 
