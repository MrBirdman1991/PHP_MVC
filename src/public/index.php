<?php

require_once __DIR__ . "/../vendor/autoload.php";

use Core\Application;
use Controllers\ContactController;


$root = dirname(__DIR__);

$app = new Application($root);

$app->router->get("/", "home");


$app->router->get("/function", function(){
    return "peng";
});

$app->router->get("/contact", [ContactController::class, "contactPage"]);

$app->router->post("/contact", [ContactController::class, "handleContact"]);

$app->run();