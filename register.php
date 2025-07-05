<?php

include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);



    $stmt = $pdo->prepare("INSERT INTO users(username,password) VALUES(?,?)");
    $stmt->bindValue(1, $username);
    $stmt->bindValue(1, $password);


    try {
        $stmt->execute([$username, $password]);
        echo "<h3 style='color:green;'> Registraion successful !</h3> <h3><a href='login.html'>Login here</a></h3>";
    } catch (PDOException $e) {
        if ($e->errorInfo[1] == 1062) {
            echo "<h3 style='color:red;'>Username already exists. <a href='index.html'>Try again</a></h3>";
        } else {
            echo "Error: " . $e->getMessage();
        }
    }
}
