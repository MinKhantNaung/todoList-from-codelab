<?php

require_once "db_connection.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM works WHERE id = $id";

    if (mysqli_query($conn, $sql)) {
        header('location: read.php');
    } else {
        echo "delete Fail" . mysqli_error($conn);
    }
} else {
    header('location: read.php');
}



