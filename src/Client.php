<?php

namespace Dolibarr\Client;

use Dolibarr\Client\HttpClient\HttpClient;
use Dolibarr\Client\HttpClient\HttpClientInterface;
use Dolibarr\Client\Service\LoginService;
use Dolibarr\Client\Service\ProductsService;
use Dolibarr\Client\Service\ProposalService;
use Dolibarr\Client\Service\StockMovementsService;
use Dolibarr\Client\Service\ThirdPartiesCustomerCategoryService;
use Dolibarr\Client\Service\ThirdPartiesService;
use Dolibarr\Client\Service\WarehousesService;
use JMS\Serializer\SerializerInterface;

/**
 * @author Laurent De Coninck <lau.deconinck@gmail.com>
 */
final class Client
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
     * @param SerializerInterface $serializer
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

    /**
     * @return StockMovementsService
     */
    public function stockMovements()
    {
        return new StockMovementsService($this->httpClient, $this->serializer);
    }

    /**
     * @return WarehousesService
     */
    public function warehouse()
    {
        return new WarehousesService($this->httpClient, $this->serializer);
    }

    /**
     * @return ProductsService
     */
    public function products()
    {
        return new ProductsService($this->httpClient, $this->serializer);
    }

    public function thirdpartyCustomerTag()
    {
        return new ThirdPartiesCustomerCategoryService($this->httpClient, $this->serializer);
    }

    /**
     * @return LoginService
     */
    public function login()
    {
        return new LoginService($this->httpClient, $this->serializer);
    }
}
