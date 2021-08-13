<?php

if (isset($_POST['create'])) {
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

    $user_data = 'task=' .$task. '&description=' .$description;

    if (empty($task)) {
        header("Location: welcome.php?error=Task is required!&$user_data");
    } else if (empty($description)) {
        header("Location: welcome.php?error=Description is required!&$user_data");
    } else {
        $sql = "INSERT INTO users(task, description) 
                VALUES('$task', '$description')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            header("Location: read.php?success=Successfully Created!");
        } else {
            header("Location: welcome.php?error=Unknown Error Occurred&$user_data");
        }
    }
}
