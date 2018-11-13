<?php

namespace Dolibarr\Client\Service;

use Dolibarr\Client\Domain\Resource\ApiResource;
use Dolibarr\Client\Domain\Resource\ResourceId;
use Dolibarr\Client\Exception\ApiException;
use Dolibarr\Client\HttpClient\HttpClient;
use Dolibarr\Client\HttpClient\HttpClientInterface;
use GuzzleHttp\Exception\RequestException;
use JMS\Serializer\DeserializationContext;
use JMS\Serializer\SerializationContext;
use JMS\Serializer\SerializerInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * @packageDolibarr\Client\AbstractService
 */
abstract class AbstractService
{

    /**
     * @var HttpClient
     */
    protected $httpClient;

    /**
     * @var SerializerInterface
     */
    protected $serializer;

    /**
     * @var ApiResource
     */
    private $resource;

    /**
     * @param HttpClientInterface $httpClient
     * @param SerializerInterface $serializerInterface
     * @param ApiResource         $resource
     */
    public function __construct(
        HttpClientInterface $httpClient,
        SerializerInterface $serializerInterface,
        ApiResource $resource
    ) {
        $this->httpClient = $httpClient;
        $this->serializer = $serializerInterface;
        $this->resource = $resource;
    }

    /**
     * @param int|null $id
     *
     * @return bool|string
     *
     * @throws ApiException
     */
    protected function get($id = null)
    {
        try {
            return $this->httpClient
                ->get($this->resource->getResourceName().'/'.$id)
                ->getBody()
                ->getContents();
        } catch (RequestException $exception) {
            throw new ApiException($exception->getMessage(), $exception->getCode(), $exception);
        }
    }

    /**
     * Send a POST request with JSON-encoded parameters.
     *
     * @param array $json
     * @param array $options
     *
     * @return ResourceId
     *
     * @throws ApiException
     */
    protected function post($json, array $options = [])
    {
        try {
            $response = $this->httpClient
                ->post($this->resource->getResourceName(), $json, $options);

            return new ResourceId($response->getBody()->getContents());
        } catch (RequestException $exception) {
            throw new ApiException($exception->getMessage(), $exception->getCode(), $exception);
        }
    }

    /**
     * Send a PUT request with JSON-encoded parameters.
     *
     * @param string $uri
     * @param string $json
     * @param array  $options
     *
     * @return string
     *
     * @throws ApiException
     */
    private function put($uri, $json, array $options = [])
    {
        try {
            $response = $this->httpClient
                ->put($uri, $json, $options);

            return $response;
        } catch (RequestException $exception) {
            throw new ApiException();
        }
    }

    /**
     * Send a PATCH request with JSON-encoded parameters.
     *
     * @param string $uri
     * @param string $json
     * @param array  $options
     *
     * @return string
     *
     * @throws ApiException
     */
    private function patch($uri, $json, array $options = [])
    {
        try {
            $response = $this->httpClient
                ->patch($uri, $json, $options);

            return $response;
        } catch (RequestException $exception) {
            throw new ApiException();
        }
    }

    /**
     * Send a DELETE request with JSON-encoded parameters.
     *
     * @param string $uri
     * @param array  $options
     *
     * @return string
     *
     * @throws ApiException
     */
    private function delete($uri, array $options = [])
    {
        try {
            $response = $this->httpClient
                ->delete($uri, $options);

            return $response->getBody()
                ->getContents();
        } catch (RequestException $exception) {
            throw new ApiException();
        }
    }

    /**
     * @param string                 $json
     * @param string                 $type
     * @param DeserializationContext $context
     *
     * @return mixed
     */
    protected function deserialize($json, $type, DeserializationContext $context = null)
    {
        return $this->serializer->deserialize($json, $type, 'json', $context);
    }

    /**
     * @param mixed                $entity
     * @param SerializationContext $context
     *
     * @return mixed
     */
    public function serialize($entity, SerializationContext $context = null)
    {
        return $this->serializer->serialize($entity, 'json', $context);
    }
}
