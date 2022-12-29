<?php

namespace Src\Product\Domain\Repository;

use Src\Product\Domain\Entity\Product;

interface ProductRepository {
    /**
     * @return Product[]
     */
    public function find(array $filters): array;
    public function save(Product $product): void;
}
