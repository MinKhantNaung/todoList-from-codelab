<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create PHP</title>
</head>

<body>
    <h1>Todo List</h1>
    <a href="read.php">List Page</a> <br><br>

    <!-- INSERT INTO table_name (field1) VALUES ('value') -->

    <form action="" method="POST">
        <label for="task">Your Tasks</label>
        <input type="text" name="taskName" id="task" placeholder="Enter your tasks...." required>
        <button type="submit" name="addBtn">Add</button>
    </form>

    <?php
    require_once "db_connection.php";
    if (isset($_POST['addBtn'])) {
        $taskName = $_POST['taskName'];

        $sql = "INSERT INTO works (name) VALUES ('$taskName')";

        if (mysqli_query($conn, $sql)) {
            header('location: read.php');
        } else {
            echo 'Insert Fail..' . mysqli_error($conn);
        }
    }

    ?>
</body>

</html>