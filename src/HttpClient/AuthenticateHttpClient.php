<?php


namespace Dolibarr\Client\HttpClient;

use Dolibarr\Client\Exception\ApiException;
use Dolibarr\Client\HttpClient\Middleware\AuthenticationMiddleware;
use Dolibarr\Client\Security\Authentication\Authentication;
use Dolibarr\Client\Security\Authentication\DolibarrApiKeyRequester;
use GuzzleHttp\HandlerStack;

/**
 * @package Dolibarr\Client\HttpClient
 */
final class AuthenticateHttpClient extends HttpClient
{

    /**
     * @var DolibarrApiKeyRequester
     */
    private $dolibarrApikeyRequester;

    /**
     * @param array                   $options
     * @param DolibarrApiKeyRequester $dolibarrApiKeyRequester
     */
    public function __construct(array $options, DolibarrApiKeyRequester $dolibarrApiKeyRequester)
    {
        parent::__construct($options);
        $this->dolibarrApikeyRequester = $dolibarrApiKeyRequester;
    }

    /**
     * {@inheritdoc}
     *
     * @throws ApiException
     */
    protected function authenticate()
    {
        $authentication = $this->dolibarrApikeyRequester->request();

        return ['handler' => $this->createHandler($authentication)];
    }

    /**
     * @param Authentication $authentication
     *
     * @return HandlerStack
     */
    private function createHandler(Authentication $authentication)
    {
        $stack = HandlerStack::create();
        $stack->push(new AuthenticationMiddleware($authentication));

        return $stack;
    }
}
