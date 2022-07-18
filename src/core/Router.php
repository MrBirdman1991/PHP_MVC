<?php

namespace Core;

class Router{
    protected array $routes = [];

    public function get($path, $callback){
        $this->routes["get"][$path] = $callback;
    }

    public function post($path, $callback){
        $this->routes["post"][$path] = $callback;
    }

    public function resolve(){
       $path = Application::$app->request->getPath();
       $method = Application::$app->request->getMethod();
       $callback = $this->routes[$method][$path] ?? false;
       
       if(!$callback){
        Application::$app->response->setStatusCode(404);
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