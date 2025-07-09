<?php 
namespace App\controllers;

use App\Router;
class LoginController{
    
    public function create(Router $router){
        $router->view('auth/login.html', [
        ]);
    }
    
    public function store(Router $router){
        session_start();
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $username = $_POST['username'];
            $password_input = $_POST['password'];
        
        
            $user = $router->db->getUser($username);
        
            if ($user && password_verify($password_input, $user['password'])) {
                $_SESSION['username'] = $user['username'];
                $_SESSION['loggedin'] = true;
                header("Location: /home");
                exit();
            } else {
                echo "<a href='/'>Invalid Login!, Click this link to login again </a>";
            }
        }
    }
}

?>