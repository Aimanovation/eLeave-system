<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>eLeave Management System</title>
    <style>
		body {
			font-family: Arial, sans-serif;
			background-color: #f4f4f4;
		}
		
		label {
			display: block;
			margin-bottom: 5px;
			font-weight: bold;
			color: #555;
		}
		
		input, select, textarea {
			display: block;
			width: 100%;
			padding: 10px;
			border: 1px solid #ccc;
			border-radius: 5px;
			box-sizing: border-box;
			font-size: 16px;
			margin-bottom: 20px;
			color: #555;
		}
		
		input[type="submit"], input[type="reset"] {
			background-color: #4CAF50;
			color: #fff;
			border: none;
			padding: 10px 20px;
			border-radius: 5px;
			cursor: pointer;
		}
		
		input[type="submit"]:hover, input[type="reset"]:hover {
			background-color: #3e8e41;
		}

        button[type="submit"],
        button[type="reset"] {
          padding: 0.5rem;
          border: none;
          border-radius: 0.25rem;
          background-color: #007bff;
          color: #fff;
          cursor: pointer;
        }

        button[type="submit"]:hover,
        button[type="reset"]:hover {
          background-color: #0062cc;
        }
		
		h4 {
            font-style: italic;
			margin-top: 0;
			font-weight: normal;
			color: #888;
		}

        .form-container {
            width: 50%;
            margin: auto;
            padding: 1rem 1rem 1rem 1rem;
            border: 1px solid #ccc;
            border-radius: 10px;
            background-color: #fff;
			box-shadow: 0 0 10px #ccc;
        }
		
		.required:after {
			content: "*";
			color: red;
		}
    </style>
</head>
<body>
    <?php
    // Call file to connect to server eLeave
    include ("header.php");
    ?>
    <?php
    // This query inserts a record in the eLeave table
    // Check if the form been submited
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $error = array (); // Initialize an error array

    // Check for a userPassword
    if (empty ($_POST ['userPassword'])) {
        $error [] = 'You forgot to the password.';
    } else {
        $p = mysqli_real_escape_string ($connect, trim ($_POST ['userPassword']));
    }
    // Check for a userName
    if (empty ($_POST ['userName'])) {
        $error [] = 'You forgot to enter your name.';
    } else {
        $n = mysqli_real_escape_string ($connect, trim ($_POST ['userName']));
    }

    // Check for a user PhoneNo
    if (empty ($_POST ['userPhoneNo'])) {
        $error[] = 'You forgot to enter your phone number.';
    } else {
        $ph = mysqli_real_escape_string ($connect, trim ($_POST ['userPhoneNo']));
    }

    //check for a userEmail
    if (empty ($_POST ['userEmail'])) {
        $error [] = 'You forgot to enter your email.';
    } else {
        $e = mysqli_real_escape_string ($connect, trim ($_POST ['userEmail']));
    }

    // Check for userAddress
    if (empty ($_POST ['userAddress'])) {
        $error [] = 'You forgot to enter your address.';
    } else {
        $ad = mysqli_real_escape_string ($connect, trim ($_POST ['userAddress']));
    }

    // Check for userPosition
    if (empty ($_POST ['userPosition'])) {
        $error [] = 'You forgot to enter your Position.';
    } else {
        $pos = mysqli_real_escape_string ($connect, trim ($_POST ['userPosition']));
    }

    // Register the user in the database
    // Make the query:
    $q = "INSERT INTO user (userID, userPassword, userName, userPhoneNo, userEmail, userAddress, userPosition, userTotalLeave, leaveID) VALUES ('', '$p', '$n', '$ph', '$e', '$ad', '$pos', '', '')";
    $result = @mysqli_query ($connect, $q);// Run the query
    if ($result) { // If it runs
    echo '<h1>Thank you!</h1>';
    exit(); 
    } else {
        // If it didn't run print message
        echo '<h1>System error!</h1>';

        // Debugging message
        echo '<p>' .mysqli_error($connect). '<br><br>Query: '.$q.'</p>';
    } // End  of it (result)
    mysqli_close($connect); //close the database connection_aborted
    exit();
    } // End of the submit conditionl
    ?>
<div class="form-container">
    <h2>REGISTER USER</h2>
    <h4>*required field</h4>
    <form action="userRegister.php" method="post">
    <div>
      <label for="userPassword">Password:</label>
      <input type="Password" id="userPassword" name="userPassword" size="15" maxlength="60" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required value="<?php if (isset($_POST['userPassword'])) echo $_POST['userPassword']; ?>">
    </div>
    <div>
      <label for="userName">Full Name*:</label>
      <input type="text" id="userName" name="userName" size="30" maxlength="50" required value="<?php if (isset($_POST['userName'])) echo $_POST ['userName']; ?>">
    </div>
    <div>
      <label for="userPhoneNo">Phone No.*:</label>
      <input type="tel" pattern="^(?:\+?6?01\d{1}-?(\d{3}|\d{2})-?\d{4})$" title="Please enter a valid Malaysian phone number" id="userPhoneNo" name="userPhoneNo" size ="15" maxlength="20" required value="<?php if (isset($_POST['userPhoneNo'])) echo $_POST ['userPhoneNo']; ?>">
    </div>
    <div>
      <label for="userEmail">User Email*:</label>
      <input type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\ . [a-z]{2, }$" id="userEmail" name="userEmail" size ="30" maxlength="50" required value="<?php if (isset($_POST['userEmail'])) echo $_POST ['userEmail']; ?>">
    </div>
    <div>
      <label for="userAddress">User Address*:</label>
      <textarea id="userAddress" name="userAddress" size="30" maxlength="50" required value="<?php if (isset($_POST['userAddress'])) echo $_POST ['userAddress']; ?>"></textarea>
    </div>
    <div>
      <label for="userPosition">User Position* :</label>
      <select name="userPosition" id="userPosition">
        <option value="permanent">Permanent</option>
        <option value="contract">Contract</option>
        <option value="temporary">Temporary</option>
      </select>
    </div>
    <div>
      <button type="submit">Register</button>
      <button type="reset">Clear All</button>
    </div>
  </form>
</div>

</body>
</html>