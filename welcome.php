<?php

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
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
  <title>Todo List Application: Welcome</title>
</head>

<body>
  <!-- Navigation Bar W/ Logout Button / User ID-->
  <nav class="navbar navbar-dark bg-primary">
    <div class="container-fluid">
      <h3 style="color: white;">Welcome Back! User ID # <?php echo $_SESSION["user_id"]; ?> !</h3>
      <form class="d-flex">
        <button  type="submit" class="btn" name="signup" style="color: white;"><a style="text-decoration: none; color: white;" href="logout.php">Logout</a></button>
      </form>
    </div>
  </nav>

  <!-- Todo List Form -->
  <form action="create.php" method="post">
    <br>
    <h1 class="display-4 text-center">MY TODO LIST</h1>
    <hr><br>
    <!-- Error Alert Pops Up If Task / Description Not Filled Out -->
    <?php if (isset($_GET['error'])) { ?>
    <div class="alert alert-danger" role="alert">
      <?php echo $_GET['error']; ?>
    </div>
    <?php } ?>
    
    
    <div class="mb-3">
      <label for="task" class="form-label">Task:</label>
      <input type="task" class="form-control" id="task" name="task" style="width: 400px;" value="<?php if(isset($_GET['task'])) echo($_GET['task']); ?>" placeholder="Enter A Task ...">
    </div>

    <div class="mb-3">
      <label for="description" class="form-label">Description:</label>
      <input type="description" class="form-control" id="description" name="description" style="width: 400px;" value="<?php if(isset($_GET['description'])) echo($_GET['description']); ?>" placeholder="Enter A Description ...">
    </div>

    <!-- Create Task Button -->
    <button type="submit" class="btn btn-primary" name="create">Create</button>
    <a href="read.php" link-primary style="text-decoration: none;"">View +</a>
  </form>

</body>

</html>