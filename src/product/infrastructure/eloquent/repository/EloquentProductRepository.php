<?php

namespace Src\Product\Infrastructure\Eloquent\Repository;

use Illuminate\Database\Eloquent\Model;
use Src\Product\Domain\Repository\ProductRepository;
use Src\Product\Domain\Entity\Product;

class EloquentProductRepository implements ProductRepository
{
    protected Model $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * @return Product[]
     */
    public function find(int $id): array
    {
        return $this->model
            ->where('id', $id)
            ->get()
            ->map(function ($product) {
                return new Product(
                    $product->id,
                    $product->name,
                    $product->slug
                );
            })
            ->toArray();
    }

    public function save(Product $product): void
    {
        $this->model->updateOrCreate(
            ['id' => $product->id],
            [
                'name' => $product->name,
                'slug' => $product->slug
            ]
        );
    }
}
