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
        <h1 style="color: white;">Admin Dashboard</h1>
        
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
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="container">
		<br>
		<h1 style="text-align: center;">Add Doctor</h1>
		<br>
		<form method="POST" action="">
			<label for="id">Doctor ID:</label>
			<input type="text" id="id" name="id" required>

			<label for="username">Doctor Name:</label>
			<input type="text" id="username" name="username" required>
			

			<label for="password">Password:</label>
			<input type="password" id="password" name="password" required><br>

			<br>
			<label for="speciality">Speciality:</label>
		        <select name="speciality" id="speciality" required>
			<option value="">Speciality</option>
			<option value="eye">Eye</option>
			<option value="ortho">Ortho</option>
			<option value="general">General</option>
		</select><br><br>

			<button class="submit" type="submit"  name="submit">Add Doctor</button>
		</form>
	</div>

	<?php
		// Connect to the database
		$conn = mysqli_connect("localhost", "root", "", "hospital");

		// Check if the form has been submitted
		if (isset($_POST["submit"])) {
			// Get the values from the form
			$id = $_POST["id"];
			$username = $_POST["username"];
			$password = $_POST["password"];
			$speciality = $_POST["speciality"];

			// Insert the values into the database
			$query = "INSERT INTO doctor (id, username, password, speciality) VALUES ('$id', '$username', '$password', '$speciality')";
			mysqli_query($conn, $query);

			// Redirect to the doctor list page
			header("Location: doctorlist.php");
			exit();
		}

		// Close the database connection
		mysqli_close($conn);
	?>
</body>
</html>
