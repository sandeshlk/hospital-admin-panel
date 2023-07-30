<!DOCTYPE html>
<html>
<head>
	<title>Admin Dashboard - Doctor List</title>
	<link rel="stylesheet" href="doctorliststyle.css">
</head>
<body>
	<div class="container">
		<h1>Admin Dashboard - Doctor List</h1>
		<table>
			<tr>
				<th>Doctor ID</th>
				<th>Doctor Name</th>
				<th>Speciality</th>
			</tr>
			<?php
				// Connect to the database
				$conn = mysqli_connect("localhost", "root", "", "hospital");

				// Select all doctors from the database
				$query = "SELECT * FROM doctor";
				$result = mysqli_query($conn, $query);

				// Loop through all doctors and display their information in a table
				while ($row = mysqli_fetch_assoc($result)) {
					echo "<tr>";
					echo "<td>".$row["id"]."</td>";
					echo "<td>".$row["username"]."</td>";
					echo "<td>".$row["speciality"]."</td>";
					echo "</tr>";
				}

				// Close the database connection
				mysqli_close($conn);
			?>
		</table>
	</div>
</body>
</html>
