<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>eLeave Management System</title>
</head>

    <?php
	    include("header.php");
	?>

	<h2>Edit Employee Record</h2>

	<?php
		if ((isset($_GET['id'])) && (is_numeric($_GET['id']))) 
		{
            $id = $_GET['id'];

		} elseif ((isset($_POST['id'])) && (is_numeric($_POST['id']))) {
			$id = $_POST['id'];

		} else {
			echo '<p class="error">This page has been access in error</p>';
			exit();
		}
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$error = array();

			if (empty($_POST['usernName'])) {
				$error [] = 'You forgot to enter your name.';

			} else {
			    $n = mysqli_real_escape_string($connect, trim($_POST['usernName']));
			}

			if (empty($_POST['userPhoneNo'])) {
				$error [] = 'You forgot to enter your phone number.';
			} else {
			    $ph = mysqli_real_escape_string($connect, trim($_POST['userPhoneNo']));
			}

			if (empty($_POST['userEmail'])) {
				$error [] = 'You forgot to enter your email.';
			} else {
			    $e = mysqli_real_escape_string($connect, trim($_POST['userEmail']));
			}

            if (empty($_POST['userAddress'])) {
				$error [] = 'You forgot to enter your address.';
			} else {
			    $ad = mysqli_real_escape_string($connect, trim($_POST['userAddress']));
			}

			if (empty($error)) {
				$q = "SELECT userID FROM user WHERE userName = '$n' AND userID != $id";
				$result = @mysqli_query($connect, $q);
			
				if (mysqli_num_rows($result) == 0) {

					$q = "UPDATE user SET userName = '$n', userPhoneNo = '$ph', userEmail = '$e', WHERE userID = '$id' LIMIT 1";
					$result = @mysqli_query($connect, $q);
					
					if (mysqli_effected_rows($connect == 1)) {
						echo '<script>alert("The user has been edited");window.location.href="userList.php";</script>';
					} else {
						echo '<p class="error">The user has not been edited due to system error. We apologize for any inconvenience.</p>';
						echo "<p>".mysli_error($connect)."<br/>query:".$q."</p>";
					}
				} else {
					echo '<p class="error">The ID has been registered.</p>';
				}
			} else {
				echo '<p class="error">The following error(s) has occured. <br/></p>';
				
				foreach ($error as $msg) {
					echo "-msg<br>\n";
				}
			echo '<p><p>Please try again.<p>';
		}
		}
		$q = "SELECT userName, userPhoneNo, userEmail, userAddress, userPosition, userTotalLeave FROM user WHERE userID = $id";
		$result = @mysqli_query($connect, $q);
		if (mysqli_num_rows($result) == 1) {
			$row = mysqli_fetch_array($result, MYSQLI_NUM);
			echo
			'<form action="userUpdate.php" method="post">
			<p>
				<label class="label" for="userName">user Name*:</label>
				<input type="text" id="userName" name="userName" size="30" maxlength="50" value="'.$row[0].'">
			</p>
            
			<p><br>
				<label class="label" for="userPhoneNo">Phone No.*:</label>
				<input type="tel" pattern="^(?:\+?6?01\d{1}-?(\d{3}|\d{2})-?\d{4})$" id="userPhoneNo" name="userPhoneNo" size="15" maxlength="20" value="'.$row[1].'">
			</p>

			<p><br>
				<label class="label" for="userEmail">user Email*:</label>
				<input type="email" pattern="[a-z0-9._%-]+@[a-z0-9.-]+\.[a-z]{2,}$" id="userEmail" name="userEmail" size="30" maxlength="50" required value="'.$row[2].'">
			</p>

            <p><br>
				<label class="label" for="userAddress">Employee Address:</label>
				<input type="text" id="userAddress" name="userAddress" size="30" maxlength="50" value="'.$row[3].'"></textarea>
			</p>

            <p><br>
                <label class="label" for="userPosition">User Position:</label>
                <select name="userPosition" id="userPosition">
                	<option value="Permanent">Permanent</option>
                	<option value="Contract">Contract</option>
                	<option value="Temporary">Temporary</option>
				</select>
            </p>

            <p><br>
                <label class="label" for="userTotalLeave">Total leave:</label>
			    <input type="text" id="userTotalLeave" name="userTotalLeave" size="30" maxlength="50" value="'.$row[5].'">
			</p>

			<br><p><input id="submit" type="submit" name="submit" value="Update"></p>
            <br><input type="hidden" name="id" value="'.$id.'"/>
            </a>
			</form>';
		} else {
			echo '<p class="error">This page has been access in error.</p>';
		}

		mysqli_close($connect);
        
	?>
</body>
</html>