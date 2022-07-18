<?php

require_once __DIR__ . "/../vendor/autoload.php";

use Core\Application;
use Contollers\SiteController;

$controller = new SiteController();
$controller->test();


$root = dirname(__DIR__);

$app = new Application($root);

$app->router->get("/", "home");


$app->router->get("/function", function(){
    return "peng";
});

$app->router->get("/contact", "contact");

$app->router->post("/contact", function () {
    echo "AY CARAMBA!";
});

$app->run();