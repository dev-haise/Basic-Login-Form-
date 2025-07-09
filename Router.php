<?php 

namespace App;

use App\Database;
class Router{
    public array $getRoutes = [];
    public array $postRoutes = [];

    public Database $db;

    public function __construct(){
        $this->db = new Database();
    }

    public function get($url, $fn){
        $this->getRoutes[$url] = $fn;
    }
    public function post($url, $fn){
        $this->postRoutes[$url] = $fn;
    }

    public function resolve(){
        $currentUrl = $_SERVER['REQUEST_URI'] ?? null;
        if(strpos($currentUrl, '?') !== false){
            $currentUrl = substr($currentUrl, 0, strpos($currentUrl, '?'));
        }
        $method = $_SERVER['REQUEST_METHOD'] ?? null;
        if($method === 'GET'){
            $fn = $this->getRoutes[$currentUrl] ?? null;
        }else{
            $fn = $this->postRoutes[$currentUrl] ?? null;
        }
        if($fn){
            if(is_array($fn)){
                $controller = new $fn[0]();
                $method = $fn[1] ?? null;

                call_user_func([$controller, $method], $this);
            }else{
                call_user_func($fn, $this);
            }
        }else{
            echo "page is not found!!";
        }
    }

    public function view($url, $params = []){
        foreach($params as $k => $v){
            $$k = $v;
        }
        ob_start();
        include_once __DIR__."/view/$url";
        return ob_get_contents();
    }
}


?>