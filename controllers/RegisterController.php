<?php 
namespace App\controllers;

use App\Router;
use Exception;

class RegisterController{
    
    public function create(Router $router){
        $router->db->UserSchema();
        $router->view('auth/index.html', [

        ]);
    }
    
    public function store(Router $router){
        $user = [
            'username' => '',
            'password' => ''
        ];
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $user['username'] = $_POST['username'];
            $user['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
        
            $router->db->createUser($user);
        }
    }
}

?>