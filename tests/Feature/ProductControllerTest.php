<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Request;
use Src\Product\Application\UseCase\SaveProduct;
use Src\Product\Domain\Repository\ProductRepository;
use Src\Product\Domain\Entity\Product;
use Src\Product\Application\Http\Controller\ProductController;

class ProductControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_a_product()
    {
        $productRepository = $this->createMock(ProductRepository::class);
        $saveProduct = new SaveProduct($productRepository);
        $productController = new ProductController($productRepository, $saveProduct);

        $request = new Request([
            'name' => 'Test Product',
            'slug' => 'test-product'
        ]);

        $response = $productController->create($request);

        $this->assertEquals(201, $response->getStatusCode());
        $this->assertJson(json_encode([
            'id' => 1
        ]));
    }
}
