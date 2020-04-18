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
            header("refresh:1, index-Copy.php");
            echo "<p> New Record Successfully Created </p>";
//        echo "<a href='../create.php'><button type='button'>Back</button></a>";
//        echo "<a href='../index.php'><button type='button'>Home</button></a>";
        } else {
            echo "Error " . $sql . ' ' . $connect->connect_error;
        }

        $connect->close();
    }


    //    its complete to get query

               // $sql = mysqli_query($connect, "SELECT `ID`, `name`, `email`, `token` FROM `info` WHERE 1");
                $sql = mysqli_query($connect, "SELECT * FROM `info` WHERE 1");
                while ($row = mysqli_fetch_array($sql)) {
               { 
    ?>
    <body>
        <div class="container" style="margin-top: 50px;" >
            <div class="row">
                <form action="<?php $_PHP_SELF ?>" method="post"> 
                    <!-- <form action="<?php $_PHP_SELF ?>" method="post"> -->
                    <div class="form-control">
                        <input class="form-control" type="hidden" name="id" value="<?php echo ($row['id']) ?>" />
                        <label>Name</label>
                        <input class="form-control" type="text" name="name" value="<?php echo ($row['name']) ?>" />

                        <label>Email</label>
                        <input class="form-control" type="text" name="email" value="<?php echo ($row['email']) ?>" />
                    </div>
                    <div class="form-control">
                        <button class="submit" type="submit" name="save">Save</button>
                        <button href="update.php" class="submit" type="submit" name="update">Update</button>
                        <button href="delete.php" class="submit" type="submit" name="delete">Delete</button>
                    </div>                    
                </form>
            </div>

        </div>
             <?php    } 
    } 

// END the query that already stor in Database



//Update data from here
                $id=intval($_POST['id']);
                if (isset($_POST['update'])) {
                    $name = $_POST['name'];
                    $email = $_POST['email'];
                    $sql = mysqli_query($connect,"UPDATE info SET name='$name', email='$email' WHERE id='$id'");
                    if ($sql){
                        header("refresh:1, index-Copy.php");
                        echo '<div class="form" id="form3"><br><br><br><br><br><br>
<Span>Data Updated Successfuly......!!</span></div>';
                    } else {
                        echo "Error " . $sql . ' ' . $connect->connect_error;
                    }
  }
//Delete data from here
                $id=intval($_POST['id']);
                if (isset($_POST['delete'])) {
                    $sql = mysqli_query($connect,"DELETE FROM `info` WHERE `info`. id='$id'");
                    if ($sql){
                        header("refresh:1, index-Copy.php");
                        echo '<div class="form" id="form3"><br><br><br><br><br><br>
<Span>Data Deleted Successfuly......!!</span></div>';
                    } else {
                        echo "Error " . $sql . ' ' . $connect->connect_error;
                    }
  }


               $connect->close();
    ?>

        <script src="js/bootstrap.bundle.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/bootstrap.min.js"></script>

    </body>
</html>
