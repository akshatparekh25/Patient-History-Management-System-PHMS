<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHMS</title>
    <link rel="stylesheet" href="styles.css">

    <style>
        table {
            width: 80%;
            border-collapse: collapse;
        }

        .scrollable {
            height: 120px;
            overflow-y: scroll;
        }

	thead td { 
	 position: sticky; 
	 top: 0; 
	 background-color: #f1f1f1;
	}
    </style>

<script src="scripts/js.js"></script>
<script>
function fetchRecord() {
    var PatientID = document.getElementById("selectPatientID").value;
    if (PatientID != -1) {
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "scripts/fetch_medicine.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                document.getElementById("table-body").innerHTML = xhr.responseText;
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
		<li><a href="#" style="color: #f3e393;">Medicines&nbsp;adviced</a></li><li class="spacer">|</li>
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
			<?php include 'scripts/populate_visit.php'; ?>
		</select>
	</td>
	</tr>
	</table>
	</section>
</main>


    <main>
	<section class="form">
	<h2>Patient Medicine Details</h2> 
	<div class="scrollable"> 
		<table align="center"> 
		<thead> 
			<tr height='30'> 
				<td width='20%'><b>Doctor Name</b></td> 
				<td width='20%'><b>Visit Date/Time</b></td> 
				<td width='50%'><b>Medicines prescribed</b></td> 
			</tr> 
		</thead> 
		<tbody id="table-body"> 
		</tbody> 
		</table> 
	</div>
	</section>
    </main>


    <footer>
        <p>&copy; 2025 Akshat Parekh. All rights reserved.</p>
    </footer>


</body>
</html>
