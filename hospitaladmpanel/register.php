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
        <h1 style="color: white;">Patient Registration Form</h1>
        
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
	<br>
	<form method="POST" action="patientcon.php">
		<label for="name">Name:</label>
		<input type="text" name="name" id="name" required><br><br>

		<label for="mobile">Mobile:</label>
        <input type="tel" id="mobile" name="mobile" pattern="[0-9]{10}" required><br><br>

		<label for="age">Age:</label>
		<input type="number" name="age" id="age" required><br><br>

		<label for="address">Address:</label>
		<textarea name="address" id="address" required></textarea><br><br>

		<label for="gender">Gender:</label>
		<input type="radio" name="gender" value="male" required>Male
		<input type="radio" name="gender" value="female">Female
        <input type="radio" name="gender" value="others">Others<br><br>

		<label for="dob">Date of Birth:</label>
		<input type="date" name="dob" id="dob" required><br><br>

        <label for="barcode">Barcode:</label>
        <input type="text" name="barcode" id="barcode" value="<?php echo uniqid(); ?>" readonly><br><br>

		<label for="type_of_visit">Type of Visit:</label>
		<select name="type_of_visit" id="type_of_visit" required onchange="filterDoctorsByType()">
			<option value="">Select Type of Visit</option>
			<option value="eye">Eye</option>
			<option value="ortho">Ortho</option>
			<option value="general">General</option>
		</select><br><br>

		<label for="doctor_name">Doctor Name:</label>
		<select name="doctor_name" id="doctor_name" required onchange="updateDoctorID()">
			<option value="">Select Doctor Name</option>
			<?php
				// Connect to the database
				$conn = mysqli_connect("localhost", "root", "", "hospital");

				// Query to get all doctors with their types
				$sql = "SELECT id, username, speciality FROM doctor";
				$result = mysqli_query($conn, $sql);

				// Display options for each doctor with the data attributes
				while ($row = mysqli_fetch_assoc($result)) {
					echo '<option value="' . $row['username'] . '" data-doctor-id="' . $row['id'] . '" data-doctor-type="' . $row['speciality'] . '">' . $row['username'] . '</option>';
				}

				// Close the database connection
				mysqli_close($conn);
			?>
		</select><br><br>

		<label for="doctor_id">Doctor ID:</label>
		<input type="text" name="doctor_id" id="doctor_id" readonly><br><br>
		<form method="POST" action="patientlist.php">
			<input type="submit" name="submit" value="Register">
		</form>
	</form>
	 <?php
    if (isset($_GET['success'])) {
        echo '<p style="text-align: center;">Patient data added successfully</p>';
    }
    ?>

	<script>
		function updateDoctorID() {
			// Get the selected doctor name
			let selectedDoctorName = document.getElementById("doctor_name").value;

			// Find the corresponding doctor ID from the data-doctor-id attribute
			let selectedOption = document.querySelector(`[value="${selectedDoctorName}"]`);
			let doctorID = selectedOption.getAttribute("data-doctor-id");

			// Update the Doctor ID field
			document.getElementById("doctor_id").value = doctorID;
		}

		function filterDoctorsByType() {
			// Get the selected type of visit
			let selectedTypeOfVisit = document.getElementById("type_of_visit").value;

			// Get all doctor options
			let doctorOptions = document.getElementById("doctor_name").options;

			// Show only the doctors that match the selected type of visit
			for (let i = 0; i < doctorOptions.length; i++) {
				let doctorOption = doctorOptions[i];
				let doctorType = doctorOption.getAttribute("data-doctor-type");
				if (selectedTypeOfVisit === doctorType || selectedTypeOfVisit === "") {
					doctorOption.style.display = "block";
				} else {
					doctorOption.style.display = "none";
				}
			}

			// Reset the selected doctor name if it is hidden
			let selectedDoctorName = document.getElementById("doctor_name").value;
			let selectedOption = document.querySelector(`[value="${selectedDoctorName}"]`);
			if (!selectedOption || selectedOption.style.display === "none") {
				document.getElementById("doctor_name").value = "";
			}
		}
	</script>
</body>
</html>

