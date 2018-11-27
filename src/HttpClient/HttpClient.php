<?php

namespace Dolibarr\Client\HttpClient;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;

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
     */
    public function get($uri, array $options = [])
    {
        return $this->request('GET', $uri, null, $options);
    }

    /**
     * {@inheritdoc}
     */
    public function post($uri, $json, array $options = [])
    {
        print $json;

        return $this->request('POST', $uri, $json, $options);
    }

    /**
     * {@inheritdoc}
     */
    public function put($uri, $json, array $options = [])
    {
        return $this->request('PUT', $uri, $json, $options);
    }

    /**
     * {@inheritdoc}
     */
    public function patch($uri, $json, array $options = [])
    {
        return $this->request('PATCH', $uri, $json, $options);
    }

    /**
     * {@inheritdoc}
     */
    public function delete($uri, array $options = [])
    {
        return $this->request('DELETE', $uri, null, $options);
    }

    /**
     * {@inheritdoc}
     */
    public function request($method, $uri, $json = null, array $options = [])
    {
        if (!empty($json)) {
            $options['body'] = $json;
            $options['headers']['content-type'] = 'application/json';
        }

        return $this->client->request($method, $uri, $options);
    }
}
