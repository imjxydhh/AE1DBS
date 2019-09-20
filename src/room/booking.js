function displayYear(){
	var myDate = new Date();
	var nowYear = myDate.getFullYear();
	var nowMonth = myDate.getMonth();
	var nowDate = myDate.getDate();
	var infoForm = document.getElementById("infoForm");
	var content = getMonthf(nowMonth);
	infoForm.elements[1].innerHTML = content;
	infoForm.elements[4].innerHTML = content;
	content = "<option>" + nowYear + "</option>";
	content = content + "<option>" + (nowYear + 1) + "</option>";
	infoForm.elements[0].innerHTML = content;
	infoForm.elements[3].innerHTML = content;
	infoForm.elements[2].innerHTML = getDays(1, nowMonth, nowDate, nowYear);
	if((!isLeapYear(nowYear) && (nowDate == 28) && (nowMonth == 1)) || 
		   (isLeapYear(nowYear) && (nowDate == 29) && (nowMonth == 1)) ||
		    (nowDate == 30 && !isGreatMonth(nowMonth)) || 
			(nowDate == 31 && isGreatMonth(nowMonth) && nowMonth != 11)){
			content = getMonthf(nowMonth + 1);
			infoForm.elements[4].innerHTML = content;
			infoForm.elements[5].innerHTML = getDays(1, nowMonth + 1, 1, nowYear);
		}else if(nowMonth == 11 && nowDate == 31){
			content = "<option>" + (nowYear + 1) + "</option>";
			content = content + "<option>" + (nowYear + 2) + "</option>";
			infoForm.elements[3].innerHTML = content;
			content = getMonthf(0);
			infoForm.elements[4].innerHTML = content;
			infoForm.elements[5].innerHTML = getDays(1, 0, 1, nowYear + 1);
		}else{
			infoForm.elements[5].innerHTML = getDays(2, nowMonth, nowDate, nowYear);	
		}
}

function inYearChange(){
	var myDate = new Date();
	var nowYear = myDate.getFullYear();
	var nowDate = myDate.getDate();
	var nowMonth = myDate.getMonth();
	var infoForm = document.getElementById("infoForm");
	var yearIn = infoForm.elements[0].value * 1.0;
	if(yearIn > nowYear){
		var content = getMonthf(0);
		infoForm.elements[1].innerHTML = content;
		infoForm.elements[4].innerHTML = content;
		infoForm.elements[2].innerHTML = getDays(1, 0, 1, yearIn);
		content = "<option>" + yearIn + "</option>";
		content = content + "<option>" + (yearIn + 1) + "</option>";
		infoForm.elements[3].innerHTML = content;
		infoForm.elements[5].innerHTML = getDays(2, 0, 1, yearIn);
	}else{
		var content = getMonthf(nowMonth);
		infoForm.elements[1].innerHTML = content;
		infoForm.elements[4].innerHTML = content;
		content = "<option>" + nowYear + "</option>";
		content = content + "<option>" + (nowYear + 1) + "</option>";
		infoForm.elements[0].innerHTML = content;
		infoForm.elements[3].innerHTML = content;
		infoForm.elements[2].innerHTML = getDays(1, nowMonth, nowDate, nowYear);
		if((!isLeapYear(yearIn) && (nowDate == 28) && (nowMonth == 1)) || 
		   (isLeapYear(yearIn) && (nowDate == 29) && (nowMonth == 1)) ||
		    (nowDate == 30 && !isGreatMonth(nowMonth)) || 
			(nowDate == 31 && isGreatMonth(nowMonth) && nowMonth != 11)){
			content = getMonthf(nowMonth + 1);
			infoForm.elements[4].innerHTML = content;
			infoForm.elements[5].innerHTML = getDays(1, nowMonth + 1, 1, nowYear);
		}else if(nowMonth == 11 && nowDate == 31){
			content = "<option>" + (nowYear + 1) + "</option>";
			content = content + "<option>" + (nowYear + 2) + "</option>";
			infoForm.elements[3].innerHTML = content;
			content = getMonthf(0);
			infoForm.elements[4].innerHTML = content;
			infoForm.elements[5].innerHTML = getDays(1, 0, 1, nowYear + 1);
		}else{
			infoForm.elements[5].innerHTML = getDays(2, nowMonth, nowDate, nowYear);	
		}
	}
}

function inMonthChange(){
	var myDate = new Date();
	var nowYear = myDate.getFullYear();
	var nowDate = myDate.getDate();
	var nowMonth = myDate.getMonth();
	var infoForm = document.getElementById("infoForm");
	var yearIn = infoForm.elements[0].value * 1.0;
	var monthIn = getMonthn(infoForm.elements[1].value);
	var content;
	if(yearIn == nowYear && monthIn == nowMonth){
		infoForm.elements[2].innerHTML = getDays(1, monthIn, nowDate, nowYear);
		content = "<option>" + yearIn + "</option>";
		content = content + "<option>" + (yearIn + 1) + "</option>";
		infoForm.elements[3].innerHTML = content;
		if((!isLeapYear(yearIn) && (nowDate == 28) && (nowMonth == 1)) || 
		   (isLeapYear(yearIn) && (nowDate == 29) && (nowMonth == 1)) ||
		    (nowDate == 30 && !isGreatMonth(nowMonth)) || 
			(nowDate == 31 && isGreatMonth(nowMonth) && nowMonth != 11)){
			content = getMonthf(nowMonth + 1);
			infoForm.elements[4].innerHTML = content;
			infoForm.elements[5].innerHTML = getDays(1, nowMonth + 1, 1, nowYear);
		}else if(nowMonth == 11 && nowDate == 31){
			content = "<option>" + (nowYear + 1) + "</option>";
			content = content + "<option>" + (nowYear + 2) + "</option>";
			infoForm.elements[3].innerHTML = content;
			content = getMonthf(0);
			infoForm.elements[4].innerHTML = content;
			infoForm.elements[5].innerHTML = getDays(1, 0, 1, nowYear + 1);
		}else{
			content = getMonthf(monthIn);
			infoForm.elements[4].innerHTML = content;
			infoForm.elements[5].innerHTML = getDays(2, nowMonth, nowDate, nowYear);	
		}
	}else{
		var content = getMonthf(monthIn);
		infoForm.elements[4].innerHTML = content;
		infoForm.elements[2].innerHTML = getDays(1, monthIn, 1, yearIn);
		content = "<option>" + yearIn + "</option>";
		content = content + "<option>" + (yearIn + 1) + "</option>";
		infoForm.elements[3].innerHTML = content;
		infoForm.elements[5].innerHTML = getDays(2, monthIn, 1, yearIn);
	}
}

function inDateChange(){
	var infoForm = document.getElementById("infoForm");
	var yearIn = infoForm.elements[0].value * 1.0;
	var monthIn = getMonthn(infoForm.elements[1].value);
	var dateIn = infoForm.elements[2].value * 1.0;
	var yearOut = infoForm.elements[3].value * 1.0;
	var content;
	content = "<option>" + yearIn + "</option>";
	content = content + "<option>" + (yearIn + 1) + "</option>";
	infoForm.elements[3].innerHTML = content;
	if((!isLeapYear(yearIn) && (dateIn == 28) && (monthIn == 1)) || 
	   (isLeapYear(yearIn) && (dateIn == 29) && (monthIn == 1)) ||
	   (dateIn == 30 && !isGreatMonth(monthIn)) || 
	   (dateIn == 31 && isGreatMonth(monthIn) && monthIn != 11)){
		content = getMonthf(monthIn + 1);
		infoForm.elements[4].innerHTML = content;
		infoForm.elements[5].innerHTML = getDays(1, monthIn + 1, 1, yearIn);
	}else if(monthIn == 11 && dateIn == 31){
		content = "<option>" + (yearIn + 1) + "</option>";
		content = content + "<option>" + (yearIn + 2) + "</option>";
		infoForm.elements[3].innerHTML = content;
		content = getMonthf(0);
		infoForm.elements[4].innerHTML = content;
		infoForm.elements[5].innerHTML = getDays(1, 0, 1, yearIn + 1);
	}else{
	content = getMonthf(monthIn);
	infoForm.elements[4].innerHTML = content;
	infoForm.elements[5].innerHTML = getDays(2, monthIn, dateIn, yearIn);	
	}
}

function outYearChange(){
	var infoForm = document.getElementById("infoForm");
	var yearIn = infoForm.elements[0].value * 1.0;
	var monthIn = getMonthn(infoForm.elements[1].value);
	var dateIn = infoForm.elements[2].value * 1.0;
	var yearOut = infoForm.elements[3].value * 1.0;
	if(yearIn == yearOut){
		if((!isLeapYear(yearIn) && (dateIn == 28) && (monthIn == 1)) || 
		   (isLeapYear(yearIn) && (dateIn == 29) && (monthIn == 1)) ||
		   (dateIn == 30 && !isGreatMonth(monthIn)) || 
		   (dateIn == 31 && isGreatMonth(monthIn) && monthIn != 11)){
			content = getMonthf(monthIn + 1);
			infoForm.elements[4].innerHTML = content;
			infoForm.elements[5].innerHTML = getDays(1, monthIn + 1, 1, yearOut);
		}else{
			content = getMonthf(monthIn);
			infoForm.elements[4].innerHTML = content;
			infoForm.elements[5].innerHTML = getDays(2, monthIn, dateIn, yearOut);	
		}
	}else{
		content = getMonthf(0);
		infoForm.elements[4].innerHTML = content;
		infoForm.elements[5].innerHTML = getDays(1, 0, 1, yearOut);
	}
}

function outMonthChange(){
	var infoForm = document.getElementById("infoForm");
	var monthIn = getMonthn(infoForm.elements[1].value);
	var monthOut = getMonthn(infoForm.elements[4].value);
	var dateIn = infoForm.elements[2].value * 1.0;
	var yearOut = infoForm.elements[3].value * 1.0;

	if(monthOut != monthIn){
		infoForm.elements[5].innerHTML = getDays(1, monthOut, 1, yearOut);
	}else{
		infoForm.elements[5].innerHTML = getDays(2, monthOut, dateIn, yearOut);
	}
}

function getMonthf(nowMonth){
	var content = "";
	for(var i = nowMonth;i <= 11; i++){
		switch(i){
			case 0:
			month = "Jan";break;
			case 1:
			month = "Feb";break;
			case 2:
			month = "Mar";break;
			case 3:
			month = "Apr";break;
			case 4:
			month = "May";break;
			case 5:
			month = "Jun";break;
			case 6:
			month = "Jul";break;
			case 7:
			month = "Aug";break;
			case 8:
			month = "Sep";break;
			case 9:
			month = "Oct";break;
			case 10:
			month = "Nov";break;
			case 11:
			month = "Dec";break;
			default:
			break;
		}
		content = content + "<option>" + month + "</option>";
	}
	return content;
}

function getMonthn(month){
	switch(month){
		case "Jan":
		month = 0;break;
		case "Feb":
		month = 1;break;
		case "Mar":
		month = 2;break;
		case "Apr":
		month = 3;break;
		case "May":
		month = 4;break;
		case "Jun":
		month = 5;break;
		case "Jul":
		month = 6;break;
		case "Aug":
		month = 7;break;
		case "Sep":
		month = 8;break;
		case "Oct":
		month = 9;break;
		case "Nov":
		month = 10;break;
		case "Dec":
		month = 11;break;
		default:
		break;
	}
	return month;
}

function getDays(choice, nowMonth, nowDate, nowYear){
	var contentIn = "";
	var contentOut = "";
	if(nowMonth == 1){
		if(isLeapYear(nowYear)){
			for(var i = nowDate; i <= 29;i++){
				if(i == nowDate){
					contentIn = contentIn + "<option>" + i + "</option>";
				}else{
					contentIn = contentIn + "<option>" + i + "</option>";
					contentOut = contentOut + "<option>" + i + "</option>";
				}
			}
		}else{
			for(var i = nowDate; i < 29;i++){
				if(i == nowDate){
					contentIn = contentIn + "<option>" + i + "</option>";
				}else{
					contentIn = contentIn + "<option>" + i + "</option>";
					contentOut = contentOut + "<option>" + i + "</option>";
				}
			}
		}
	}else if(isGreatMonth(nowMonth)){
		for(var i = nowDate; i < 32;i++){
			if(i == nowDate){
				contentIn = contentIn + "<option>" + i + "</option>";
			}else{
				contentIn = contentIn + "<option>" + i + "</option>";
				contentOut = contentOut + "<option>" + i + "</option>";
			}
		}
	}else{
		for(var i = nowDate; i < 31;i++){
			if(i == nowDate){
				contentIn = contentIn + "<option>" + i + "</option>";
			}else{
				contentIn = contentIn + "<option>" + i + "</option>";
				contentOut = contentOut + "<option>" + i + "</option>";
			}
		}
	}
	if(choice == 1){
		return contentIn;
	}else if(choice == 2){
		return contentOut;
	}else{
		return null;
	}
}

function isLeapYear(nowYear){
	if(nowYear % 400 == 0 || (nowYear % 4 == 0 && nowYear % 100 != 0)){
		return true;
	}
	return false;
}

function isGreatMonth(month){
	if(month == 0 || month == 2 || month == 4 || month == 6 || month == 7 || month == 9 || month == 11){
		return true;
	}
	return false;
}