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


<script src="scripts/js.js"></script>
<script>
	function fillVisit()
	{
		const select=document.getElementById("selectVisitID").value;
		if (select !=-1)
		{
			document.getElementById("visitID").value=select;
			document.getElementById("Submit").setAttribute("type","submit");
		}
		else
			document.getElementById("Submit").setAttribute("type","button");
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
		<li><a href="#"  style="color: #f3e393;">Consultation</a></li><li class="spacer">|</li>
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
		<label for="selectVisitID">Select Patient:</label> 
		<select id="selectVisitID" name="selectPatientID" onchange="fillVisit()">
			<?php include 'scripts/populate_consult.php'; ?>
		</select>
	</td>
	<td>&nbsp;</td>
	</tr>
	</table>
	</section>
</main>




    <main>
	<section class="form">
	<h2>Consultation Details</h2> 

	<form action="http://localhost/phms/scripts/consultation.php" method="post"> 
	<table border="0" width="100%">
	<tr height="30" valign="bottom">
	<td width="33%">
	<input type="hidden" id="visitID" name="visitID">
	<label for="diagnosis">Diagnosis</label> 
	<input type="text" id="diagnosis" name="diagnosis" maxlength="50" required>
	</td>
	<td width="33%"> 
	<label for="diagnosisDate">Diagnosis Date</label>
	<input type="text" id="diagnosisDate" name="diagnosisDate" size="10" class="readonly" readonly> 
	<script>
		const today = new Date();
		const year = today.getFullYear();
		const month = String(today.getMonth() + 1).padStart(2, '0');
		const day = String(today.getDate()).padStart(2, '0');
		const todayStr = `${year}-${month}-${day}`;
		document.getElementById('diagnosisDate').value = todayStr;
	</script>
	</td>
	<td width="33%">
	<label for="observation">Observation</label>
	<textarea id="observation" name="observation" maxlength="100" required></textarea>
	</td>
	</tr>
	<tr height="30" valign="bottom">
	<td>
	<label for="treatment">Treatment</label>
	<textarea id="treatment" name="treatment" cols="30" maxlength="100"></textarea>
	</td>
	<td>
	<label for="labTest">Lab Test</label>
	<input type="text" id="labTest" name="labTest" maxlength="50"> 
	</td>
	<td>
	<label for="notes">Notes</label>
	<textarea id="notes" name="notes" cols="30" maxlength="100"></textarea>
	</td>
	</tr>
	<tr  height="30" valign="bottom">
	<td>
	<label for="medicine">Medicine</label>
	<textarea id="medicine" name="medicine" maxlength="250" cols="30"></textarea>
	</td>
	<td>
	<label for="instruction">Instruction</label>
	<textarea id="instruction" name="instruction" cols="30" maxlength="250"></textarea>
	</td>
	<td>
	<input type="submit" value="Submit" id="Submit" name="btn">
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
