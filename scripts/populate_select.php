<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "patient_history";

$cn = mysqli_connect($servername, $username, $password, $dbname);

if ($cn) {
	$sql = "SELECT PatientID, CONCAT(FirstName, ' ', LastName) AS PatientName FROM patient";
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
?>