<?php

namespace Core;

class Router{
    protected array $routes = [];
    private Request $request;

    public function __construct($request){
        $this->request = $request;
    }

    public function get($path, $callback){
        $this->routes["get"][$path] = $callback;
    }

    public function post($path, $callback){
        $this->routes["post"][$path] = $callback;
    }

    public function resolve(){
       $path = $this->request->getPath();
       $method = $this->request->getMethod();
       $callback = $this->routes[$method][$path] ?? false;
       
       if(!$callback){
         echo "not found";
         return;
       }

       echo call_user_func($callback);
    }
}