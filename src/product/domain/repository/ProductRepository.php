<?php

namespace Src\Product\Domain\Repository;

use Src\Product\Domain\Entity\Product;

interface ProductRepository {
    /**
     * @return Product[]
     */
    public function find(int $id): array;
    public function save(Product $product): void;
}
