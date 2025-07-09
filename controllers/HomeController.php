<?php 
namespace App\controllers;

use App\Router;
class HomeController{
    public function create(Router $router){
        session_start();

        if (!isset($_SESSION['username'])) {
            header("Location: /");
            exit();
        }

        $router->view("home.php", []);
    }
    public function destroy(){
        session_start();
        session_unset();
        session_destroy();

        header("Location: /");
        exit();
    }
}

?>