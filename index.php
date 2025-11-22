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

<?php include 'scripts/visit.php'; ?>

<script src=scripts/js.js"></script>


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
		<li><a href="#"  style="color: #f3e393;">Book&nbsp;Visit</a></li><li class="spacer">|</li>
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



    <main>
	<section class="form">
	<h2>Book an Appointment</h2> 

	<form action="http://localhost/phms/index.php" method="post"> 
	<table border="0" width="100%">
	<tr height="30">
	<td width="33%">
	<label for="patientID">Patient ID:</label> 
	<select id="patientID" name="patientID" required> 
<?php foreach ($patients as $patient) { ?> 
		<option value="<?php echo $patient['PatientID']; ?>"> 
		<?php echo $patient['PatientID'] . ' - ' . $patient['PatientName']; ?> 
		</option> 
<?php } ?> 
	</select>
	</td>
	<td width="33%"> 
	<label for="doctorID">Doctor ID:</label> 
	<select id="doctorID" name="doctorID" required>
<?php foreach ($doctors as $doctor) { ?> 
		<option value="<?php echo $doctor['DoctorID']; ?>"> 
		<?php echo $doctor['DoctorID'] . ' - ' . $doctor['DoctorName']; ?> 
		</option> 
<?php } ?> 
	</select>
	</td>
	<td width="33%">
	<label for="visitDateTime">Visit Date and Time:</label> 
	<input type="datetime-local" id="visitDateTime"  class="readonly" name="visitDateTime" readonly>
	</td>
	</tr>
	<tr height="30">
	<td>
	<label for="caseFee">Case Fee  (in &#8377;):</label> 
	<input type="number" id="caseFee" name="caseFee" size="10" min="0" required>
	</td> 
	<td>
	<label for="caseFeeType">Case Fee Type:</label> 
	<select id="caseFeeType" name="caseFeeType" required> 
		<option value="N">New</option> 
		<option value="R">Renew</option> 
		<option value="S">Special</option>
		<option value="C">Consult</option>
		<option value="O">Other</option> 
	</select>
	</td>
	<td> 
	<label for="visitCategory">Visit Category:</label> 
	<select id="visitCategory" name="visitCategory" required> 
		<option value="S">Scheduled Visit</option> 
		<option value="E">Emergency</option> 
		<option value="C">Consultation</option> 
		<option value="R">Referred Visit</option> 
		<option value="O">Other</option> 
	</select>
	</td>
	</tr>
	<tr> 
	<td colspan="2">
	<label for="notes">Notes:</label> <textarea id="notes" name="notes" rows="3" cols="50" maxlength="250"></textarea>
	</td>
	<td>
	<input type="submit" value="Submit" name="btn" onmouseup="show_msg();"> 
	<input type="hidden" id="hid" value="<?php if (isset($_POST['btn'])){echo 1;}?>">
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
	var formattedDateTime = now.getFullYear() + '-' + ('0' + (now.getMonth() + 1)).slice(-2) + '-' + ('0' + now.getDate()).slice(-2) + 'T' + ('0' + now.getHours()).slice(-2) + ':' + ('0' + now.getMinutes()).slice(-2); 
	document.getElementById('visitDateTime').value = formattedDateTime; 
}
</script>

</body>
</html>


