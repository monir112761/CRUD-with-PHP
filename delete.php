                <?php
                $servername = "Localhost";
                $username = "root";
                $password = "";
                $databasename = "crud";
                $connect = new mysqli($servername, $username, $password, $databasename) or die(mysqli_error($mysqli));


//Update data from here
//                $id = 'id';
                if (isset($_POST['delete'])) {
                    $id = $_POST['id'];
//                    $name = $_POST['name'];
//                    $email = $_POST['email'];
                    $sql1 = "DELETE FROM `info` WHERE `info`.`ID` = $id";
                    if ($connect->query($sql1) === TRUE) {
                        header("refresh:1, index1.php");
                        echo '<div class="form" id="form3"><br><br><br><br><br><br>
<Span>Data deleted Successfuly......!!</span></div>';
//        echo "<a href='../create.php'><button type='button'>Back</button></a>";
//        echo "<a href='../index.php'><button type='button'>Home</button></a>";
                    } else {
                        echo "Error " . $sql1 . ' ' . $connect->connect_error;
                    }
//
//                    echo "<tr><form action='index1.php' method='post'>";
//                    echo"<input class='input' type='hidden' name='id' value='" . $row['id'] . "' />";
//                    echo"<td><input class='input' type='text' name='name' value='" . $row['name'] . "' /></td>";
//                    echo"<td><input class='input' type='text' name='email' value='" . $row['email'] . "' /><t/d>";
//                    echo "<td><input class='submit' type='submit' name='update' value='update' /></td>";
//                    echo "</td>";
//                    echo "</form></tr>";
                }
                $connect->close();
                ?>

<!--
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
                <h2>Update Form</h2>
            </table>
        </div>

        <script src="js/bootstrap.bundle.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/bootstrap.min.js"></script>

    </body>
</html>
-->
