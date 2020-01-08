<?php

namespace Dolibarr\Client\Tests\Service;

use Dolibarr\Client\Domain\Product\Product;
use Dolibarr\Client\Domain\Product\ProductId;
use Dolibarr\Client\Service\ProductsService;

/**
 * @package Dolibarr\Client\Tests\Service
 */
final class ProductsServiceTest extends ServiceTest
{
    /**
     * @var ProductsService()
     */
    private $service;

    /**
     * Setup the service.
     */
    protected function setUp()
    {
        parent::setUp();
        $this->service = new ProductsService($this->mockClient(), $this->serializer());
    }
    /**
     * @test
     */
    public function getById_WithValidId_ValidResponse()
    {
        $this->mockClient()
            ->expects($this->once())
            ->method('get')
            ->with('products/121')
            ->willReturn($this->buildResponse('Products/getById'));

        $product = $this->service->getById(new ProductId(121));

        $this->assertInstanceOf(Product::class, $product);

        $this->assertEquals('test', $product->getLabel());
        $this->assertEquals(121, $product->getId());
        $this->assertEquals('86768795768484', $product->getBarcode());
    }
}
