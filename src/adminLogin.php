<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>eLeave Management System</title>
    <style>
		body {
			background-color: #f2f2f2;
			font-family: Arial, sans-serif;
			font-size: 16px;
			line-height: 1.5;
			margin: 0;
			padding: 0;
		}

		h2 {
			font-size: 24px;
			margin: 30px auto;
			text-align: center;
		}

		form {
			background-color: #fff;
			border: 1px solid #ccc;
			box-shadow: 0 0 10px #ccc;
			margin: 0 auto;
			max-width: 600px;
			padding: 1rem 2.3rem 1rem 1rem;
		}

		label {
			display: block;
			font-size: 18px;
			margin: 1rem 0 0 0;
		}

		input[type="text"],
		input[type="password"] {
			border: 1px solid #ccc;
			border-radius: 3px;
			display: block;
			font-size: 16px;
			margin-bottom: 20px;
			padding: 10px;
			width: 100%;
		}

		button[type="submit"],
		button[type="reset"] {
			background-color: #4CAF50;
			border: none;
			border-radius: 3px;
			color: #fff;
			cursor: pointer;
			display: inline-block;
			font-size: 18px;
			margin-right: 10px;
			padding: 10px 20px;
		}

		button[type="reset"] {
			background-color: #f44336;
		}

		button[type="submit"]:hover {
			background-color: #3e8e41;
		}
		
		button[type="reset"]:hover {
			background-color: #d2190b;
		}

		a {
			color: #4CAF50;
			font-size: 16px;
			text-decoration: none;
		}
	</style>
</head>
<body>
    <?php
    // Call file to connect to database eleave
    include("header.php");
    ?>
    <?php
    // This section process submissions from the login form
    // Check is the form has been submitted
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Validate the adminID
        if (!empty($_POST['adminID'])) {
            $id = mysqli_real_escape_string($connect, $_POST['adminID']);
        } else {
            $id == FALSE;
            echo '<p class="error">You forget to enter your ID.</p>';
        }

        // Validate the adminPassword
        if (!empty($_POST['adminPassword'])) {
            $p = mysqli_real_escape_string($connect, $_POST['adminPassword']);
        } else {
            $p = FALSE;
            echo '<p class="error">You forgot to enter your Password.</p>';
        }
        // If there is no problem
        if ($id && $p) {
            // Retrieve the adminID, adminPassword, adminName, adminPhoneNo, adminEmail
            $q = "SELECT adminID, adminPassword, adminName, adminPhoneNo, adminEmail FROM admin WHERE (adminID = '$id' AND adminID = '$p')";

            // Run the query and assign it the the variable $result
            $result = mysqli_query($connect, $q);

            // Count the number of rows that match the adminID/adminPassword combination if one database row (record) matches the input:
            if (@mysqli_num_rows($result) == 1) {
                // Start the sessions, fetch the record and insert the three value into the array
                session_start();
                $_SESSION = mysqli_fetch_array($result, MYSQLI_ASSOC);
                echo '<p> Welcome to eLeave System </p>';

                // Cancel the rest of the script
                exit();

                mysqli_free_result($result);
                mysqli_close($connect);

            // No match was made
            } else {
                echo '<p class="error"> The adminID and adminPassword did not match in our records. Perhaps you need to register first. Click the register button below. </p>';
                // If there was a problem
            }
        } else {
                echo '<p class="error"> Please try again. </p>';
            } 
        mysqli_close($connect);
    } // End of submit condition
    ?>
	<h2>Admin Login</h2>
	<form action="adminLogin.php" method="$_POST">
		<div>
			<label for="adminID">Admin ID:</label>
			<input type="text" id="adminID" name="adminID" size="4" maxlength="6" value="<?php if (isset($_POST['adminID'])) echo $_POST['adminID']; ?>">
		</div>
		<div>
			<label for="adminPassword">Password:</label>
			<input type="password" id="adminPassword" name="adminPassword" size="15" maxlength="60"
			pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one
			uppercase and lowercase letter, and at least 8 or more characters" required
			value="<?php if (isset($_POST['adminPassword'])) echo $_POST ['adminPassword']; ?>">
		</div>
		<div>
			<button type="submit">Login</button>
			<button type="reset">Reset</button>
		</div>
		<div>
			<label>
				Don't have an account?
				<a href="adminRegister.php">Sign Up</a>
			</label>
		</div>
	</form>
</body>
</html>
