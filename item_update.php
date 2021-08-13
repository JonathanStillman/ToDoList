<?php

if (isset($_GET['id'])) {
    include "db_conn.php";

    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $id = validate($_GET['id']);

    $sql = "SELECT * FROM users WHERE id=$id";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    } else {
        header("Location: read.php");
    }
} else if (isset($_POST['update'])) {
    include "db_conn.php";
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $task = validate($_POST['task']);
    $description = validate($_POST['description']);
    $id = validate($_POST['id']);

    if (empty($task)) {
        header("Location: update.php?id=$id&error=Task is required!");
    } else if (empty($description)) {
        header("Location: update.php?id=$id&error=Description is required!");
    } else {
        $sql = "UPDATE users
                SET task='$task', description='$description'
                WHERE id=$id ";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            header("Location: read.php?success=Successfully Updated!");
        } else {
            header("Location: update.php?id=$id&error=Unknown Error Occurred&$user_data");
        }
    }
} else {
    header("Location: read.php");
}
