<?php

namespace Src\Product\Infrastructure\Eloquent\Repository;

use Src\Product\Domain\Entity\Product;
use Src\Product\Domain\Repository\ProductRepository;

class EloquentRepository implements ProductRepository {
    /**
     * @return Product[]
     */
    public function find(int $id): array {

    }

    public function save(Product $product): void {

    }
}
