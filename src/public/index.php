<?php

require_once __DIR__ . "/../vendor/autoload.php";

use Controllers\AuthController;
use Core\Application;
use Controllers\ContactController;
use Controllers\HomeController;




$config = [
    "db" => [
        "dsn" => "mysql:host=db;",
        "dbName" => "my_first_mvc",
        "user" => "root",
        "password" => "php_mvc",

    ]
];

$root = dirname(__DIR__);

$app = new Application($root, $config);

$app->router->get("/", [HomeController::class, "homePage"]);


$app->router->get("/function", function(){
    return "peng";
});

$app->router->get("/contact", [ContactController::class, "contactPage"]);

$app->router->post("/contact", [ContactController::class, "handleContact"]);

$app->router->get("/register", [AuthController::class, "registerPage"]);
$app->router->post("/register", [AuthController::class, "registerHandler"]);

$app->router->get("/login", [AuthController::class, "loginPage"]);
$app->router->post("/login", [AuthController::class, "loginHandler"]);



$app->run();