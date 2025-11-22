<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHMS</title>
    <link rel="stylesheet" href="styles.css">
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
		<li><a href="update_doctor.php">Update&nbsp;Details</a></li><li class="spacer">|</li>
		<li><a href="#"  style="color: #f3e393;">Generate&nbsp;Reports</a></li>
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
	<h2>Doctors Registered</h2> 
<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "patient_history";

	$cn = mysqli_connect($servername, $username, $password, $dbname);

	if ($cn) {
		$sql="select * from doctor";
		$result=mysqli_query($cn,$sql);
		if (mysqli_num_rows($result)!=0) {
			echo "<table border='0' width='100%'>";
			echo "<tr height='30'>
				<td width='15%'><b>Doctor ID</b></td>
				<td width='15%'><b>Doctor Name</b></td>
				<td width='15%'><b>Email</b></td>
				<td width='15%'><b>Contact</b></td>
				<td width='20%'><b>Specialization</b></td>
				<td width='20%'><b>Available on</b></td></tr>";

			while ($row=mysqli_fetch_assoc($result)) {		
				$doctorID=$row['DoctorID'];
				$firstName=$row['FirstName'];
				$lastName=$row['LastName'];
				$email=$row['Email'];
				$contactNumber=$row['ContactNumber'];
				$specialization=$row['Specialization'];
				$availability=$row['Availability'];

				echo "<tr>
					<td>$doctorID</td>
					<td>$firstName $lastName</td>
					<td>$email</td>
					<td>$contactNumber</td>
					<td>$specialization</td>
					<td>$availability</td></tr>";
			}
			echo "</table>";
			mysqli_close($cn);
		} else {
			echo "No records found !!!";
		}
	} else {
		die("Connection failed: " . mysqli_connect_error);
	}

?>		
</section>
    </main>


    <footer>
        <p>&copy; 2025 Akshat Parekh. All rights reserved.</p>
    </footer>

</body>
</html>
