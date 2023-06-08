<?php

require_once("../vendor/autoload.php");

use App\Core\Router;
use App\Controllers\IndexController;
use App\Controllers\EmpresaController;

$router = new Router();

$router->add(array(
    'name' => 'home',
    'path' => '/^\/$/',
    'action' => [IndexController::class, 'IndexAction']));

$router->add(array(
    'name' => 'add',
    'path' => '/^\/empresa\/add$/',
    'action' => [EmpresaController::class, 'AddAction']));

$router->add(array(
    'name' => 'edit',
    'path' => '/^\/empresa\/edit\/\?id=[0-9]+$/',
    'action' => [EmpresaController::class, 'EditAction']));

$router->add(array(
    'name' => 'del',
    'path' => '/^\/empresa\/del\/\?id=[0-9]+$/',
    'action' => [EmpresaController::class, 'DeleteAction']));
    
$request = $_SERVER['REQUEST_URI'];

$route = $router->match($request);
if ($route) {
    $controllerName = $route['action'][0];
    $actionName = $route['action'][1];
    $controller = new $controllerName;
    $controller->$actionName($request);
} else
    echo "No route";