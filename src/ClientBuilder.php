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
     * @var array
     */
    private $options;

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
        $this->options = [];
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
     * @deprecated please use debug
     *
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
     * Enables the debug mode.
     *
     * @return $this
     */
    public function debug()
    {
        $this->debug = true;

        return $this;
    }

    /**
     * Set the user agent.
     *
     * @param string $userAgent
     *
     * @return ClientBuilder
     */
    public function userAgent($userAgent)
    {
        Assert::stringNotEmpty($userAgent);

        $this->options = array_merge(
            $this->options,
            [
                'headers' => [
                    'User-Agent' => $userAgent
                ]
            ]
        );

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
        return array_merge(
            [
                'base_uri' => $this->baseUri,
                'debug'    => $this->debug,
            ],
            $this->options
        );
    }
}
