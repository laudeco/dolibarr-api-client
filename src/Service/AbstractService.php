<?php

namespace Dolibarr\Client\Service;

use Doctrine\Common\Collections\ArrayCollection;
use Dolibarr\Client\Domain\Resource\ApiResource;
use Dolibarr\Client\Domain\Resource\ResourceId;
use Dolibarr\Client\Exception\ApiException;
use Dolibarr\Client\HttpClient\HttpClient;
use Dolibarr\Client\HttpClient\HttpClientInterface;
use GuzzleHttp\Exception\RequestException;
use function GuzzleHttp\json_decode;
use JMS\Serializer\DeserializationContext;
use JMS\Serializer\SerializationContext;
use JMS\Serializer\SerializerInterface;

/**
 * @author Laurent De Coninck <lau.deconinck@gmail.com>
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
     * @param array $options
     *
     * @return bool|string
     *
     * @throws ApiException
     */
    protected function getList(array $options = [])
    {
        try {
            return $this->httpClient
                ->get($this->resource->getResourceName(), $options)
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
     * @return string
     *
     * @throws ApiException
     */
    protected function post($json, array $options = [])
    {
        try {
            $response = $this->httpClient
                ->post($this->resource->getResourceName(), $json, $options);

            return $response->getBody()->getContents();
        } catch (RequestException $exception) {
            throw new ApiException($exception->getMessage(), $exception->getCode(), $exception);
        }
    }

    /**
     * Send a DELETE request with JSON-encoded parameters.
     *
     * @param int   $id
     * @param array $options
     *
     * @return string
     *
     * @throws ApiException
     */
    protected function delete($id, array $options = [])
    {
        try {
            $response = $this->httpClient
                ->delete($this->resource->getResourceName().'/'.$id, $options);

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
     * @param string $data
     * @param string $type
     *
     * @return ArrayCollection
     */
    protected function deserializeCollection($data, $type)
    {
        $resources = $this->deserialize($data, "array<".$type.">");

        return new ArrayCollection($resources);
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
