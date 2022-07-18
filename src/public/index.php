<?php

require_once __DIR__ . "/../vendor/autoload.php";

use Core\Application;

$app = new Application();

$app->router->get("/", function(){
    return "peng";
});

$app->router->get("/contact", function(){
    echo "contact";
});

$app->run();