<?php


namespace Dolibarr\Client\Service;

use Dolibarr\Client\Domain\Resource\ApiResource;
use Dolibarr\Client\Domain\Resource\ResourceId;
use Dolibarr\Client\Domain\Thirdparty\Thirdparty;
use Dolibarr\Client\Domain\Thirdparty\ThirdpartyId;
use Dolibarr\Client\Exception\ApiException;
use Dolibarr\Client\HttpClient\HttpClientInterface;
use JMS\Serializer\SerializerInterface;

/**
 * @author Laurent De Coninck <lau.deconinck@gmail.com>
 */
final class ThirdPartiesCustomerCategoryService extends AbstractService
{
    /**
     * @param HttpClientInterface $httpClient
     * @param SerializerInterface $serializerInterface
     */
    public function __construct(HttpClientInterface $httpClient, SerializerInterface $serializerInterface)
    {
        parent::__construct($httpClient, $serializerInterface, new ApiResource('thirdparties'));
    }

    /**
     * @param ResourceId $thirdpartyId
     * @param ResourceId $catgeory
     *
     * @throws ApiException
     * @throws \Exception
     */
    public function attach(ResourceId $thirdpartyId, ResourceId $catgeory)
    {
        $this->httpClient->post($this->resource->getResourceName().'/'.$thirdpartyId->getId().'/categories/'.$catgeory->getId(), $this->serialize([]));
    }
}
