<!DOCTYPE html>
<html>
<head>
	<title>Receptionist Dashboard - Patient List</title>
	<link rel="stylesheet" href="doctorliststyle.css">
</head>
<body>
	<div class="container">
		<h1>Patient List</h1>
		<table>
			<tr>
				<th>Barcode</th>
				<th>Patient Name</th>
				<th>Type of visit</th>
				<th>Doctor Name</th>
			</tr>
			<?php
				// Connect to the database
				$conn = mysqli_connect("localhost", "root", "", "hospital");

				// Select all doctors from the database
				$query = "SELECT * FROM patient";
				$result = mysqli_query($conn, $query);

				// Loop through all doctors and display their information in a table
				while ($row = mysqli_fetch_assoc($result)) {
					echo "<tr>";
					echo "<td>".$row["barcode"]."</td>";
					echo "<td>".$row["name"]."</td>";
					echo "<td>".$row["type_of_visit"]."</td>";
					echo "<td>".$row["doctor_name"]."</td>";
					echo "</tr>";
				}

				// Close the database connection
				mysqli_close($conn);
			?>
		</table>
	</div>
</body>
</html>
