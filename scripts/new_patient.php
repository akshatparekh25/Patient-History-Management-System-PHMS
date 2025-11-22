<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "patient_history";

$cn = mysqli_connect($servername, $username, $password, $dbname);

if ($cn) {
	$patientID = 1;
	$sql = "SELECT max(PatientID) FROM patient";
	$result = mysqli_query($cn,$sql);
	$row = mysqli_fetch_array($result);
	$patientID = $row[0];
	$patientID++;
	//echo $patientID;

if (isset($_POST['btn'])) {
$firstName=$_POST['firstName'];
$lastName=$_POST['lastName'];
$dateOfBirth=$_POST['dateOfBirth'];
$gender=$_POST['gender'];
$contactNumber=$_POST['contactNumber'];
$email=$_POST['email'];
$address=$_POST['address'];
$city=$_POST['city'];
$referredBy=$_POST['referredBy'];
$firstVisitDate=$_POST['firstVisitDate'];
$insured=$_POST['insured'];
$insuranceCompany=$_POST['insuranceCompany'];
$history=$_POST['history'];
$allergicTo=$_POST['allergicTo'];

$sql = "insert into patient (firstName,lastName,dateOfBirth,gender,contactNumber,email,address,city,referredBy,firstVisitDate,insured,insuranceCompany,history,allergicTo) 
values ('$firstName','$lastName','$dateOfBirth','$gender','$contactNumber','$email','$address','$city','$referredBy','$firstVisitDate','$insured','$insuranceCompany','$history','$allergicTo')";
mysqli_query($cn,$sql); 
$patientID++;
# echo $sql;

}





mysqli_close($cn);
}else{
    die("Connection failed: " . mysqli_connect_error);
}

?>