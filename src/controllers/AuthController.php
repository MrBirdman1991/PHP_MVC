<?php

namespace Controllers;

use Core\Controller;
use Core\Request;
use Models\User;

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
        $userModel = new User();
        $userModel->loadData($request->getBody());

        if($userModel->validate() && $userModel->register()){
            return $this->render("home");
        }

       // echo "<pre>";
       // var_dump($userModel->errors);
       // echo "<pre>";

        return $this->render("register", ["user" => $userModel]);
    }

}