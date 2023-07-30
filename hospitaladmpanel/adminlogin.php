<?php
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST") {
    // Connect to the database
    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "hospital";
    $conn = mysqli_connect($host, $username, $password, $dbname);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Get the username and password from the form
    $username = mysqli_real_escape_string($conn,$_POST['username']);
    $password = mysqli_real_escape_string($conn,$_POST['password']);

    // Query the doctor table to check the username and password
    $sql = "SELECT * FROM admintable WHERE adminname = '$username' and adminpassword = '$password'";
    $result = mysqli_query($conn,$sql);
    $count = mysqli_num_rows($result);

    // If the username and password are correct, redirect to the doctor dashboard
    if($count == 1) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['admin_id'] = $row['admin_id'];
        header("location: admin_dashboard.php");
        exit(); // Stop further execution of the script
    } else {
        $error = "Invalid username or password";
    }
}
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
        <h1>Admin Login</h1>
        
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
    <link rel="stylesheet" type="text/css" href="adminloginstyle.css">
</head>
<body>
    <div class="container">
        <div class="login-box">
           <h3 style="text-align: center;">Admin Login</h3>
            <form method="POST" action="">
                <label for="username">Username:</label>
                <input type="text" name="username" id="username" required>
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" required> 
                <input type="submit" value="Login">
            </form>
            <?php if(isset($error)) { echo $error; } ?>
        </div>
    </div>
</body>
</html>
