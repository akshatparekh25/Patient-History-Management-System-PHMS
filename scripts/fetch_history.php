<?php

error_reporting(0);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "patient_history";

$cn = mysqli_connect($servername, $username, $password, $dbname);

if ($cn) {
	$PatientID = $_POST['PatientID']; 
	$sql = "SELECT CONCAT(b.FirstName, ' ', b.LastName) AS DoctorName, c.Diagnosis,
		c.DiagnosisDate, c.Observation, c.Treatment, c.LabTest, c.Notes, d.Medicine, d.Instruction
		FROM visit a
		JOIN doctor b ON a.DoctorID = b.DoctorID
		JOIN history c ON a.VisitID = c.VisitID
		LEFT JOIN prescription d ON c.HistoryID = d.HistoryID
		WHERE a.PatientID = '$PatientID'
		ORDER BY c.DiagnosisDate Desc"; 
	$result = mysqli_query($cn, $sql); 
	
	if (mysqli_num_rows($result) > 0) { 
		
		$sql1="Select CONCAT(FirstName,' ',LastName) AS PatientName from patient where PatientID='$PatientID'";
		$result1=mysqli_query($cn, $sql1);
		$row1 = mysqli_fetch_assoc($result1);
		echo "<h2>Patient Name: ".$row1['PatientName']." </h2>";
		while ($row = mysqli_fetch_assoc($result)) {
			echo "<h4>Doctor Name: ".$row['DoctorName']." </h4>";
			echo "<table width='100%' border='0' align='center'><tr valign='top'>";
			echo "<td width='47%'><b>Date & Diagnosis:</b> (".$row['DiagnosisDate'].") ".$row['Diagnosis']." </td>";
			echo "<td width='5%'>&nbsp;</td><td width='47%'><b>Observation and Treatment: </b>".$row['Observation']." || ".$row['Treatment']." </td></tr>";
			echo "<tr valign='top'><td width='47%'><b>Medicines & Instructions: </b>".$row['Medicine']." || ".$row['Instruction']." </td>";
			echo "<td width='5%'>&nbsp;</td><td width='47%'><b>Lab Tests: </b>".$row['LabTest']." </td></tr>"; 
			echo "<tr valign='top'><td colspan='3'><b>Additional details: </b>".$row['Notes']." </td></tr></table>";
		}
	}

mysqli_close($cn);
}

?>