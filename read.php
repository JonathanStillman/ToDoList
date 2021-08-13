<?php
include "table.php";
session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: index.php");
}

// echo $_SESSION["user_id"];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CDN From jsDelivr -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    <!-- CSS Styling -->
    <link rel="stylesheet" href="style.css" />
    <title>Todo List Application: Read</title>
</head>

<body>
    <!-- Navigation Bar W/ Logout Button / User ID-->
    <nav class="navbar navbar-dark bg-primary">
        <div class="container-fluid">
            <h3 style="color: white;">Welcome Back! User ID # <?php echo $_SESSION["user_id"]; ?> !</h3>
            <form class="d-flex">
                <button type="submit" class="btn" name="signup" style="color: white;"><a style="text-decoration: none; color: white;" href="logout.php">Logout</a></button>
            </form>
        </div>
    </nav>

    <div>
        <h1 class="display-4 text-center">YOUR TASKS</h1>
        <hr>
        <?php if (isset($_GET['success'])) { ?>
            <div class="alert alert-success" role="alert">
                <?php echo $_GET['success']; ?>
            </div>
        <?php } ?>
        <?php if (mysqli_num_rows($result)) { ?>
            <!-- Task Table Begins Here -->
            <table class="table table-striped">
                <thread>
                    <tr>
                        <th scope="col"># :</th>
                        <th scope="col">Task:</th>
                        <th scope="col">Description:</th>
                        <th scope="col">Action:</th>
                    </tr>
                </thread>
                <tbody>
                    <?php
                    $i = 0;
                    while ($rows = mysqli_fetch_assoc($result)) {
                        $i++;
                    ?>
                        <tr>
                            <th scope="row"><?= $i ?></th>
                            <td><?= $rows['task'] ?></td>
                            <td><?php echo $rows['description']; ?></td>
                            <td>
                                <a href="update.php?id=<?=$rows['id']?>" class="btn btn-success" style="padding-top: 12px; background-color: #70E47A;">Update</a>

                                <a href="delete.php?id=<?=$rows['id']?>" class="btn btn-danger" style="padding-top: 12px; background-color: #EE9595;">Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        <?php } ?>
        <div class="link-right" style="display: flex; justify-content: flex-end; padding-right: 20px;">
            <a href="welcome.php" link-primary style="text-decoration: none;"">Create +</a>
        </div>
    </div>

</body>

</html>