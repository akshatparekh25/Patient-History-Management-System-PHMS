<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHMS</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        .scrollable {
            height: 150px;
            overflow-y: scroll;
        }

	thead td { 
	 position: sticky; 
	 top: 0; 
	 background-color: #f1f1f1;
	}
    </style>
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
		<li><a href="#" style="color: #f3e393;">Generate&nbsp;Reports</a></li>
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
	<h2>Patients Details</h2> 
<div class="scrollable">
<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "patient_history";

	$cn = mysqli_connect($servername, $username, $password, $dbname);

	if ($cn) {
		$sql="select * from patient";
		$result=mysqli_query($cn,$sql);
		if (mysqli_num_rows($result)!=0) {
			echo "<table border='0' width='100%'>";
			echo "<thead><tr height='30'>
				<td width='10%'><b>Patient ID</b></td>
				<td width='15%'><b>Patient Name</b></td>
				<td width='10%'><b>Gender</b></td>
				<td width='15%'><b>Contact</b></td>
				<td width='10%'><b>City</b></td>
				<td width='15%'><b>Referred By</b></td>
				<td width='15%'><b>Registration</b></td>
				<td width='10%'><b>Insured?</b></td></tr></thead><tbody>";

			while ($row=mysqli_fetch_assoc($result)) {		
				$patientID=$row['PatientID'];
				$firstName=$row['FirstName'];
				$lastName=$row['LastName'];
				$gender=$row['Gender'];
				$contactNumber=$row['ContactNumber'];
				$city=$row['City'];
				$referredBy=$row['ReferredBy'];
				$firstVisitDate=$row['FirstVisitDate'];
				$insured=$row['Insured'];

				echo "<tr>
					<td>$patientID</td>
					<td>$firstName $lastName</td>
					<td>$gender</td>
					<td>$contactNumber</td>
					<td>$city</td>
					<td>$referredBy</td>
					<td>$firstVisitDate</td>
					<td>$insured</td></tr>";
			}
			echo "</tbody></table>";
			mysqli_close($cn);
		} else {
			echo "No records found !!!";
		}
	} else {
		die("Connection failed: " . mysqli_connect_error);
	}

?>	
</div>	
</section>
    </main>


    <footer>
        <p>&copy; 2025 Akshat Parekh. All rights reserved.</p>
    </footer>

</body>
</html>
