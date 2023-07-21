<?php

namespace App\Helper;

use ReflectionClass;
use ReflectionException;
use ReflectionNamedType;

class Container
{
    protected array $dependencies = [];

    public function register($interface, $implementation): void
    {
        $this->dependencies[$interface] = $implementation;
    }

    /**
     * @throws ReflectionException
     */
    public function resolve($className): mixed
    {
        $reflectionClass = new ReflectionClass($className);

        if (! $reflectionClass->hasMethod('__construct')) {
            return $reflectionClass->newInstance();
        }

        $params = $reflectionClass->getConstructor()->getParameters();
        $dependencies = [];

        foreach ($params as $param) {
            if (is_null($param->getType()) || $param->isOptional() || $param->getType()->isBuiltin()) continue;

            $paramClassName = $param->getType()->getName();

            if (! isset($this->dependencies[$paramClassName])) {
                $dependencies[] = $this->resolve($paramClassName);
            }

            $dependencies[] = is_callable($this->dependencies[$paramClassName])
                ? call_user_func($this->dependencies[$paramClassName])
                : $this->resolve($this->dependencies[$paramClassName]);

            var_dump($dependencies);
        }

        return $reflectionClass->newInstanceArgs($dependencies);
    }
}
