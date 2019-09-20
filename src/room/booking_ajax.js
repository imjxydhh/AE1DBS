var xmlHttp;
function displayRoom(){
	recover();
	var infoForm = document.getElementById("infoForm");
    xmlHttp = GetXmlHttpObject();
	var url = "booking_ajax.php";
	var period = getPeriod();
	var startDate = period.startDate;
	var endDate = period.endDate;
	var roomType = infoForm.elements[6].value;
	xmlHttp.onreadystatechange = stateChanged;
	xmlHttp.open("POST", url, true);
	xmlHttp.setRequestHeader('content-type','application/x-www-form-urlencoded');
	xmlHttp.send("startDate="+startDate+"&endDate="+endDate+"&roomType="+roomType);
	return false;
}

function stateChanged(){
	if(xmlHttp.readyState == 4 || xmlHttp.readyState == "complete"){
		var period = getPeriod();
		var startDate = period.startDate;
		var endDate = period.endDate;
		xmldoc = xmlHttp.responseXML; 
		
		var xmldom = xmldoc.getElementsByTagName("Rooms");

		var roomType = xmldoc.getElementsByTagName("type");
		
		roomID = getRoomID(roomType[0].childNodes[0].nodeValue);
		
		for(var index in roomID){
			room = document.getElementById(roomType[0].childNodes[0].nodeValue + roomID[index]);
			room.setAttribute("class", "unavailable");
			room = document.getElementById('r' + roomID[index]);
			room.innerHTML = '&nbsp;&nbsp;Full';
			room.setAttribute("class", "unavailable");
		}

		for(var index in roomID){
			for(var i in xmldom[0].childNodes){
				if(!isNaN(i * 1.0)){
					var xmlval = xmldom[0].childNodes[i].childNodes[0].nodeValue;
					if(roomID[index] == xmlval){
						room = document.getElementById("r" + xmlval);
						var content = '<a onclick = "bookConf(' + roomID[index] + ',\'' + startDate + '\',\'' + endDate + '\');">Book</a>';
						
						room.innerHTML = content;
						room = document.getElementById(roomType[0].childNodes[0].nodeValue + roomID[index]);
						room.setAttribute("class", roomType[0].childNodes[0].nodeValue);
					}
				}
			}
		}
	}
}

function bookConf(roomID, startDate, endDate){
	var res = confirm("Are you sure to book this room?");
	if(res){	
		var content = 'booked.php?roomID=' + roomID;
		content = content + "&startDate=" + startDate + "&endDate=" + endDate;
		window.location.href = content;
	}
}

function GetXmlHttpObject()
{ 
    var objXMLHttp=null;
    if (window.XMLHttpRequest){
        objXMLHttp=new XMLHttpRequest();
    }
	else if (window.ActiveXObject){
		objXMLHttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	return objXMLHttp;
 }

function getRoomID(type){
	var roomID = new Array();
	if(type == 'ldb'){
		roomID[0] = 1;
		roomID[1] = 2;
		roomID[2] = 11;
		roomID[3] = 12;
	}else if(type == 'lsb'){
		roomID[0] = 3;
		roomID[1] = 4;
		roomID[2] = 9;
		roomID[3] = 10;
	}else if(type == 'ssb'){
		roomID[0] = 5;
		roomID[1] = 6;
		roomID[2] = 7;
		roomID[3] = 8;
	}else{
		roomID[0] = 13;
	}
	return roomID;
}

function recover(){
	for(var i = 1;i < 3;i++){
		var dom = document.getElementById("ldb" + i);
		dom.setAttribute("class", "ldb");
		dom = document.getElementById("r" + i);
		dom.innerHTML = "";
	}
	for(var i = 3;i < 5;i++){
		var dom = document.getElementById("lsb" + i);
		dom.setAttribute("class", "lsb");
		dom = document.getElementById("r" + i);
		dom.innerHTML = "";
	}
	for(var i = 5;i < 9;i++){
		var dom = document.getElementById("ssb" + i);
		dom.setAttribute("class", "ssb");
		dom = document.getElementById("r" + i);
		dom.innerHTML = "";
	}
	for(var i = 9;i < 11;i++){
		var dom = document.getElementById("lsb" + i);
		dom.setAttribute("class", "lsb");
		dom = document.getElementById("r" + i);
		dom.innerHTML = "";
	}
	for(var i = 11;i < 13;i++){
		var dom = document.getElementById("ldb" + i);
		dom.setAttribute("class", "ldb");
		dom = document.getElementById("r" + i);
		dom.innerHTML = "";
	}
	var dom = document.getElementById("vip13");
	dom.setAttribute("class", "vip");
	dom = document.getElementById("r13");
	dom.innerHTML = "";
}

function getPeriod(){
	var period = new Object();
	var infoForm = document.getElementById("infoForm");
	var yearIn = infoForm.elements[0].value;
	var monthIn = getMonthn(infoForm.elements[1].value) + 1;
	var dateIn = infoForm.elements[2].value;
	var yearOut = infoForm.elements[3].value;
	var monthOut = getMonthn(infoForm.elements[4].value) + 1;
	var dateOut = infoForm.elements[5].value;
	period.startDate = yearIn + "-" + monthIn + "-" + dateIn;
	period.endDate = yearOut + "-" + monthOut + "-" + dateOut;
	return period;
}