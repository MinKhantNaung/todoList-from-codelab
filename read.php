<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Read PHP</title>
</head>

<body>
    <h1>Tasks List</h1>
    <a href="create.php">Create Page</a> <br><br>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Date</th>
                <th></th>
            </tr>
        </thead>
        <tbody>

            <?php

            require_once "db_connection.php";

            $sql = "SELECT * FROM works";
            $query = mysqli_query($conn, $sql);

            // echo "<pre>";
            // var_dump(mysqli_fetch_assoc($query));

            $totalRow = mysqli_num_rows($query); // 7

            while ($row = mysqli_fetch_assoc($query)) {

                $time = date('d-M-Y G:ia', strtotime($row['created_at']));
                echo "
                <tr>
                    <td>{$row['id']}</td>
                    <td>{$row['name']}</td>
                    <td>$time</td>
                    <td>
                        <a href='update.php?id={$row['id']}'>Update</a> |
                        <a href='delete.php?id={$row['id']}' >Delete</a>
                    </td>
                </tr>";
            }
            ?>
        </tbody>
    </table>
</body>

</html>