<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "patient_history";

$cn = mysqli_connect($servername, $username, $password, $dbname);

if ($cn) {

$sql = "SELECT PatientID, CONCAT(FirstName, ' ', LastName) AS PatientName FROM patient";
$result = mysqli_query($cn,$sql);

$patients = [];
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_array($result)) {
        $patients[] = $row;
    }
}

$sql = "SELECT DoctorID, CONCAT(FirstName, ' ', LastName) AS DoctorName FROM doctor";
$result = mysqli_query($cn,$sql);

$doctors = [];
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_array($result)) {
        $doctors[] = $row;
    }
}

if (isset($post) && $post==1) {
$patientID=$_POST['patientID'];
$doctorID=$_POST['doctorID'];
# $visitDateTime=$_POST['visitDateTime'];
$caseFee=$_POST['caseFee'];
$caseFeeType=$_POST['caseFeeType'];
$visitCategory=$_POST['visitCategory'];
$notes=$_POST['notes'];

$sql = "insert into visit (PatientID,DoctorID,CaseFee,CaseFeeType,VisitCategory,Notes) 
values ($patientID,$doctorID,$caseFee,'$caseFeeType','$visitCategory','$notes')";
mysqli_query($cn,$sql);
# echo $sql;
$post=0;
}



mysqli_close($cn);
}else{
    die("Connection failed: " . mysqli_connect_error);
}

?>