<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "patient_history";

if (isset($_POST['btn'])) {
$cn = mysqli_connect($servername, $username, $password, $dbname);

if ($cn) {

	$patientID=$_POST['patientID'];
	$contactNumber=$_POST['contactNumber'];
	$email=$_POST['email'];
	$address=$_POST['address'];
	$city=$_POST['city'];
	$referredBy=$_POST['referredBy'];
	$insured=$_POST['insured'];
	$insuranceCompany=$_POST['insuranceCompany'];
	$history=$_POST['history'];
	$allergicTo=$_POST['allergicTo'];


	$sql = "UPDATE patient set ContactNumber=$contactNumber,Email='$email',Address='$address',City='$city',ReferredBy='$referredBy',Insured='$insured',InsuranceCompany='$insuranceCompany',History='$history',AllergicTo='$allergicTo' where PatientID=$patientID";
	mysqli_query($cn,$sql);
	mysqli_close($cn);
}else{
    die("Connection failed: " . mysqli_connect_error);
}
}
?>