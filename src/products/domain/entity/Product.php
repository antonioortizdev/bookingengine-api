<?php

namespace Src\Product\Domain\Entity;

class Product {
    public function __construct(
        private string $name,
        private string $slug
    ) {}
}
