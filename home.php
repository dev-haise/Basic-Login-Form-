<?php

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.html");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

    <style>
        body {
            font-family: sans-serif;


        }



        .logout-container {
            width: 100%;
            display: flex;
            justify-content: flex-end;
            padding: 20px;
            margin-top: auto;
        }
    </style>
</head>

<body>
    <div class="container mt-5">



        <h2 class="text-center mb-3 text-primary">Welcome from Home Page,
            <?php echo htmlspecialchars($_SESSION['username']); ?>! </h2>



        <div class="logout-container">
            <a href="logout.php" class="btn btn-danger">Log out </a>
        </div>

    </div>
</body>

</html>