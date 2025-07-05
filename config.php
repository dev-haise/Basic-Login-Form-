<?php

$localhost = "localhost";
$dbname = "loginfdb";
$username = "root";
$password = "";

try {
    $pdo = new PDO("mysql:host=$localhost;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database Connection failed: " . $e->getMessage());
}
