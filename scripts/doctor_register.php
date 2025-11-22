<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "patient_history";

$cn = mysqli_connect($servername, $username, $password, $dbname);

if ($cn) {
	$firstName=$_POST['firstName'];
	$lastName=$_POST['lastName'];
	$specialization=$_POST['specialization'];
	$contactNumber=$_POST['contactNumber'];
	$email=$_POST['email'];
	$availability=$_POST['availability'];
	$sql = "insert into doctor (FirstName,LastName,Specialization,ContactNumber,Email,Availability)
	values ('$firstName','$lastName','$specialization','$contactNumber','$email','$availability')";

	mysqli_query($cn,$sql); 

#echo $sql;

	mysqli_close($cn);
	header("Location: http://localhost/PHMS/new_doctor.php");
}else{
    die("Connection failed: " . mysqli_connect_error);
}

?>