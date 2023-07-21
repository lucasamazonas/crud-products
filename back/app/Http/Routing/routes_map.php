<?php

use App\Http\Routing\Route;

$files = glob(__DIR__ . '/../../Controller/*.php');
$nameSpace = 'App\Controller\\';

$routes = [];

foreach ($files as $file) {
    $fileName = $nameSpace . basename(pathinfo($file, PATHINFO_FILENAME));
    $reflectionClass = new ReflectionClass($fileName);

    foreach ($reflectionClass->getMethods() as $method) {
        $reflectionMethod = new ReflectionMethod($method->class, $method->getName());

        foreach ($reflectionMethod->getAttributes() as $attribute) {
            $instance = $attribute->newInstance();
            if (! $instance instanceof Route) continue;

            $instance->setClassName($method->class);
            $instance->setClassMethodName($method->getName());
            $routes[] = $instance;
        };
    }
}

return $routes;