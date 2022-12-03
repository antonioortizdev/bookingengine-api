<?php

namespace Src\Product\Application\UseCase;

use Src\Product\Domain\Entity\Product;
use Src\Product\Domain\Repository\ProductRepository;

class CreateProduct {
    public function __construct(private ProductRepository $productRepository) {}

    public function __invoke(Product $product): void
    {
        $this->productRepository->save($product);
    }
}
