<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHMS</title>
    <link rel="stylesheet" href="styles.css">
<script src=scripts/js.js"></script>
<script>
function show_msg2() {
	alert("Doctor Registered");
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
		<li><a href="#"  style="color: #f3e393;">New&nbsp;Doctor</a></li><li class="spacer">|</li>
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
	<h2>Register a New Doctor</h2> 
<script>

</script>
<form action="http://localhost/phms/scripts/doctor_register.php" method="post"> 
	<table border="0" width="100%">
	<tr height="30">
	<td width="30%">
		<label for="firstName">First Name:</label>
		<input type="text" id="firstName" name="firstName" maxlength="20" size="20" pattern="^([A-Za-z]+( [A-Za-z]+)*)$" required>
	</td>
	<td width="30%">
		<label for="lastName">Last Name:</label>
		<input type="text" id="lastName" name="lastName" maxlength="15" size="15" pattern="^([A-Za-z]+( [A-Za-z]+)*)$" required>
	</td>
	<td width="40%">
		<label for="specialization">Specialization:</label>
		<input type="text" id="specialization" name="specialization" maxlength="30" size="30" 
			pattern="^([A-Za-z]+(( |.|. |,|, |.,|., )?[A-Za-z]+)*)$"required>
	</td>
	</tr>
	<tr>
	<td>
		<label for="contactNumber">Contact Number:</label>
		<input type="text" id="contactNumber" name="contactNumber" maxlength="15" size="15" pattern="^(\+?\d{2}-\d{6,10}|\d{6,10})$" required>
	</td>
	<td>
		<label for="email">Email:</label>
		<input type="email" id="email" name="email" maxlength="30" size="30" pattern="^[a-zA-Z]+[a-zA-Z0-9_.]*@[A-Za-z0-9]+\.[A-Za-z]{2,4}$" required>
	</td>
	<td>
		<label for="availability">Availability:</label>
		<textarea id="availability" name="availability" cols="30" required></textarea>
	</td>
	</tr>
	<tr>
	<td colspan='2'>&nbsp;</td>
	<td align='center'>
		<input type="submit" value="Submit" onclick="show_msg2()">
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


