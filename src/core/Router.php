<?php

namespace Core;

class Router{
    protected array $routes = [];
    public Request $request;

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
         return  "not found";
       }

       if(is_string($callback)){
        return $this->renderView($callback);
       }

       return call_user_func($callback);
    }

    public function renderView($view){
        $layoutContent = $this->layoutContent();
        $viewContent = $this->renderOnlyView($view);
        return str_replace("{{content}}", $viewContent, $layoutContent);
    }

    private function layoutContent(){
        ob_start();
        include_once Application::$ROOT_DIR."/views/layouts/mainLayout.php";
        return ob_get_clean();
    }

    private function renderOnlyView($view){
        ob_start();
        include_once Application::$ROOT_DIR."/views/$view.php";
        return ob_get_clean();
    }
}