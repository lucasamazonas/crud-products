<?php

namespace App\Http;

readonly class JsonResponse
{
    public function __construct(
        private array $content,
        private int   $status = 200,
    )
    {
    }

    public function getContent(): array
    {
        return $this->content;
    }

    public function getStatus(): int
    {
        return $this->status;
    }
}