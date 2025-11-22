<?php

error_reporting(0);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "patient_history";

$cn = mysqli_connect($servername, $username, $password, $dbname);

if ($cn) {
	$PatientID = $_POST['PatientID']; 
	$sql = "SELECT a.VisitDateTime,a.CaseFeeType,a.VisitCategory,a.Notes,CONCAT(b.FirstName,' ',b.LastName) AS DoctorName FROM visit a, doctor b WHERE a.PatientID = '$PatientID' AND a.DoctorID=b.DoctorID"; 
	$result = mysqli_query($cn, $sql); 
	
	if (mysqli_num_rows($result) > 0) { 
		while ($row = mysqli_fetch_assoc($result)) {

		if ($row["CaseFeeType"]=='N')		$CFT="New";
		if ($row["CaseFeeType"]=='R')		$CFT="Renew";
		if ($row["CaseFeeType"]=='S')		$CFT="Special";
		if ($row["CaseFeeType"]=='C')		$CFT="Consult";
		if ($row["CaseFeeType"]=='O')		$CFT="Other";

		if ($row["VisitCategory"]=='S')		$VC="Scheduled Visit";
		if ($row["VisitCategory"]=='E')		$VC="Emergency";
		if ($row["VisitCategory"]=='C')		$VC="Consultation";
		if ($row["VisitCategory"]=='R')		$VC="Referred Visit";
		if ($row["VisitCategory"]=='O')		$VC="Other";

		$visit=date('d-m-Y - h:i',strtotime($row["VisitDateTime"]));

		echo "<tr><td>".$row["DoctorName"]."</td><td>".$visit."</td><td>".$CFT."</td><td>".$VC."</td><td>".$row["Notes"]."</td></tr>"; 
		}
	} else { 
		echo "<tr><td colspan='5'>No records found</td></tr>"; 
	}

mysqli_close($cn);
}

?>