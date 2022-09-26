<?php

include "../vendor/autoload.php";

use chatapp\controllers\ChatController;
use chatapp\core\ChatApp;
use chatapp\controllers\HomeController;
use chatapp\controllers\RegisterController;

session_start();
date_default_timezone_set("Europe/Bucharest");


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);







$app = new ChatApp; 

$app->router->get("/", [HomeController::class, 'index']);
$app->router->get("/home", [HomeController::class, 'index']);

$app->router->post("/", [HomeController::class, 'indexPost']);
$app->router->post("/home", [HomeController::class, 'indexPost']);

if(isset($_SESSION['user'])){
    $app->router->get("/connect", [ChatController::class, 'index']);
    $app->router->post("/connect", [ChatController::class, 'indexPost']);
}

$app->router->get("/register", [RegisterController::class, 'index']);
$app->router->post("/register", [RegisterController::class, 'indexPost']);


$app->run();