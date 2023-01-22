<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update List</title>
</head>

<body>
    <!-- Get Data => Show => Edit => Update -->

    <?php
    require_once "db_connection.php";
    $id = $_GET['id'];

    $sql = "SELECT * FROM works WHERE id = $id";

    $query = mysqli_query($conn, $sql);

    $data = mysqli_fetch_assoc($query); // get data

    // UPDATE
    if (isset($_POST['updateBtn'])) {
        $idToUpdate = $_POST['taskId'];
        $taskName = $_POST['taskName'];

        $updateSQL = "UPDATE works SET name='$taskName' WHERE id = $idToUpdate";

        if (mysqli_query($conn, $updateSQL)) {
            header('location: read.php');
        } else {
            echo "Update Error..." . mysqli_error($conn);
        }
    }
    ?>
    <a href="read.php">List Page</a> <br><br>
    <form method="POST">
        Tasks
        <input type="hidden" name="taskId" value="<?php echo $data['id'] ?>" required>
        <input type="text" name="taskName" value="<?php echo $data['name']; ?>" required>
        <button type="submit" name="updateBtn">Update</button>
    </form>
</body>

</html>