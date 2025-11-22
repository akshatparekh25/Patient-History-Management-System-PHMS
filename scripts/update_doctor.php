<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "patient_history";

if (isset($_POST['btn'])) {
$cn = mysqli_connect($servername, $username, $password, $dbname);
if ($cn) {

	$doctorID=$_POST['doctorID'];
	$email=$_POST['email'];
	$contactNumber=$_POST['contactNumber'];
	$specialization=$_POST['specialization'];
	$availability=$_POST['availability'];

	$sql = "UPDATE doctor set ContactNumber=$contactNumber,Email='$email',Specialization='$specialization',Availability='$availability' where DoctorID=$doctorID";
	mysqli_query($cn,$sql);
	mysqli_close($cn);
}else{
    die("Connection failed: " . mysqli_connect_error);
}
}
?>