<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>eLeave Management System</title>
</head>
<style>
    * {
        font-family: Arial;
    }
    table {
        border-collapse: collapse;
        width: 100%;
    }

    th, td {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    th {
        background-color: #4CAF50;
        color: white;
    }

    tr:hover {
        background-color: #f5f5f5;
    }

    .update, .delete {
        display: inline-block;
        padding: 5px 10px;
        background-color: #4CAF50;
        color: white;
        text-decoration: none;
        border-radius: 5px;
    }

    .delete {
        background-color: #f44336;
    }

    .update:hover, .delete:hover {
        background-color: #3e8e41;
    }
</style>

    <?php
        // Call the header file to connect to the server
        include ("header.php");
    ?>

    <h2>List of Employee</h2>

    <?php
        $q = "SELECT userID, userPassword, userName, userPhoneNo, userEmail, userAddress, userPosition, userTotalLeave FROM user ORDER BY userID";

        $result = @mysqli_query ($connect, $q);
        if ($result) {
            echo '<table border="2">
            <tr>
                <td align="center"><strong>ID</strong></td>
                <td align="center"><strong>NAME</strong></td>
                <td align="center"><strong>PHONE NO.</strong></td>
                <td align="center"><strong>EMAIL</strong></td>
                <td align="center"><strong>ADDRESS</strong></td>
                <td align="center"><strong>POSITION</strong></td>
                <td align="center"><strong>TOTAL LEAVE</strong></td>
                <td align="center"><strong>UPDATE</strong></td>
                <td align="center"><strong>DELETE</strong></td>
            </tr>';
            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                echo '<tr>
                    <td>'.$row['userID'].'</td>
                    <td>'.$row['userName'].'</td>
                    <td>'.$row['userPhoneNo'].'</td>
                    <td>'.$row['userEmail'].'</td>
                    <td>'.$row['userAddress'].'</td>
                    <td>'.$row['userPosition'].'</td>
                    <td>'.$row['userTotalLeave'].'</td>
                    <td align="center"><a href="userUpdate.php?id='.$row['userID'].'">Update</td>
                    <td align="center"><a href="userDelete.php?id='.$row['userID'].'">Delete</td>
                </tr>';
        }

        echo '</table>';

        mysqli_free_result ($result);

        } else {
            echo '<p class="error">The current user cannot be retrieved. We apologize for any inconvenience.</p>';

            echo '<p>'.mysqli_error($connect).'<br></br>Query:'.$q.'</p>';
        }

        mysqli_close($connect);
    ?>
</div>
</div>  
</body>
</html>