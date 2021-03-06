<?php 

namespace Models;

use Core\DbModel;

class User extends DbModel{
    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 1;
    const STATUS_DELETED = 2;

    public string $email;
    public string $password;
    public string $passwordRepeat;
    public int $status = self::STATUS_INACTIVE;

    function rules(): array{
        return [
            "email" => [self::RULE_REQUIRED, self::RULE_EMAIL, [self::RULE_UNIQUE, "class" => self::class]],
            "password" => [self::RULE_REQUIRED, [self::RULE_MIN, "min" => 8], [self::RULE_MAX, "max" => 15]],
            "passwordRepeat" => [self::RULE_REQUIRED, [self::RULE_MIN, "min" => 8], [self::RULE_MAX, "max" => 15], [self::RULE_MATCH, "match" => "password"]]
        ];
    }

    public static function attributes(): array
    {
        return ["email", "password", "status"];
    }

    public static function tableName(): string
    {
        return "users";
    }

    public function save(){
      $this->status = self::STATUS_INACTIVE;  
      $this->password = password_hash($this->password, PASSWORD_DEFAULT);  
      return  parent::save();
    }
}