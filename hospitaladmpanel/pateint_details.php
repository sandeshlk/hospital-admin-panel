<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Hospital Name - Welcome</title>
    <link rel="stylesheet" href="homestyle.css">
    <script src="https://kit.fontawesome.com/23d807d2b9.js" crossorigin="anonymous"></script>
</head>

<body>
    <header>
        <div class="logo" id="home">
            <img src="logo.png" alt="Hospital Name Logo">
        </div>
        <h1>Patient Details</h1>
        
        <nav>
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="home.php#about">About Us</a></li>
                <li><a href="home.php#services">Services</a></li>
                <li><a href="home.php#doctors">Doctors</a></li>
                <li><a href="home.php#contact">Contact</a></li>
            </ul>
        </nav>
    </header>
    <link rel="stylesheet" type="text/css" href="pateintdetailsstyle.css">
</head>
<body>
    <br><h3 style="text-align: center;">Patient Details</h3><br>
    <?php
    session_start();
    if (!isset($_SESSION['doctor_id'])) {
        header("location: doctor_login.php");
        exit();
    }
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

    // Check if the form is submitted with a valid barcode
    if (isset($_POST['barcode']) && !empty($_POST['barcode'])) {
        $barcode = $_POST['barcode'];

        // Prepare and execute the SQL statement to fetch patient details
        $sql = "SELECT * FROM patient WHERE barcode = '$barcode'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            // Output patient details as a table
            echo "<table>";
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr><td>Name:</td><td>" . $row["name"] . "</td></tr>";
                echo "<tr><td>Mobile:</td><td>" . $row["mobile"] . "</td></tr>";
                echo "<tr><td>Age:</td><td>" . $row["age"] . "</td></tr>";
                echo "<tr><td>Address:</td><td>" . $row["address"] . "</td></tr>";
                echo "<tr><td>Gender:</td><td>" . $row["gender"] . "</td></tr>";
                echo "<tr><td>Date of Birth:</td><td>" . $row["dob"] . "</td></tr>";
                echo "<tr><td>Barcode:</td><td>" . $row["barcode"] . "</td></tr>";
                echo "<tr><td>Type of Visit:</td><td>" . $row["type_of_visit"] . "</td></tr>";
                
                $doctor_name = $row["doctor_name"];
                $barcode = $row["barcode"];
            }
            echo "</table>";

            // Add form for doctor's prescription
            echo '<br><br><h3 style="text-align: center;">Add Prescription</h3>';
            echo "<form method='POST' action='add_prescription.php'>";
            echo "<input type='hidden' name='barcode' value='$barcode'>";
            echo "<label for='doctor_name'>Doctor Name:</label>";
            echo "<input type='text' name='doctor_name' id='doctor_name' value='$doctor_name' required><br><br>";
            echo "<label for='medicines'>Medicines:</label>";
            echo "<textarea name='medicines' id='medicines' required></textarea><br><br>";
            echo "<label for='remarks'>Remarks:</label>";
            echo "<textarea name='remarks' id='remarks'></textarea><br><br>";
            echo "<input type='submit' name='submit' value='Add Prescription'>";
            echo '<div style="text-align: center; margin-top: 20px;">
              <button title="Print Prescription" onclick="window.print();" style="cursor:pointer;">Print Prescription</button>
          </div>';
            echo "</form>";
        } else {
            echo "No patient found with Barcode $barcode";
        }
    } else {
        echo "Invalid Barcode";
    }

    // Close the database connection
    mysqli_close($conn);
    ?>
</body>
</html>

