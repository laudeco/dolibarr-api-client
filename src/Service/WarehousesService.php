<?php
namespace Dolibarr\Client\Service;

use Doctrine\Common\Collections\ArrayCollection;
use Dolibarr\Client\Domain\Resource\ApiResource;
use Dolibarr\Client\Domain\Resource\ResourceId;
use Dolibarr\Client\Domain\Warehouse\Warehouse;
use Dolibarr\Client\Domain\Warehouse\WarehouseId;
use Dolibarr\Client\Exception\ApiException;
use Dolibarr\Client\HttpClient\HttpClientInterface;
use JMS\Serializer\SerializerInterface;

/**
 * @author Laurent De Coninck <lau.deconinck@gmail.com>
 */
final class WarehousesService extends AbstractService
{
    /**
     * @param HttpClientInterface $httpClient
     * @param SerializerInterface $serializerInterface
     */
    public function __construct(HttpClientInterface $httpClient, SerializerInterface $serializerInterface)
    {
        parent::__construct($httpClient, $serializerInterface, new ApiResource('warehouses'));
    }

    /**
     * @param int $limit
     * @param int $page
     *
     * @return ArrayCollection|Warehouse[]
     *
     * @throws ApiException
     */
    public function findAll($limit = 100, $page = 0)
    {
        $options = [
            'query' => [
                'limit' => $limit,
                'page'  => $page
            ]
        ];

        $warehouses = $this->getList($options);

        return $this->deserializeCollection($warehouses, Warehouse::class);
    }

    /**
     * @param WarehouseId $id
     *
     * @return Warehouse
     *
     * @throws ApiException
     */
    public function getById(WarehouseId $id)
    {
        $response = $this->get($id->getId());

        return $this->deserialize($response, Warehouse::class);
    }

    /**
     * @param WarehouseId $id
     *
     * @throws ApiException
     */
    public function remove(WarehouseId $id)
    {
        $this->delete($id->getId());
    }

    /**
     * @param Warehouse $warehouse
     *
     * @return WarehouseId
     *
     * @throws ApiException
     */
    public function create(Warehouse $warehouse)
    {
        $resourceId = new ResourceId($this->post($this->serialize($warehouse)));

        return WarehouseId::fromResourceId($resourceId);
    }
}
