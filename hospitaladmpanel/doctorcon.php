<?php>
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

// Check if the login form is submitted
if (isset($_POST['submit'])) {
    // Assign form data to variables
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare and execute the SQL statement to retrieve data from the table
    $sql = "SELECT * FROM doctors WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $sql);

    // Check if the query returned any rows
    if (mysqli_num_rows($result) > 0) {
        // User exists, allow login
        echo "Login successful";
    } else {
        // User does not exist or entered incorrect login details, display error message
        echo "Invalid username or password";
    }

    // Close the database connection
    mysqli_close($conn);
}
