<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHMS</title>
    <link rel="stylesheet" href="styles.css">

	<?php include 'scripts/update_doctor.php'; ?>


<script src="scripts/js.js"></script>
<script>
function fetchRecord() {
    var DoctorID = document.getElementById("selectDoctorID").value;
    if (DoctorID != -1) {
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "scripts/fetch_doctor.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                var data = JSON.parse(xhr.responseText);
                document.getElementById("doctorID").value = data.DoctorID;
                document.getElementById("firstName").value = data.FirstName;
                document.getElementById("lastName").value = data.LastName;
               document.getElementById("contactNumber").value = data.ContactNumber;
                document.getElementById("email").value = data.Email;
                document.getElementById("specialization").value = data.Specialization;
                document.getElementById("availability").value = data.Availability;
            }
        };
        xhr.send("DoctorID=" + encodeURIComponent(DoctorID));
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
		<li><a href="update_patient.php">Update&nbsp;Details</a></li><li class="spacer">|</li>
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
		<li><a href="#" style="color: #f3e393;">Update&nbsp;Details</a></li><li class="spacer">|</li>
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
		<label for="selectDoctorID">Select Doctor ID:</label> 
		<select id="selectDoctorID" name="selectDoctorID" onchange="fetchRecord()">
			<?php include 'scripts/populate_doctor.php'; ?>
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
	<h2>Update Doctor Details</h2> 

	<form action="http://localhost/phms/update_doctor.php" method="post"> 
	<table border="0" width="100%">
	<tr>
	<td rowspan="4" width="30%" style="background-color:#c0c0c0;">
		<table>
		<tr width="100%" align="center">
		<td><label for="doctorID">Doctor ID:</label></td>
		<td><label for="firstName">First Name:</label></td>
		<td><label for="lastName">Last Name:</label></td>
		</tr>
		<tr>
		</tr>
		<tr align="center">
		<td><input type="text" id="doctorID" name="doctorID" size="10" readonly class="readonly"></td>
		<td><input type="text" id="firstName" name="firstName" size="20" readonly class="readonly"></td>
		<td><input type="text" id="lastName" name="lastName" size="15" readonly class="readonly"></td>
		</tr>
		</table>
	</td>
	<td width="5%">&nbsp;</td>
	<td width="10%" align="right">
		<label for="specialization">Specialization:</label>
	</td>
	<td width="55%">
		<input type="text" id="specialization" name="specialization" maxlength="30" size="30" 
			pattern="^([A-Za-z]+(( |.|. |,|, |.,|., )?[A-Za-z]+)*)$"required>
	</td>
	</tr>
	<tr>
	<td width="10%">&nbsp;</td>
	<td width="10%" align="right">
		<label for="contactNumber">Contact Number:</label>
	</td>
	<td width="55%">
		<input type="text" id="contactNumber" name="contactNumber" maxlength="15" size="15" pattern="^(\+?\d{2}-\d{6,10}|\d{6,10})$" required>
	</td>
	</tr>
	<tr>
	<td width="10%">&nbsp;</td>
	<td width="10%" align="right">
		<label for="email">Email:</label>
	</td>
	<td width="55%">
		<input type="email" id="email" name="email" maxlength="30" size="30" pattern="^[a-zA-Z]+[a-zA-Z0-9_.]*@[A-Za-z0-9]+\.[A-Za-z]{2,4}$" required>
	</td>
	</tr>
	<tr>
	<td width="10%">&nbsp;</td>
	<td width="10%" align="right">
		<label for="availability">Availability:</label>
	</td>
	<td width="55%">
		<textarea id="availability" name="availability" cols="30" required></textarea>
	</td>
	</tr>
	<tr>
	<td colspan='3'>&nbsp;</td>
	<td align='center'>
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


</body>
</html>
