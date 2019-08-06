//generic function to get parameters from URL
function getUrlParameter(sParam) {
	var sPageURL = window.location.search.substring(1);
	var sURLVariables = sPageURL.split('&');
	for (var i = 0; i < sURLVariables.length; i++) {
		var sParameterName = sURLVariables[i].split('=');
		if (sParameterName[0] == sParam) {
			return sParameterName[1];
		}
	}
	return false;
}


function saveCookieToSession() {
	var JsonCookie = jQuery.parseJSON(unescape(getCookie("whyage65_moneyapp")));
	sessionStorage.whyage65_username = JsonCookie['username'];
	sessionStorage.whyage65_user_id = JsonCookie['user_id'];
	}



function getCookie(cname) {
	var name = cname + "=";
	var ca = document.cookie.split(';');
	for (var i = 0; i < ca.length; i++) {
		var c = ca[i];
		while (c.charAt(0) == ' ')
			c = c.substring(1);
		if (c.indexOf(name) == 0)
			return c.substring(name.length, c.length);
	}
	return null;
}

function replaceParameter(strKey, strValue) {
	var allParameters = sessionStorage.allParameters;
	var Index = allParameters.indexOf(strKey);
	var valueToReplace;
	equalSignIndex = Index + strKey.length + 1;
	var Index1 = allParameters.indexOf("&", equalSignIndex);

	if (Index1 == -1) {
		valueToReplace = allParameters.substring(equalSignIndex);
	} else {
		valueToReplace = allParameters.substring(equalSignIndex, Index1);
	}

	allParameters = allParameters.replace(strKey + "=" + valueToReplace, strKey
			+ "=" + strValue);
	return allParameters;
}

function getNextMonth(currentMonth,direction){
	const monthNames = ["January", "February", "March", "April", "May", "June",
		  "July", "August", "September", "October", "November", "December"
		];
	
	indexOfCurrentMonth = monthNames.findIndex(currentMonth);
	console.log(indexOfCurrentMonth);
	
	if(direction.includes('forward')){
		indexOfCurrentMonth = indexOfCurrentMonth + 1;
	}else{
		indexOfCurrentMonth = indexOfCurrentMonth - 1;
	}
	
	
	
	if(currentMonth.includes('January') &&  direction.includes('back')){
		indexOfCurrentMonth = 11;
	}
	
	if(currentMonth.includes('December') &&  direction.includes('forward')){
		indexOfCurrentMonth = 0;
	}
	
	newMonth = monthNames[indexOfCurrentMonth];
	

	return newMonth; 
}


function getNextYear(currentMonth, currentYear,direction){
	
	//get year
	if(currentMonth.includes('January') &&  direction.includes('back')){
		currentYear = currentYear - 1;
	}
	
	if(currentMonth.includes('December') &&  direction.includes('forward')){
		currentYear = currentYear + 1;
	}
	
	return 
}

