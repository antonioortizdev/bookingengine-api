<?php

namespace Src\Product\Domain\Entity;

use Src\Product\Domain\ValueObject\ProductId;
use Src\Product\Domain\ValueObject\ProductName;
use Src\Product\Domain\ValueObject\ProductSlug;

class Product
{
    public function __construct(
        public ProductId $id,
        public ProductName $name,
        public ProductSlug $slug
    ) {}

    public static function fromPrimitives(array $primitives): Product
    {
        return new Product(
            new ProductId($primitives['id']),
            new ProductName($primitives['name']),
            new ProductSlug($primitives['slug'])
        );
    }
}
