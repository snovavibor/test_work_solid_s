<?php


class Route {

    protected $routes = [];
    protected $param = [];

    public function __construct()
    {
        
        $this->routes = require_once __DIR__.'../../Lib/routes.php';
        
    }

    
    public function match()
    {
        $url = trim($_SERVER['REQUEST_URI'],'/');
        foreach($this->routes as $rout=>$param){
            if($rout == $url){
                $this->param = $param;
               return true;
            }
        }
        return false;
        
    }

    public function run()
    {
        if($this->match()){
            
            $nameController = ucfirst($this->param['controller']).'Controller';
            $action = $this->param['action'];

            $controller = new $nameController();
            $controller->$action();

        }else{
            echo '404 not found';
        }
    }
}