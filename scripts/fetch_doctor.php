<?php

error_reporting(0);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "patient_history";

$cn = mysqli_connect($servername, $username, $password, $dbname);

if ($cn) {

	$DoctorID = $_POST['DoctorID']; 
	$sql = "SELECT * FROM doctor WHERE DoctorID = '$DoctorID'"; 
	$result = mysqli_query($cn, $sql); 
	if (mysqli_num_rows($result) == 1) { 
		$row = mysqli_fetch_assoc($result); 
		echo json_encode($row); 
	} else { 
		echo json_encode([]); 
	}

mysqli_close($cn);
}

?>