<?php

require_once("../vendor/autoload.php");

$router = new Router();

$router->add(array(
    'name' => 'home',
    'path' => '/^\/$/',
    'action' => [EmpresaController::class, 'IndexAction']));

$router->add(array(
    'name' => 'home',
    'path' => '/^\/empresa\/add$/',
    'action' => [EmpresaController::class, 'AddAction']));

$router->add(array(
    'name' => 'home',
    'path' => '/^\/empresa\/del\/[0-9]+$/',
    'action' => [EmpresaController::class, 'DelAction']));

$router->add(array(
    'name' => 'home',
    'path' => '/^\/empresa\/edit\/[0-9]+$/',
    'action' => [EmpresaController::class, 'EditAction']));
    
$request = $_SERVER['REQUEST_URI'];

$route = $router->match($request);
if ($route) {
    $controllerName = $route['action'][0];
    $actionName = $route['action'][1];
    $controller = new $controllerName;
    $controller->$actionName($request);
} else
    echo "No route";