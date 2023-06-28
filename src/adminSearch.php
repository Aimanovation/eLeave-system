<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>eLeave Management System</title>
</head>
<body>
    <?php
        include ("header.php");
    ?>
    <form action="adminFound.php" method="POST">

        <h2>Search Admin Record</h2>
    <p>
        <label for="adminName" class="label">Admin Name:</label>
        <input type="text" id="adminName" name="adminName" size="30" maxlength="50" value="<?php if (isset($_POST['adminName'])) echo $_POST['adminName']; ?>"/>
    </p>
        <button type="text" id="submit" type="submit">Search</button></p>
    </form>
</body>
</html>