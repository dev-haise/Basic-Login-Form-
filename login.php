<?php

session_start();

include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = $_POST['username'];
    $password_input = $_POST['password'];


    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ? ");
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    if ($user && password_verify($password_input, $user['password'])) {
        $_SESSION['username'] = $user['username'];
        $_SESSION['loggedin'] = true;
        header("Location: home.php");
        exit();
    } else {
        echo "<a href='login.html'>Invalid Login!, Click this link to login again </a>";
    }
}
