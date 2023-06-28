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
      }

      .form-title {
        text-align: center;
        font-size: 1.5rem;
        margin-bottom: 1.5rem;
      }

      .login-form {
        display: flex;
        flex-direction: column;
        align-items: center;
        background-color: #f9f9f9;
        border: 1px solid #ddd;
        padding: 2rem 3rem 2rem 2rem;
        max-width: 500px;
        margin: 0 auto;
      }

      .form-group {
        display: flex;
        flex-direction: column;
        margin-bottom: 1rem;
        width: 100%;
      }

      label {
        margin-bottom: 0.5rem;
      }

      input[type="text"],
      input[type="password"] {
        padding: 0.5rem;
        border: 1px solid #ddd;
        border-radius: 0.25rem;
        width: 100%;
      }

      button[type="submit"],
      button[type="reset"] {
        padding: 0.5rem;
        border: none;
        border-radius: 0.25rem;
        background-color: #007bff;
        color: #fff;
        margin: 1rem 1rem;
        cursor: pointer;
      }

      button[type="submit"]:hover,
      button[type="reset"]:hover {
        background-color: #0062cc;
      }

      a {
        color: #007bff;
        text-decoration: none;
      }

      a:hover {
        text-decoration: underline;
      }
    </style>
</head>
<body>

<?php
// Call file to connect server eleave
include ("header.php");
?>

<?php
// This section processes submission from the login form
// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    // Validate the userID
    if (!empty($_POST['userID'])) {
        $id = mysqli_real_escape_string($connect, $_POST['userID']);
    } else {
        $id = FALSE;
        echo '<p class="error">You forgot to enter your ID.</p>';
    }
    // Validate the userPassword
    if (!empty($_POST['userPassword'])) {
        $p = mysqli_real_escape_string($connect, $_POST['userPassword']);
    } else {
        $p = FALSE;
        echo '<p class="error">You forgot to enter your password.</p>';
    }
    // If no problems
    if ($id && $p) {
        // Retrieve the userID, userPassword, userName, userPhoneNo, userEmail, //userAddress, userPosition, userTotalLeave, leaveID
        $q = "SELECT userID, userPassword, userName, userPhoneNo, userEmail, userAddress, userPosition, userTotalLeave, leaveID FROM user WHERE (userID ='$id' AND userPassword = '$p')";
    // Run the query and assign it to the variable $result 
    $result = mysqli_query ($connect, $q);
    // Count the number of rows that match the userID/userPassword combination if one database row (record) matches the imput:
    if (@mysqli_num_rows ($result) == 1) {
        // Start the session, fetch the record and insert the three values in an array session start();
        $_SESSION = mysqli_fetch_array ($result, MYSQLI_ASSOC);
        echo '<p> Welcome to eLeave System <p>';
        // Cancel the rest of the script
        exit();

        mysqli_free_result ($result);
        mysqli_close($connect);

        // No match was made
    } else {
        echo '<p class="error"> The userID and userPassword entered do not match our records <br> perhaps you need to register, just click the Register button </p>';
    }
    //if there was a problems
    } else {
        echo '<p class="error"> Please try again </p>';
    }
    mysqli_close($connect);
} // End of submit condition
?>
<h2 class="form-title">USER LOGIN</h2>
<form class="login-form" action="userLogin.php" method="post">
  <div class="form-group">
    <label for="userID">User ID:</label>
    <input type="text" id="userID" name="userID" required value="<?php if (isset($_POST['userID'])) echo $_POST ['userID']; ?>">
  </div>
  <div class="form-group">
    <label for="userPassword">Password:</label>
    <input type="password" id="userPassword" name="userPassword" required value="<?php if (isset($_POST['userPassword'])) echo $_POST ['userPassword']; ?>">
  </div>
  <div class="form-group">
    <button type="submit">Login</button> 
    <button type="reset">Reset</button>
  </div>
  <div class="form-group">
    <label>Don't have an account? <a href="userRegister.php">Sign Up</a></label>
  </div>
</form>
</body>
</html>