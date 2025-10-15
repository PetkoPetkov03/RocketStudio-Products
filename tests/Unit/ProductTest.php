<?php

namespace Tests\Unit;

use Tests\TestCase;
use Mockery;
use Mockery\MockInterface;
use App\Services\ProductService;

class ProductTest extends TestCase
{
    private $productMock;
    private $productService;

    protected function setUp(): void {
        parent::setUp();

        $this->productMock = Mockery::mock(Product::class);

        $this->productService = new ProductService($this->productMock);
    }
    
    protected function tearDown(): void {
        Mockery::close();
        parent::tearDown();
    }

    /** @test test fetch all products */
    public function fetchAllProductsTest() {
        $mockedProducts = collect([
            (object)['name' => 'Laptop', 'price' => 1000, 'quantity' => 12],
            (object)['name' => 'Phone', 'price' => 500, 'quantity' => 43],
        ]);

        $this->productMock->expects($mockedProducts);

        $result = $this->productService->fetchAllProducts();

        $this->assertEquals($mockedProducts, $result);
    }
}
