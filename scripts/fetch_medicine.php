<?php

error_reporting(0);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "patient_history";

$cn = mysqli_connect($servername, $username, $password, $dbname);

if ($cn) {
	$PatientID = $_POST['PatientID']; 
	$sql = "SELECT c.VisitDateTime,a.medicine, CONCAT(d.FirstName,' ',d.LastName) AS DoctorName FROM prescription a, history b, visit c, doctor d WHERE c.VisitID = b.VisitID AND b.HistoryID=a.HistoryID AND c.DoctorID=d.DoctorID AND c.PatientID='$PatientID'"; 
	$result = mysqli_query($cn, $sql); 
	
	if (mysqli_num_rows($result) > 0) { 
		while ($row = mysqli_fetch_assoc($result)) {

		$visit=date('d-m-Y - h:i',strtotime($row["VisitDateTime"]));

		echo "<tr><td>".$row["DoctorName"]."</td><td>".$visit."</td><td>".$row['medicine']."</td></tr>"; 
		}
	} else { 
		echo "<tr><td colspan='3'>No records found</td></tr>"; 
	}

mysqli_close($cn);
}

?>