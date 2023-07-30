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
    $name = $_POST['name'];
    $mobile = $_POST['mobile'];
    $age = $_POST['age'];
    $address = $_POST['address'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $barcode = $_POST['barcode'];
    $type_of_visit = $_POST['type_of_visit'];
    $doctor_name = $_POST['doctor_name'];
    $doctor_id = $_POST['doctor_id'];

    // Prepare and execute the SQL statement to insert data into the table
    $sql = "INSERT INTO patient (name, mobile, age, address, gender, dob, barcode, type_of_visit,doctor_name,doctor_id)
            VALUES ('$name', '$mobile', '$age', '$address', '$gender', '$dob', '$barcode', '$type_of_visit', '$doctor_name','$doctor_id')";

     if (mysqli_query($conn, $sql)) {
        // Redirect to the register.php page with a success message
        header("Location: patientlist.php?success=true");
        exit(); // Stop further execution of the script
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
}
?>
