<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>eLeave Management System</title>
    <style>
      body {
        font-family: Arial, Helvetica, sans-serif;
        background-color: #f2f2f2;
      }

      .form-container {
        background-color: white;
        box-shadow: 0 0 10px #ccc;
        width: 50%;
        margin: 6em auto;
        padding: 1rem 2.3rem 1rem 1rem;
        border: 1px solid #ccc;
        border-radius: 10px;
      }

      h2 {
        font-size: 28px;
        margin-top: 0;
        margin-bottom: 20px;
      }

      h4 {
        font-size: 16px;
        font-style: italic;
        margin-top: 0;
        margin-bottom: 10px;
      }

      label {
        display: inline-block;
        width: 150px;
        font-size: 18px;
        margin-bottom: 10px;
      }

      input {
        display: block;
        width: 100%;
        padding: 10px;
        font-size: 16px;
        border-radius: 5px;
        border: 1px solid #ccc;
        margin-bottom: 20px;
      }

      button {
        background-color: #4CAF50;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        margin-right: 10px;
      }

      button:hover {
        background-color: #45a049;
      }

      button:active {
        background-color: #3e8e41;
      }

      button[type=reset] {
        background-color: #f44336;
      }

      button[type=reset]:hover {
        background-color: #da190b;
      }
      
      button[type=reset]:active {
        background-color: #c21305;
      }
    </style>
</head>
<body>
<?php
    // Call file to connect server eleave
    include ("header.php");
?>
<?php
    // This query inserts a record in the eLeave table
    // Check if the form been submited
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $error = array (); // Initialize an error array

    // Check for a adminPassword
    if (empty ($_POST ['adminPassword'])) {
      $error [] = 'You forgot to the password.';
    } else {
      $p = mysqli_real_escape_string ($connect, trim ($_POST ['adminPassword']));
    }

    // Check for a adminName
    if (empty ($_POST ['adminName'])) {
      $error [] = 'You forgot to enter your name.';
    } else {
      $n = mysqli_real_escape_string ($connect, trim ($_POST ['adminName']));
    }

    // Check for a admin PhoneNo
    if (empty ($_POST ['adminPhoneNo'])) {
      $error[] = 'You forgot to enter your phone number.';
    } else {
      $ph = mysqli_real_escape_string ($connect, trim ($_POST ['adminPhoneNo']));
    }
    
    // Check for a adminEmail
    if (empty ($_POST ['adminEmail'])) {
      $error [] = 'You forgot to enter your email.';
    } else {
      $e = mysqli_real_escape_string ($connect, trim ($_POST ['adminEmail']));
    }

    // Register the admin in the database
    // Make the query:
    $q = "INSERT INTO admin (adminID, adminPassword, adminName, adminPhoneNo, adminEmail) VALUES ('', '$p', '$n', '$ph', '$e')";
    $result = @mysqli_query ($connect, $q); // Run the query
    
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
  <h2>Register Admin</h2>
  <h4>*required field</h4>
  <form action="adminRegister.php" method="post">
    <div>
      <label for="adminPassword">Password:</label>
      <input type="password" id="adminPassword" name="adminPassword" size="15" maxlength="60" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required value="<?php if (isset($_POST['adminPassword'])) echo $_POST['adminPassword']; ?>">
    </div>
    <div>
      <label for="adminName">Admin Name*:</label>
      <input type="text" id="adminName" name="adminName" size="30" maxlength="50" required value="<?php if (isset($_POST['adminName'])) echo $_POST['adminName']; ?>">
    </div>
    <div>
      <label for="adminPhoneNo">Phone No.*:</label>
      <input type="tel" pattern="^(?:\+?6?01\d{1}-?(\d{3}|\d{2})-?\d{4})$" id="adminPhoneNo" name="adminPhoneNo" size="15" maxlength="20" required value="<?php if (isset($_POST['adminPhoneNo'])) echo $_POST['adminPhoneNo']; ?>">
    </div>
    <div>
      <label for="adminEmail">Admin Email*:</label>
      <input type="email" id="adminEmail" name="adminEmail" size="30" maxlength="50" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\ . [a-z]{2, }$" value="<?php if (isset($_POST['adminEmail'])) echo $_POST['adminEmail']; ?>">
    </div>
    <div>
      <button type="submit">Register</button>
      <button type="reset">Clear All</button>
    </div> 
  </form>
</div>
</body>
</html>