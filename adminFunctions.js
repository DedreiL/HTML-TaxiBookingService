 function createRequest() {
    var xhr = false;  
    if (window.XMLHttpRequest) {
        xhr = new XMLHttpRequest();
    }
    else if (window.ActiveXObject) {
        xhr = new ActiveXObject("Microsoft.XMLHTTP");
    }
    return xhr;
} 
 
// get booking reference data

function getRequests(dataSource, divID)  
{
	var xhr = createRequest();
    if(xhr) 
	{
	    var place = document.getElementById(divID);
	    var url = dataSource;
	    xhr.open("GET", url, true);
	    xhr.onreadystatechange = function() {
			if (xhr.readyState == 4 && xhr.status == 200) {
			place.innerHTML = xhr.responseText;
		    } 
	    } 
	    xhr.send(null);
	}	
}

function validateForm()

 {	
    var bookingRef = document.forms["adminForm"]["bookingRefNum"].value;

	
	if(bookingRef == "")
	{
		alert("Please ensure that you have filled out a booking reference number");
		return false;
	}
    else
    {
		return true;
    }                
 }
 
 
// get booking reference data

function assignTaxi(dataSource, divID, bookingRef)  
{
	if(validateForm())
	{
		var xhr = createRequest();
		if(xhr) 
		{
			var place = document.getElementById(divID);
			var url = dataSource+"?refNum="+bookingRef;
			xhr.open("GET", url, true);
			xhr.onreadystatechange = function() {
				if (xhr.readyState == 4 && xhr.status == 200) {
				place.innerHTML = xhr.responseText;
				} 
	    } 
	    xhr.send(null);
	}
	}	
}