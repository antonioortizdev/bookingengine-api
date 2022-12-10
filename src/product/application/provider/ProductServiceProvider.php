<?php

namespace Src\Product\Application\Provider;

use Illuminate\Support\ServiceProvider;
use Src\Product\Infrastructure\Eloquent\Repository\EloquentProductRepository;
use Src\Product\Domain\Repository\ProductRepository;

class ProductServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(ProductRepository::class, EloquentProductRepository::class);
    }
}
