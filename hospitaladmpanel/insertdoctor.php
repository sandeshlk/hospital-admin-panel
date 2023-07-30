<?php
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

// Check if the form is submitted
if (isset($_POST['submit'])) {
    // Assign form data to variables
    $name = $_POST['username'];
    $mobile = $_POST['password'];
    $age = $_POST['speciality'];
    $address = $_POST['id'];
    $gender = $_POST['phone'];
    $dob = $_POST['address'];

    // Prepare and execute the SQL statement to insert data into the table
    $sql = "INSERT INTO doctor (username, password, speciality, id, phone, address)
            VALUES ('$username', '$password', '$speciality', '$id', '$phone', '$address')";

    if (mysqli_query($conn, $sql)) {
        echo "New record of doctor added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
}
?>
