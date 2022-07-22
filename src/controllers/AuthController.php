<?php

namespace Controllers;

use Core\Controller;
use Core\Request;

class AuthController extends Controller{

    public function loginPage(){
        return $this->render("login");
    }

    public function loginHandler(Request $request){
        $this->setLayout("authLayout");
        var_dump($request->getBody());
        return $this->render("home");
    }

    public function registerPage(){
        return $this->render("register");
    }

    public function registerHandler(Request $request){
        var_dump($request->getBody());
    }

}