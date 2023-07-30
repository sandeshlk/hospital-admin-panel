<?php
session_start();
if(!isset($_SESSION['doctor_id'])) {
    header("location: doctor_login.php");
    exit();
}

// Get the patient ID and prescription details submitted through the form
$barcode = $_POST['barcode'];
$doctor_name = $_POST['doctor_name'];
$medicines = $_POST['medicines'];
$remarks = $_POST['remarks'];

// Database configuration
$host = "localhost";
$username = "root";
$password = "";
$dbname = "hospital";

// Connect to MySQL server
$conn = mysqli_connect($host, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Insert prescription details into the database
$sql = "INSERT INTO prescription (barcode, doctor_name, medicines, remarks) VALUES ('$barcode', '$doctor_name', '$medicines', '$remarks')";
if (mysqli_query($conn, $sql)) {
    echo '<div style="text-align: center; margin-top:50px;">Prescription added successfully</div>';
    
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?>
