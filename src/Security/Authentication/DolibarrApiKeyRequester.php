<?php


namespace Dolibarr\Client\Security\Authentication;

use Dolibarr\Client\Exception\ApiException;
use Dolibarr\Client\Service\LoginService;

/**
 * Requests the API key.
 *
 * @package Dolibarr\Client\Security\Authentication
 */
final class DolibarrApiKeyRequester
{

    /**
     * @var LoginService
     */
    private $loginService;

    /**
     * @var Authentication
     */
    private $authentication;

    /**
     * @param LoginService   $loginService
     * @param Authentication $authentication
     */
    public function __construct(LoginService $loginService, Authentication $authentication)
    {
        $this->loginService = $loginService;
        $this->authentication = $authentication;
    }

    /**
     * @return Authentication
     *
     * @throws ApiException
     */
    public function request()
    {
        if (!($this->authentication instanceof LoginAuthentication)) {
            return $this->authentication;
        }

        $token = $this->loginService->login($this->authentication->getLogin(), $this->authentication->getPassword());

        return new TokenAuthentication($token);
    }
}
