<?php

namespace Src\Product\Infrastructure\Eloquent\Repository;

use Src\Product\Domain\Repository\ProductRepository;
use Src\Product\Domain\Entity\Product;
use App\Models\Product as ProductModel;

class EloquentProductRepository implements ProductRepository
{
    public function __construct(private ProductModel $productModel) {}

    /**
     * @return Product[]
     */
    public function find(array $filters): array
    {
        return $this->productModel->where($filters)
            ->get()
            ->map(function ($product) {
                return Product::fromPrimitives($product->toArray());
            })
            ->toArray();
    }

    public function save(Product $product): void
    {
        $this->productModel->create(
            [
                'id' => (string)$product->id,
                'name' => (string)$product->name,
                'slug' => (string)$product->slug
            ]
        );
    }
}
