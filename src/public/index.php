<?php

require_once __DIR__ . "/../vendor/autoload.php";

use Core\Application;

$root = dirname(__DIR__);

$app = new Application($root);

$app->router->get("/", "home");


$app->router->get("/function", function(){
    return "peng";
});

$app->router->get("/contact", "contact");

$app->run();