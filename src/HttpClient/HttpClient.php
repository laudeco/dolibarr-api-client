<?php

namespace Dolibarr\Client\HttpClient;

use Dolibarr\Client\Exception\ApiException;
use Dolibarr\Client\Exception\BadRequestException;
use Dolibarr\Client\Exception\DolibarrException;
use Dolibarr\Client\Exception\ResourceNotFoundException;
use Dolibarr\Client\Security\Authentication\DolibarrApiKeyRequester;
use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Exception\ServerException;

/**
 * @author Laurent De Coninck <lau.deconinck@gmail.com>
 */
class HttpClient implements HttpClientInterface
{

    /**
     * @var ClientInterface
     */
    private $client;

    /**
     * @param array           $options
     * @param ClientInterface $client
     */
    public function __construct(
        array $options = [],
        ClientInterface $client = null
    ) {
        $this->client = $client ?: new Client($options);
    }

    /**
     * {@inheritdoc}
     *
     * @throws Exception
     */
    public function get($uri, array $options = [])
    {
        return $this->request('GET', $uri, null, $options);
    }

    /**
     * {@inheritdoc}
     *
     * @throws Exception
     */
    public function post($uri, $json, array $options = [])
    {
        return $this->request('POST', $uri, $json, $options);
    }

    /**
     * {@inheritdoc}
     *
     * @throws Exception
     */
    public function put($uri, $json, array $options = [])
    {
        return $this->request('PUT', $uri, $json, $options);
    }

    /**
     * {@inheritdoc}
     *
     * @throws Exception
     */
    public function patch($uri, $json, array $options = [])
    {
        return $this->request('PATCH', $uri, $json, $options);
    }

    /**
     * {@inheritdoc}
     *
     * @throws Exception
     */
    public function delete($uri, array $options = [])
    {
        return $this->request('DELETE', $uri, null, $options);
    }

    /**
     * {@inheritdoc}
     *
     * @throws Exception
     */
    public function request($method, $uri, $json = null, array $options = [])
    {
        if (!empty($json)) {
            $options['body'] = $json;
            $options['headers']['content-type'] = 'application/json';
        }

        $authenticationOption = $this->authenticate();
        $options = array_merge($options, $authenticationOption);

        try {
            return $this->client->request($method, $uri, $options);
        } catch (GuzzleException $e) {
            $this->propagateResponseExceptions($e);
        }
    }

    /**
     * @param GuzzleException $exception
     *
     * @throws Exception
     */
    private function propagateResponseExceptions(GuzzleException $exception)
    {
        if ($exception instanceof ConnectException) {
            throw new \RuntimeException("Connection issue!");
        }

        if ($exception instanceof ClientException) {
            $response = $exception->getResponse();

            if (null === $response) {
                throw new ApiException($exception->getMessage());
            }

            if ($response->getStatusCode() === 404) {
                throw new ResourceNotFoundException();
            }

            if ($response->getStatusCode() === 400) {
                throw new BadRequestException();
            }
        }

        if ($exception instanceof ServerException) {
            $response = $exception->getResponse();

            if (null === $response) {
                throw new ApiException($exception->getMessage());
            }

            if ($response->getStatusCode() === 500) {
                throw new DolibarrException();
            }
        }

        throw new ApiException($exception->getMessage());
    }

    /**
     * Do an authenticated request.
     *
     * @return array
     */
    protected function authenticate()
    {
        return [];
    }
}
