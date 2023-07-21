<?php

namespace App\Controller;

use App\Http\JsonResponse;
use App\Http\Request;
use App\Http\Routing\Method;
use App\Http\Routing\Route;
use App\Repository\ProductRepository;

class ProductController
{
    public function __construct(
        protected ProductRepository $productRepository
    )
    {
    }

    #[Route(path: 'products', method: Method::GET)]
    public function index(Request $request): JsonResponse
    {
        return new JsonResponse(['products' => $this->productRepository->findAll()]);
    }

    #[Route(path: 'products', method: Method::POST)]
    public function store(Request $request): JsonResponse
    {
        return new JsonResponse([1,2,3,4,5]);
    }
}