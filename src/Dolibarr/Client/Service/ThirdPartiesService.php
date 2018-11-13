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
class ThirdPartiesService extends AbstractService
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
     * @param ThirdpartyId $id
     *
     * @return Thirdparty
     *
     * @throws ApiException
     */
    public function getById(ThirdpartyId $id)
    {
        $response = parent::get($id->getId());

        return $this->deserialize($response, Thirdparty::class);
    }

    /**
     * @param Thirdparty $thirdparty
     *
     * @return ResourceId
     *
     * @throws ApiException
     */
    public function create(Thirdparty $thirdparty)
    {
        return parent::post($this->serialize($thirdparty));
    }
}
