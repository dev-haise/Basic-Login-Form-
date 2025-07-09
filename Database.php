<?php 
namespace App;

use PDO;
use PDOException;
use Exception;

class Database{
    public \PDO $pdo;
    public static Database $db;
    public function __construct(){
        $localhost = "localhost";
        $dbname = "loginfdb";
        $username = "root";
        $password = "";
        
        $this->pdo = new PDO("mysql:host=$localhost;dbname=$dbname", $username, $password);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        self::$db = $this;
    }

    public function UserSchema(){
        try{
            $sql = "CREATE TABLE IF NOT EXISTS users (
                id INT(11) AUTO_INCREMENT PRIMARY KEY,
                username VARCHAR(50) NOT NULL UNIQUE,
                password VARCHAR(255) NOT NULL,
                email VARCHAR(100) UNIQUE,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            )";
            $statement = $this->pdo->prepare($sql);
            $statement->execute();
        }catch(Exception $e){
            echo "UserSchema error: " . $e->getMessage();
        }
    }
    public function createUser($data){
        try{
            $stmt = $this->pdo->prepare("INSERT INTO users(username,password) VALUES(?,?)");
            $stmt->bindValue(1, $data['username']);
            $stmt->bindValue(1, $data['password']);
            $stmt->execute([$data['username'], $data['password']]);
            echo "<h3 style='color:green;'> Registraion successful !</h3> <h3><a href='/'>Login here</a></h3>";
            header("Refresh: 3s, url=/");
        }catch(PDOException $e){
            if ($e->errorInfo[1] == 1062) {
                echo "<h3 style='color:red;'>Username already exists. <a href='/register'>Try again</a></h3>";
            } else {
                echo "Error: " . $e->getMessage();
            }
        }
    }
    public function getUser($username){
        try{
            $stmt = $this->pdo->prepare("SELECT * FROM users WHERE username = ? ");
            $stmt->execute([$username]);
            $user = $stmt->fetch();
            return $user;
        }catch(Exception $e){
            echo "Get User Error: " . $e->getMessage();
        }
    }
}

?>