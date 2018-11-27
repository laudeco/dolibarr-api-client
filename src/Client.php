<?php

namespace Dolibarr\Api\Client;

use Dolibarr\Client\HttpClient\HttpClient;
use Dolibarr\Client\HttpClient\HttpClientInterface;
use Dolibarr\Client\Service\ProposalService;
use Dolibarr\Client\Service\ThirdPartiesService;
use JMS\Serializer\SerializerInterface;

/**
 * @author Laurent De Coninck <lau.deconinck@gmail.com>
 */
class Client
{

    /**
     * @var HttpClient
     */
    private $httpClient;

    /**
     * @var SerializerInterface
     */
    private $serializer;

    /**
     * @param HttpClientInterface $httpClient
     * @param SerializerInterface $serializer @
     */
    public function __construct(HttpClientInterface $httpClient, SerializerInterface $serializer)
    {
        $this->httpClient = $httpClient;
        $this->serializer = $serializer;
    }

    /**
     * @return ThirdPartiesService
     */
    public function thirdparties()
    {
        return new ThirdPartiesService($this->httpClient, $this->serializer);
    }

    /**
     * @return ProposalService
     */
    public function proposals()
    {
        return new ProposalService($this->httpClient, $this->serializer);
    }
}
