<?php

namespace Tests\Unit\Product\Infrastructure\Eloquent\Repository;
use PHPUnit\Framework\TestCase;
use Src\Product\Domain\Repository\ProductRepository;
use Src\Product\Domain\ValueObject\ProductId;
use Src\Product\Domain\ValueObject\ProductName;
use Src\Product\Domain\ValueObject\ProductSlug;
use Src\Product\Infrastructure\Eloquent\Repository\EloquentProductRepository;
use Src\Product\Domain\Entity\Product;
use App\Models\Product as ProductModel;

class EloquentProductRepositoryTest extends TestCase
{
    protected $repository;

    public function setUp()
    {
        $this->repository = new EloquentProductRepository();
    }

    public function testImplementsProductRepositoryInterface()
    {
        $this->assertInstanceOf(ProductRepository::class, $this->repository);
    }

    public function testFind()
    {
        $id = '123';
        $name = 'Foo';
        $slug = 'foo-123';

        $filters = [
            'id' => $id
        ];

        $products = $this->repository->find($filters);

        $this->assertInternalType('array', $products);
        $this->assertCount(1, $products);
        $this->assertInstanceOf(Product::class, $products[0]);
        $this->assertEquals($id, (string)$products[0]->id);
        $this->assertEquals($name, (string)$products[0]->name);
        $this->assertEquals($slug, (string)$products[0]->slug);
    }

    public function testSave()
    {
        $id = '3182218d-b7d3-4a55-afaf-76653c2f0f4f';
        $name = 'Foo';
        $slug = 'foo-123';

        $product = new Product(
            new ProductId($id),
            new ProductName($name),
            new ProductSlug($slug)
        );

        $this->repository->save($product);

        $this->assertDatabaseHas('products', [
            'id' => $id,
            'name' => $name,
            'slug' => $slug
        ]);
    }
}

