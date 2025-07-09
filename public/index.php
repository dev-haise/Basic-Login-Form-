<?php 
require_once "../vendor/autoload.php";

use App\controllers\HomeController;
use App\controllers\LoginController;
use App\controllers\RegisterController;
use App\Router;

$router = new Router();
//login methods
$router->get("/", [LoginController::class, "create"]);
$router->post("/login", [LoginController::class, "store"]);

//register Controller methods
$router->get("/register", [RegisterController::class, "create"]);
$router->post("/register", [RegisterController::class, "store"]);

//homecontroller methods
$router->get('/home', [HomeController::class, 'create']);
$router->get('/logout', [HomeController::class, 'destroy']);

$router->resolve();
?>