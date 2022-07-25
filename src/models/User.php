<?php 

namespace Models;

use Core\Model;

class User extends Model{
    public string $email;
    public string $password;
    public string $passwordRepeat;

    function rules(): array{
        return [
            "email" => [self::RULE_REQUIRED, self::RULE_EMAIL],
            "password" => [self::RULE_REQUIRED, [self::RULE_MIN, "min" => 8], [self::RULE_MAX, "max" => 15]],
            "passwordRepeat" => [self::RULE_REQUIRED, [self::RULE_MIN, "min" => 8], [self::RULE_MAX, "max" => 15], [self::RULE_MATCH, "match" => "password"]]
        ];
    }

    public function register(){
        return true;
    }
}