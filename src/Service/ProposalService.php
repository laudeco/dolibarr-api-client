<?php


namespace Dolibarr\Client\Service;

use Dolibarr\Client\Domain\Proposal\Proposal;
use Dolibarr\Client\Domain\Resource\ApiResource;
use Dolibarr\Client\Domain\Resource\ResourceId;
use Dolibarr\Client\Exception\ApiException;
use Dolibarr\Client\HttpClient\HttpClientInterface;
use JMS\Serializer\SerializerInterface;

/**
 * @author Laurent De Coninck <lau.deconinck@gmail.com>
 */
class ProposalService extends AbstractService
{

    /**
     * @param HttpClientInterface $httpClient
     * @param SerializerInterface $serializerInterface
     */
    public function __construct(
        HttpClientInterface $httpClient,
        SerializerInterface $serializerInterface
    ) {
        parent::__construct($httpClient, $serializerInterface, new ApiResource('proposals'));
    }

    /**
     * @param Proposal $proposal
     *
     * @return ResourceId
     *
     * @throws ApiException
     */
    public function create(Proposal $proposal)
    {
        return new ResourceId($this->post($this->serialize($proposal)));
    }
}
