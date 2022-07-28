<?php

namespace Controllers;

use Core\Application;
use Core\Controller;

class HomeController extends Controller{

    public function homePage(){
        var_dump(Application::$app->session->get("user"));
        return $this->render("home");
    }


}