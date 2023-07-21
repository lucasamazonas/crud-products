<?php

namespace App\Contract;

interface RequestInterface
{
    public function all(): array;
    public function get(string $field): mixed;
}