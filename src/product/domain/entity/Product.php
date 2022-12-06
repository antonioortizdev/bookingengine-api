<?php

namespace Src\Product\Domain\Entity;

class Product {
    public function __construct(
        public readonly int $id,
        public string $name,
        public string $slug
    ) {}
}
