<!DOCTYPE html>
<html>
    <head>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Update the Data From Database</title>
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    </head>
    <?php
    $servername = "Localhost";
    $username = "root";
    $password = "";
    $databasename = "crud";
    $connect = new mysqli($servername, $username, $password, $databasename) or die(mysqli_error($mysqli));
    if (isset($_POST['save'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $sql = "INSERT INTO info (name, email) VALUES ('$name', '$email')";
        if ($connect->query($sql) === TRUE) {
            echo "<p>New Record Successfully Created</p>";
//        echo "<a href='../create.php'><button type='button'>Back</button></a>";
//        echo "<a href='../index.php'><button type='button'>Home</button></a>";
        } else {
            echo "Error " . $sql . ' ' . $connect->connect_error;
        }

        $connect->close();
    }

////For the Insert Data Query
//    if (isset($_POST['save'])) {
//        $name = $_POST['name'];
//        $email = $_POST['email'];
////    $age = $_POST['age'];
//        $sql = "UPDATE info (name, email) VALUES ('$name', '$email')";
//        if ($connect->query($sql) === TRUE) {
//            echo "<p>New Record Successfully Created</p>";
////        echo "<a href='../create.php'><button type='button'>Back</button></a>";
////        echo "<a href='../index.php'><button type='button'>Home</button></a>";
//        } else {
//            echo "Error " . $sql . ' ' . $connect->connect_error;
//        }
//
//        $connect->close();
//    }

    
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
    <body>
        <div class="container" style="margin-top: 50px;" >
            <div class="row">
                <form action="<?php $_PHP_SELF ?>" method="post">
                    <div class="form-control">
                        <label>Name</label>
                        <input class="form-control" type="text" name="name"/>
                        <!--                    </div>
                                            <div class="form-control">-->
                        <label>Email</label>
                        <input class="form-control" type="text" name="email"/>
                    </div>
                    <div class="form-control">
                        <button class="submit" type="submit" name="save">Save</button>
                        <button href="update.php" class="submit" type="submit" name="update">Update</button>
                        <button href="delete.php" class="submit" type="submit" name="delete">Delete</button>
                    </div>                    
                </form>
            </div>

        </div>


        <script src="js/bootstrap.bundle.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/bootstrap.min.js"></script>

    </body>
</html>
