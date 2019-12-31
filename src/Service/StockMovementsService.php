<?php

namespace Dolibarr\Client\Service;

use Doctrine\Common\Collections\ArrayCollection;
use Dolibarr\Client\Domain\Product\ProductId;
use Dolibarr\Client\Domain\Resource\ApiResource;
use Dolibarr\Client\Domain\StockMovement\StockMovement;
use Dolibarr\Client\Domain\StockMovement\StockMovementId;
use Dolibarr\Client\Domain\Warehouse\WarehouseId;
use Dolibarr\Client\Exception\ApiException;
use Dolibarr\Client\HttpClient\HttpClientInterface;
use JMS\Serializer\SerializerInterface;

/**
 * @author Laurent De Coninck <lau.deconinck@gmail.com>
 */
final class StockMovementsService extends AbstractService
{

    /**
     * @param HttpClientInterface $httpClient
     * @param SerializerInterface $serializerInterface
     */
    public function __construct(HttpClientInterface $httpClient, SerializerInterface $serializerInterface)
    {
        parent::__construct($httpClient, $serializerInterface, new ApiResource('stockmovements'));
    }

    /**
     * @param StockMovement $movement
     *
     * @return StockMovementId
     *
     * @throws ApiException
     */
    public function create(StockMovement $movement)
    {
        $resourceId = $this->post($this->serialize($movement));

        return StockMovementId::fromResourceId($resourceId);
    }

    /**
     * @param WarehouseId $warehouseId
     *
     * @return ArrayCollection|StockMovement[]
     *
     * @throws ApiException
     */
    public function getByWarehouse(WarehouseId $warehouseId)
    {
        $resources = $this->getList(['query' => [
            'sqlfilters' => 'fk_entrepot='.$warehouseId->getId()
        ]]);

        return $this->deserializeCollection($resources, StockMovement::class);
    }

    /**
     * @param ProductId $productId
     *
     * @return ArrayCollection|StockMovement[]
     *
     * @throws ApiException
     */
    public function getByProduct(ProductId $productId)
    {
        $resources = $this->getList(['query' => [
            'sqlfilters' => 'fk_product='.$productId->getId()
        ]]);

        return $this->deserializeCollection($resources, StockMovement::class);
    }
}
