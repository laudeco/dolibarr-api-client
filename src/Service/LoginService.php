<?php


namespace Dolibarr\Client\Service;

use Dolibarr\Client\Domain\Resource\ApiResource;
use Dolibarr\Client\Exception\ApiException;
use Dolibarr\Client\HttpClient\HttpClientInterface;
use JMS\Serializer\SerializerInterface;

/**
 * @package Dolibarr\Client\Service
 */
final class LoginService extends AbstractService
{
    /**
     * @param HttpClientInterface $httpClient
     * @param SerializerInterface $serializerInterface
     */
    public function __construct(HttpClientInterface $httpClient, SerializerInterface $serializerInterface)
    {
        parent::__construct($httpClient, $serializerInterface, new ApiResource('login'));
    }


    /**
     * @param string $login
     * @param string $password
     *
     * @return string
     *
     * @throws ApiException
     */
    public function login($login, $password)
    {
        $response = $this->post($this->serialize([
            'login'    => $login,
            'password' => $password
        ]));

        $tokenResponse = json_decode($response, true);

        return $tokenResponse['success']['token'];
    }
}
