<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "patient_history";

$cn = mysqli_connect($servername, $username, $password, $dbname);

if ($cn) {
	$sql = "SELECT a.VisitID, CONCAT(b.FirstName, ' ', b.LastName) AS PatientName, CONCAT(c.FirstName, ' ', c.LastName) AS DoctorName FROM visit a,patient b,doctor c where a.PatientID=b.PatientID AND a.DoctorID=c.DoctorID AND a.PatientID in (SELECT PatientID FROM visit WHERE a.VisitID Not In (Select VisitID from history))";

	$result = mysqli_query($cn, $sql);
	if (mysqli_num_rows($result) > 0) {
	echo "<option value='-1' selected>Select Record</option>";
	    while($row = mysqli_fetch_assoc($result)) 
	   {
	        echo "<option value=".$row['VisitID'].">".$row['DoctorName']." --> ". $row['PatientName']."</option>";
	    }
	} else {
	    echo "<option value='-1'>No records found</option>";
	}

	mysqli_close($cn);
} else {
    	die("Connection failed: " . mysqli_connect_error());
}
?>