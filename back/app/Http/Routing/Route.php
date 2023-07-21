<?php

namespace App\Http\Routing;

use Attribute;

#[Attribute]
class Route
{
    private string $className;
    private string $classMethodName;

    public function __construct(
        public readonly string $path,
        public readonly Method $method,
    )
    {
    }

    public function getClassName(): string
    {
        return $this->className;
    }

    public function setClassName(string $className): void
    {
        $this->className = $className;
    }

    public function getClassMethodName(): string
    {
        return $this->classMethodName;
    }

    public function setClassMethodName(string $classMethodName): void
    {
        $this->classMethodName = $classMethodName;
    }
}