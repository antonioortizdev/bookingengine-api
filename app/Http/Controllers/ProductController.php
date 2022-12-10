<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Src\Product\Application\UseCase\SaveProduct;
use Src\Product\Domain\Entity\Product;
use Src\Product\Domain\Repository\ProductRepository;
use Symfony\Component\HttpFoundation\JsonResponse;

class ProductController {
    public function __construct(
        private ProductRepository $productRepository,
        private SaveProduct $saveProduct,
    ) {}

    public function store(StoreProductRequest $request): JsonResponse
    {
        $product = Product::fromPrimitives($request->all());
        ($this->saveProduct)($product);

        return new JsonResponse(['id' => $product->id]);
    }
}
