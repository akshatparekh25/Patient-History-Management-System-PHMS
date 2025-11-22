<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHMS</title>
    <link rel="stylesheet" href="styles.css">

<?php
if (isset($_POST['btn'])) {$post=1;} else $post=0;
?>

<?php include 'scripts/update_patient.php'; ?> 
<script src="scripts/js.js"></script>
<script>
function fetchRecord() {
    var PatientID = document.getElementById("selectPatientID").value;
    if (PatientID != -1) {
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "scripts/fetch_record.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                var data = JSON.parse(xhr.responseText);
                document.getElementById("patientID").value = data.PatientID;
                document.getElementById("firstName").value = data.FirstName;
                document.getElementById("lastName").value = data.LastName;
                document.getElementById("dateOfBirth").value = data.DateOfBirth;
                if (data.Gender == "M") {
                    document.getElementById("gender").value = "Male";
                } else if (data.Gender == "F") {
                    document.getElementById("gender").value = "Female";
                } else if (data.Gender == "O") {
                    document.getElementById("gender").value = "Other";
                }
                document.getElementById("contactNumber").value = data.ContactNumber;
                document.getElementById("email").value = data.Email;
                document.getElementById("address").value = data.Address;
                document.getElementById("city").value = data.City;
                document.getElementById("insured").value = data.Insured;
                document.getElementById("insuranceCompany").value = data.InsuranceCompany;
                document.getElementById("referredBy").value = data.ReferredBy;
                document.getElementById("firstVisitDate").value = data.FirstVisitDate;
                document.getElementById("allergicTo").value = data.AllergicTo;
                document.getElementById("history").value = data.History;
                toggle_insurance();
            }
        };
        xhr.send("PatientID=" + encodeURIComponent(PatientID));
    }
}

</script>

</head>
<body>
    <header>
        <h1>Patient History Management System</h1>
        <h4 id="headtime"></h4>

	<script>
	var ht=new Date();
	document.getElementById("headtime").innerHTML=showDay(ht.getDay())+", "+ht.getDate()+" "+showMonth	(ht.getMonth())+" "+ht.getFullYear();
	</script>

    </header>

    <main>
        <section class="panel">
            <h2>Patient</h2>
            <p>
	<nav>
		<ul>
		<li><a href="new_patient.php">New&nbsp;Patient</a></li><li class="spacer">|</li>
		<li><a href="#"  style="color: #f3e393;">Update&nbsp;Details</a></li><li class="spacer">|</li>
		<li><a href="index.php">Book&nbsp;Visit</a></li><li class="spacer">|</li>
		<li><a href="patient_report.php">Generate&nbsp;Reports</a></li>
		</ul>
	</nav>
            </p>
        </section>
        <section class="panel">
            <h2>Doctor</h2>
            <p>
	<nav>
		<ul>
		<li><a href="new_doctor.php">New&nbsp;Doctor</a></li><li class="spacer">|</li>
		<li><a href="update_doctor.php">Update&nbsp;Details</a></li><li class="spacer">|</li>
		<li><a href="doctor_report.php">Generate&nbsp;Reports</a></li>
		</ul>
	</nav>
            </p>
        </section>
        <section class="panel">
            <h2>History</h2>
            <p>
	<nav>
		<ul>
		<li><a href="consultation.php">Consultation</a></li><li class="spacer">|</li>
		<li><a href="visit_detail.php">Visits</a></li><li class="spacer">|</li>
		<li><a href="medicine.php">Medicines&nbsp;adviced</a></li><li class="spacer">|</li>
		<li><a href="history_report.php">Generate&nbsp;Reports</a></li>
		</ul>
	</nav>
            </p>
       </section>
    </main>

<main id="acknowledgement">
	<section class="form">
	<table border="0" width="80%">
	<tr>
	<td width="50%">
		<label for="selectPatientID">Select Patient ID:</label> 
		<select id="selectPatientID" name="selectPatientID" onchange="fetchRecord()">
			<?php include 'scripts/populate_select.php'; ?>
		</select>
	</td>
	<td>
		<?php
			if (isset($_POST['btn'])) {
		?>
		<div id="disappear">
			<b><font color="red">Record Updated !!!</font></b>
		</div>
		<script> 
			var disappear = document.getElementById('disappear'); 
			setTimeout(function() { disappear.style.display = 'none'; }, 3000); 
		</script>
		<?php
			}
		?>
	</td>
	</tr>
	</table>
	</section>
</main>




    <main>
	<section class="form">
	<h2>Update Patient Details</h2> 

	<form action="http://localhost/phms/update_patient.php" method="post"> 
	<table border="0" width="100%">
	<tr height="30">
	<td width="33%">
	<label for="patientID">Patient ID:</label> 
	<input type="text" id="patientID" name="patientID" size="4" readonly> 
	<input type="text" id="firstVisitDate" name="firstVisitDate" class="readonly">
	</td>
	<td width="33%"> 
	<label for="firstName">First Name:</label> 
	<input type="text" id="firstName" name="firstName" readonly>
	</td>
	<td width="33%">
	<label for="lastName">Last Name:</label> 
	<input type="text" id="lastName" name="lastName" readonly>
	</td>
	</tr>
	<tr height="30">
	<td>
	<label for="dateOfBirth">Date of Birth:</label> 
	<input type="text" id="dateOfBirth" name="dateOfBirth" readonly>
	</td>
	<td>
	<label for="gender">Gender:</label> 
	<input type="text" id="gender" name="gender" readonly> 
	</td>
	<td>
	<label for="contactNumber">Contact Number:</label> 
	<input type="text" id="contactNumber" name="contactNumber" maxlength="15" pattern="^(\+?\d{2}-\d{6,10}|\d{6,10})$" required>
	</td>
	</tr>
	<tr height="80" valign="bottom">
	<td>
	<label for="email">Email:</label> 
	<input type="email" id="email" name="email" maxlength="30" pattern="^[a-zA-Z]+[a-zA-Z0-9_.]*@[A-Za-z0-9]+.[A-Za-z]{2,4}$" required>
	</td>
	<td>
	<label for="address">Address:</label> 
	<textarea id="address" name="address" maxlength="250" rows="4" cols="40" required></textarea>
	</td>
	<td>
	<label for="city">City:</label> 
	<input type="text" id="city" name="city" maxlength="20" pattern="^([A-Za-z]+( [A-Za-z]+)*)$" required>
	</td>
	</tr>
	<tr height="30" valign="bottom">
	<td>
	<label for="referredBy">Referred By:</label> 
	<input type="text" id="referredBy" name="referredBy" value="-" onclick="clearValue('referredBy')" onblur="setDefault('referredBy')"
			pattern="^-|([A-Za-z]+(( |. |.|,|, )?[A-Za-z]+)*)$"maxlength="50">
	</td>
	<td>
	<label for="insured">Insured:</label> 
	<select id="insured" name="insured" onchange="toggle_insurance()"> 
		<option value="Y">Yes</option> 
		<option value="N" selected>No</option> 
	</select>
	</td>
	<td>
	<label for="insuranceCompany" id="insuranceCompanyLabel" class="show">Insurance Company:</label> 
	<input type="text" id="insuranceCompany" name="insuranceCompany" maxlength="50" value="-" class="show" required="false">	
	<script>
		toggle_insurance();		
	</script>

	</td>
	</tr>
	<tr height="30" valign="top">
	<td colspan="2">
	<label for="history">Previous Medical History:</label> 
	<textarea id="history" name="history" maxlength="250" rows="4" cols="50" 
		onclick="clearValue('history')" onblur="setDefault('history')">-</textarea>
	</td>
	<td>
	<label for="allergicTo">Allergic To:</label> 
	<input type="text" id="allergicTo" name="allergicTo" maxlength="30" value="-" 
		onclick="clearValue('allergicTo')" onblur="setDefault('allergicTo')">
	<br><br>
	<input type="submit" value="Submit" name="btn">
	</td>
	</tr>
	</table>

	</form>

	</section>
    </main>


    <footer>
        <p>&copy; 2025 Akshat Parekh. All rights reserved.</p>
    </footer>

<script> 
window.onload = function() { 
var now = new Date(); 
var formattedDate = now.getFullYear() + '-' + ('0' + (now.getMonth() + 1)).slice(-2) + '-' + ('0' + now.getDate()).slice(-2) ; 
	document.getElementById('firstVisitDate').value = formattedDate; 
}
</script>

</body>
</html>
