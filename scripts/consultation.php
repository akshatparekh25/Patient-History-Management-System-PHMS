<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "patient_history";

if (isset($_POST['btn'])) {
$cn = mysqli_connect($servername, $username, $password, $dbname);

if ($cn) {

	$VisitID=$_POST['visitID'];
	$Diagnosis=$_POST['diagnosis'];
	$DiagnosisDate=$_POST['diagnosisDate'];
	$Observation=$_POST['observation'];
	$Treatment=$_POST['treatment'];
	$LabTest=$_POST['labTest'];
	$Notes=$_POST['notes'];
	$Medicine=$_POST['medicine'];
	$Instruction=$_POST['instruction'];


	$sql = "INSERT INTO history (VisitID,Diagnosis,DiagnosisDate,Observation,Treatment,LabTest,Notes) 
		VALUES ('$VisitID','$Diagnosis','$DiagnosisDate','$Observation','$Treatment','$LabTest','$Notes')";
	mysqli_query($cn,$sql);

		mysqli_query($cn, "SET @HistoryID = LAST_INSERT_ID()");
		$history = mysqli_query($cn, "SELECT @HistoryID AS last_id"); 
		$history_row = mysqli_fetch_assoc($history); 
		$HistoryID = $history_row['last_id'];

	$sql1="INSERT INTO prescription (HistoryID,Medicine,Instruction) VALUES ('$HistoryID','$Medicine','$Instruction')";
	mysqli_query($cn,$sql1);
	mysqli_close($cn);
	header("Location: http://localhost/phms/consultation.php");
}else{
    die("Connection failed: " . mysqli_connect_error);
}
}
?>