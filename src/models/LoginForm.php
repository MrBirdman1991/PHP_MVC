<?php

namespace Models;

use Core\Application;
use \Core\Model;

class LoginForm extends Model
{
    public string $email = '';
    public string $password = '';

    public function rules(): array
    {
        return [
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL],
            'password' => [self::RULE_REQUIRED],
        ];
    }

    

    public function login(){
     $user = User::findOne(["email" => $this->email]);   
     if(!$user){
        $this->addError("email", self::RULE_AUTH_ERROR);
        return false;
     }
     if (!password_verify($this->password, $user->password)) {
        $this->addError("password", self::RULE_AUTH_ERROR);
        return false;
    }
    $value = [
        "id" => $user->id,
        "email" => $user->email
    ];
    Application::$app->session->set('user', $value);
    return true;
    }

    public function logout(){
        Application::$app->session->remove('user');
    }
}