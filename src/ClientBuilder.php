<?php

namespace Dolibarr\Client;

use Doctrine\Common\Annotations\AnnotationRegistry;
use Dolibarr\Client\HttpClient\AuthenticateHttpClient;
use Dolibarr\Client\HttpClient\HttpClient;
use Dolibarr\Client\HttpClient\Middleware\AuthenticationMiddleware;
use Dolibarr\Client\Security\Authentication\Authentication;
use Dolibarr\Client\Security\Authentication\DolibarrApiKeyRequester;
use Dolibarr\Client\Service\LoginService;
use GuzzleHttp\HandlerStack;
use JMS\Serializer\Serializer;
use JMS\Serializer\SerializerBuilder;
use Webmozart\Assert\Assert;

/**
 * @package Dolibarr\Api\Client
 */
final class ClientBuilder
{

    /**
     * @var string
     */
    private $baseUri;

    /**
     * @var Authentication
     */
    private $authentication;

    /**
     * @var boolean
     */
    private $debug;

    /**
     * @param string         $baseUri        The base uri of the api
     * @param Authentication $authentication The authentication to access the api
     */
    public function __construct(
        $baseUri,
        Authentication $authentication
    ) {
        Assert::stringNotEmpty($baseUri, "The baseUri should not be empty");

        $this->baseUri = $baseUri;
        $this->authentication = $authentication;
    }

    /**
     * @return Client
     */
    public function build()
    {
        return new Client(
            $this->createHttpClient(),
            $this->createSerializer()
        );
    }

    /**
     * @param boolean $debug
     *
     * @return $this
     */
    public function setDebug($debug)
    {
        $this->debug = (bool)$debug;

        return $this;
    }

    /**
     * @return Serializer
     */
    private function createSerializer()
    {
        AnnotationRegistry::registerLoader('class_exists');

        return SerializerBuilder::create()
          ->addDefaultHandlers()
          ->build();
    }

    /**
     * @return HttpClient
     */
    private function createHttpClient()
    {
        $httpClient = new AuthenticateHttpClient(
            $this->clientOptions(),
            $this->defaultKeyRequester()
        );

        return $httpClient;
    }

    /**
     * @return DolibarrApiKeyRequester
     */
    private function defaultKeyRequester()
    {
        return new DolibarrApiKeyRequester(
            $this->loginService(),
            $this->authentication
        );
    }

    /**
     * @return LoginService
     */
    private function loginService()
    {
        $client = new HttpClient($this->clientOptions());

        return new LoginService($client, $this->createSerializer());
    }

    /**
     * @return array
     */
    private function clientOptions()
    {
        return [
            'base_uri' => $this->baseUri,
            'debug'    => $this->debug
        ];
    }
}
