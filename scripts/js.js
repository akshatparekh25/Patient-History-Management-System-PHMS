function showMonth(x) {
var y=new Array("January","February","March","April","May","June","July","August","September","October","November","December");
return y[x]; 
}

function showDay(x) {
var y=new Array("Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday");
return y[x]; 
}



function toggle_insurance() { 
	var dropdown = document.getElementById("insured"); 
	var selectedValue = dropdown.value; 
	var label = document.getElementById("insuranceCompanyLabel"); 
	var input = document.getElementById("insuranceCompany"); 
	if (selectedValue === "N") { 
		input.style.backgroundColor = "#c0c0c0";
		if (!(input.hasAttribute('readonly'))) { 
			input.setAttribute('readonly', true);
			input.setAttribute('required', false);				//changed
			if (input.hasAttribute('pattern'))					//changed
				input.removeAttribute('pattern');			//changed
		}
		input.value="-";							//changed
	} else { 
		if (input.hasAttribute('readonly')) {
			input.removeAttribute('readonly'); 
			input.setAttribute('required', true);				//changed
			input.setAttribute('pattern', "^[a-zA-Z]+[A-Za-z .]+[A-Za-z]+$");		//changed
		} 
		input.style.backgroundColor = "#ffffff";
		if (input.value=="-")							//changed
			input.value="";						//changed
	} 
}




function show_msg() {
	alert("Appointment Booked");
}

function show_msg1() {
	alert("Patient Registered");
}


function clearValue(control) {
	var input = document.getElementById(control); 
	if (input.value === "-")  
		input.value = "";
}

function setDefault(control) {
	var input = document.getElementById(control);
	if (input.value.trim()==="")
		input.value="-";
}

