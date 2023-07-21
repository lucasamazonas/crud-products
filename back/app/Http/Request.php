<?php

namespace App\Http;

use App\Contract\RequestInterface;

readonly class Request implements RequestInterface
{
    protected array $data;

    public function __construct()
    {
        $this->data = array_merge(
            $_GET,
            $_POST,
            $this->jsonDecode()
        );
    }

    private function jsonDecode(): array
    {
        $content = json_decode(file_get_contents('php://input'), true);

        if (! is_array($content)) {
            return [];
        }

        return $content;
    }

    public function all(): array
    {
        return $this->data;
    }

    public function get(string $field, mixed $default = null): mixed
    {
        return $this->data[$field] ?? $default;
    }
}