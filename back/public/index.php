<?php

use App\Helper\Container;
use App\Helper\EntityManagerCreator;
use App\Http\Routing\Route;
use App\Http\JsonResponse;
use App\Repository\ProductRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Mapping\ClassMetadata;

require_once __DIR__ . '/../vendor/autoload.php';


$container = new Container();
$container->register(EntityManagerInterface::class, fn() => EntityManagerCreator::createEntityManager());

$container->register(ClassMetadata::class, function () {

});

$instanceController = $container->resolve(ProductRepository::class);
exit();













/** @var Route[] $routes */
$routes = require_once __DIR__ . '/../app/Http/Routing/routes_map.php';

//header('Access-Control-Allow-Origin: *');
//header('Content-Type: application/json');

$uri = substr($_SERVER['REQUEST_URI'], 1);
$method = $_SERVER['REQUEST_METHOD'];

/**
 * @var Route $route
 * @var Route $item
 */
$route = array_find($routes, fn($item) => $item->path === $uri && $item->method->value === $method);

if (is_null($route)) {
    http_response_code(404);
    exit();
}

$container = new Container();
$instanceController = $container->resolve(ProductRepository::class);

//$instanceController = new ($route->getClassName());

/** @var JsonResponse $jsonResponse */
//$jsonResponse = call_user_func([$instanceController, $route->getClassMethodName()], new Request());
//http_response_code($jsonResponse->getStatus());
//echo json_encode($jsonResponse->getContent());
