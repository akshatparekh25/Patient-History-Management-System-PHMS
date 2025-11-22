<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "patient_history";

$cn = mysqli_connect($servername, $username, $password, $dbname);

if ($cn) {
	$sql = "SELECT DISTINCT b.PatientID, CONCAT(b.FirstName,' ', b.LastName) AS PatientName FROM visit a,patient b where a.PatientID=b.PatientID";
	$result = mysqli_query($cn, $sql);
	if (mysqli_num_rows($result) > 0) {
	echo "<option value='-1' selected>Select Record</option>";
	    while($row = mysqli_fetch_assoc($result)) 
	   {
	        echo "<option value=".$row['PatientID'].">".$row['PatientID']." - ". $row['PatientName']."</option>";
	    }
	} else {
	    echo "<option value='-1'>No records found</option>";
	}

	mysqli_close($cn);
} else {
    	die("Connection failed: " . mysqli_connect_error());
}
/* 
sql = "SELECT b.PatientID, CONCAT(c.FirstName,' ', c.LastName) AS PatientName, CONCAT(a.FirstName, ' ', a.LastName) AS DoctorName,b.VisitDateTime,b.CaseFee,b.CaseFeeCategory,b.VisitCategory FROM doctor a,visit b where b.DoctorID=a.DoctorID";
*/
?>