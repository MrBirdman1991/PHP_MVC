<?php

namespace Core;

class Controller{
    public function render($view, $params = []){
        return Application::$app->router->renderView($view, $params);
    }
}