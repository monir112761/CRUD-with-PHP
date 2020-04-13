<!DOCTYPE html>
<html>
    <head>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Update the Data From Database</title>
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div class="container" style="margin-top: 50px;">
            <table>
                <h2 class="col">Update Form</h2>
                <?php
                $servername = "Localhost";
                $username = "root";
                $password = "";
                $databasename = "crud";
                $connect = new mysqli($servername, $username, $password, $databasename) or die(mysqli_error($mysqli));


//    its complete to get query
//                $sql = mysqli_query($connect, "select * from `info`");
                $sql = mysqli_query($connect, "SELECT `ID`, `name`, `email`, `token` FROM `info` WHERE 1");
                while ($row = mysqli_fetch_array($sql)) {
                    echo "<tr><form action='delete.php' method='post'>";
                    echo"<td><input class='input' type='hidden' name='id' value='" . $row['id'] . "' /></td>";
                    echo"<td><input class='input' type='text' name='name' value='" . $row['name'] . "' /></td>";
                    echo"<td><input class='input' type='text' name='email' value='" . $row['email'] . "' /><t/d>";
                    echo "<td><input class='btn btn-warning' type='submit' name='update' value='update' /></td>";
                    echo "<td><input class='btn btn-danger' type='submit' name='delate' value='delate' /></td>";
                    echo "</td>";
                    echo "</form></tr>";
                }
                ?>
            </table>
        </div>
        <script src="js/bootstrap.bundle.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/bootstrap.min.js"></script>

    </body>
</html>
