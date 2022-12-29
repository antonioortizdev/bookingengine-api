<?php

namespace Tests\Unit\Product\Domain\Entity;

use PHPUnit\Framework\TestCase;
use Src\Product\Domain\Entity\Product;
use Src\Product\Domain\ValueObject\ProductId;
use Src\Product\Domain\ValueObject\ProductName;
use Src\Product\Domain\ValueObject\ProductSlug;

class ProductTest extends TestCase
{
    /** @test */
    public function test_create_a_product()
    {
        $id = new ProductId('3182218d-b7d3-4a55-afaf-76653c2f0f4f');
        $name = new ProductName('Foo');
        $slug = new ProductSlug('foo-123');

        $product = new Product($id, $name, $slug);

        $this->assertEquals($id, $product->id);
        $this->assertEquals($name, $product->name);
        $this->assertEquals($slug, $product->slug);
    }

    /** @test */
    public function test_create_a_product_from_primitives()
    {
        $primitives = [
            'id' => '3182218d-b7d3-4a55-afaf-76653c2f0f4f',
            'name' => 'Foo',
            'slug' => 'foo-123'
        ];

        $product = Product::fromPrimitives($primitives);

        $this->assertInstanceOf(Product::class, $product);
        $this->assertInstanceOf(ProductId::class, $product->id);
        $this->assertInstanceOf(ProductName::class, $product->name);
        $this->assertInstanceOf(ProductSlug::class, $product->slug);
        $this->assertEquals(new ProductId('3182218d-b7d3-4a55-afaf-76653c2f0f4f'), $product->id);
        $this->assertEquals(new ProductName('Foo'), $product->name);
        $this->assertEquals(new ProductSlug('foo-123'), $product->slug);
    }
}
