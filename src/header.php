<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database Connection</title>
</head>
<body>
    <?php
    // Connect to server
    $connect = mysqli_connect("localhost", "root", "", "eleave");
    
    if (!$connect) {
        die ('ERROR:' .mysqli_connect_error());
    }
    ?>
</body>
</html>