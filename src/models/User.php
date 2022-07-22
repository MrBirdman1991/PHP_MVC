<?php 

namespace Models;

use Core\Model;

class User extends Model{
    public string $email;
    public string $password;

    function rules(): array{
        return [
            "email" => [self::RULE_REQUIRED],
            "password" => [self::RULE_REQUIRED, [self::RULE_MIN, "min" => 8]]
        ];
    }

    public function register(){
        return true;
    }
}