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

    <h2>Search Result</h2>

    <?php
        $in = $_POST['adminName'];
        $in = mysqli_real_escape_string($connect, $in);
        
        $q = "SELECT adminID, adminPassword, adminName, adminPhoneNo, adminEmail FROM admin WHERE adminName = '$in' ORDER BY adminID";
        $result = @mysqli_query($connect, $q);

        if ($result) {
            echo '<table border="2">
            <tr>
                <td align="center"><strong>ID</strong></td>
                <td align="center"><strong>NAME</strong></td>
                <td align="center"><strong>PHONE NO.</strong></td>
                <td align="center"><strong>EMAIL</strong></td>
            </tr>';

            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                echo '<tr>
                    <td>'.$row['adminID'].'</td>
                    <td>'.$row['adminName'].'</td>
                    <td>'.$row['adminPhoneNo'].'</td>
                    <td>'.$row['adminEmail'].'</td>
                </tr>';
            }

            echo '</table>';

            mysqli_free_result($result);
        } else {
            echo '<p class="error"> If no record shown, this is because you had an incorrect or missing entry in search form.<br>Click the back or missing entry in search form.<br>Click the back button on the browser and try again.
            </p>';

            echo '<p>'.mysqli_error($connect).'<br><br/>Query:'.$q.'</p>';
        }

        mysqli_close($connect);
    ?>
</div>
</div>    
</body>
</html>