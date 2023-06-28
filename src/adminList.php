<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>eLeave Management System</title>
	<style>
		table {
			border: 1px solid black;
		  	border-collapse: collapse;
		  	width: 100%;
		}

		th, td {
			border: 1px solid black;
			text-align: left;
			padding: 8px;
		}

		tr:nth-child(even) {
			background-color: #f2f2f2
		}

		th {
			background-color: #4CAF50;
			color: white;
		}

		td a {
			background-color: #4CAF50;
			border-radius: 3px;
			color: white;
			padding: 6px 12px;
			text-decoration: none;
		}

		td a:hover {
			background-color: #3e8e41;
		}

		.error {
			color: red;
		}
	</style>
</head>
<body>
	<?php
		// Call file to connect to server eLeave
		include ("header.php");
	?>
	<h2>List of Admin</h2>
	<?php
		// Make the query
		$q = "SELECT adminID, adminPassword, adminName, adminPhoneNo, adminEmail FROM admin ORDER BY adminID";

		$result = @mysqli_query($connect, $q);

		if ($result) {
			// Table heading
			echo '<table>
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Phone No.</th>
				<th>Email</th>
				<th>Update</th>
				<th>Delete</th>
			</tr>';

			// Fetch and print all the records
			while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
				echo
				'<tr>
					<td>'.$row['adminID'].'</td>
					<td>'.$row['adminName'].'</td>
					<td>'.$row['adminPhoneNo'].'</td>
					<td>'.$row['adminEmail'].'</td>
					<td><a href="adminUpdate.php?id='.$row['adminID'].'">Update</a></td>
					<td><a href="adminDelete.php?id='.$row['adminID'].'">Delete</a></td>
				</tr>';
			}

			// Close the table
			echo "</table>";

			// Free up the resource
			mysqli_free_result($result);

		} else {
			// Error message
			echo '<p class="error">The current user cannot be retrieved. We apologize for any inconvenience.</p>';

			// Debugging message
			echo "<p>".mysqli_error($connect)."<br></br>Query:".$q."</p>";
		}

		// Close the database connection
		mysqli_close($connect);
	?>
</div>
</div>
</body>
</html>