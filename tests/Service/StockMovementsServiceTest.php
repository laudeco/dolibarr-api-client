<?php

namespace Dolibarr\Client\Tests\Service;

use Dolibarr\Client\Domain\StockMovement\StockMovement;
use Dolibarr\Client\Domain\StockMovement\StockMovementId;
use Dolibarr\Client\Service\StockMovementsService;

/**
 * @package Dolibarr\Client\Tests\Service
 */
final class StockMovementsServiceTest extends ServiceTest
{

    /**
     * @var StockMovementsService
     */
    private $service;

    /**
     * Setup the service.
     */
    protected function setUp()
    {
        parent::setUp();
        $this->service = new StockMovementsService($this->mockClient(), $this->serializer());
    }


    /**
     * @test
     */
    public function create_WithData_ValidPayload()
    {
        $this->mockClient()
            ->expects($this->once())
            ->method("post")
            ->with("stockmovements", $this->getExpectedPayload('Stockmovements/create'))
            ->willReturn($this->buildResponse('Stockmovements/create'));

        $stockMovement = new StockMovement();
        $stockMovement->setInventoryCode('123456');
        $stockMovement->setQuantity(10);
        $stockMovement->setProductId(1);
        $stockMovement->setWarehouseId(2);
        $stockMovement->setLabel('My label');
        $stockMovement->setLot('9887');

        $id = $this->service->create($stockMovement);

        $this->assertInstanceOf(StockMovementId::class, $id);
        $this->assertEquals(4, $id->getId());
    }
}
