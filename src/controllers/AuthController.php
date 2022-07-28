<?php

namespace Controllers;

use Core\Application;
use Core\Controller;
use Core\Request;
use Models\LoginForm;
use Models\User;

class AuthController extends Controller{

    public function loginPage(){
        return $this->render("login");
    }

    public function loginHandler(Request $request){
        $loginForm = new LoginForm();
        $loginForm->loadData($request->getBody());

        if($loginForm->validate() && $loginForm->login()){
            Application::$app->session->setFlash("success", "you are logged in succesfully");
            return Application::$app->response->redirect("/");
        }

        return $this->render("login", ["user" => $loginForm]);
    }

    public function registerPage(){
        return $this->render("register");
    }

    public function registerHandler(Request $request){
        $userModel = new User();
        $userModel->loadData($request->getBody());

        if($userModel->validate() && $userModel->save()){
            Application::$app->session->setFlash("success", "thanks for registering");
            return Application::$app->response->redirect("/");
        }

       // echo "<pre>";
       // var_dump($userModel->errors);
       // echo "<pre>";

        return $this->render("register", ["user" => $userModel]);
    }

}