<?php
session_start();
if (!isset($_SESSION['doctor_id'])) {
    header("location: doctor_login.php");
    exit();
}

// Connect to the database
$host = "localhost";
$username = "root";
$password = "";
$dbname = "hospital";
$conn = mysqli_connect($host, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get the doctor's speciality
$doctor_id = $_SESSION['doctor_id'];
$sql = "SELECT id FROM doctor WHERE id = '$doctor_id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$doctor_id = $row['id'];

// Get the names of patients who have filled out the registration form and have the same doctor type/speciality
$sql = "SELECT * FROM patient WHERE doctor_id = '$doctor_id' ";
$result = mysqli_query($conn, $sql);
?>

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
        <h1>Doctor Dashboard</h1>
        
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
    <link rel="stylesheet" type="text/css" href="dashboardstyle.css">
</head>
<body>
    <div class="container">
        <h2>Patient List</h2>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>View Details</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?php echo $row['name']; ?></td>
                    <td>
                        <form method="POST" action="pateint_details.php">
                            <input type="hidden" name="barcode" value="<?php echo $row['barcode']; ?>">
                            <input type="submit" value="Submit Query">
                        </form>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>

