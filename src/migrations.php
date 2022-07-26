<?php

require_once __DIR__ . "/vendor/autoload.php";


use Core\Application;



$config = [
    "db" => [
        "dsn" => "mysql:host=db;dbname=company1",
        "user" => "root",
        "password" => "php_mvc",

    ]
];



$app = new Application(__DIR__, $config);

$app->db->applyMigrations();