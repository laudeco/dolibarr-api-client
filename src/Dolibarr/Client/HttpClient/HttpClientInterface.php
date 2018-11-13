<?php

namespace Dolibarr\Client\HttpClient;

use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;

/**
 * @packageDolibarr\Client\HttpClient
 */
interface HttpClientInterface
{

    /**
     * Send a GET request.
     *
     * @param string $uri     Request path
     * @param array  $options
     *
     * @return Response
     */
    public function get($uri, array $options = []);

    /**
     * Send a POST request.
     *
     * @param string $uri     Request path
     * @param string $json
     * @param array  $options Request body
     *
     * @return Response
     */
    public function post($uri, $json, array $options = []);

    /**
     * Send a PUT request.
     *
     * @param string $uri
     * @param string $json
     * @param array  $options
     *
     * @return Response
     */
    public function put($uri, $json, array $options = []);

    /**
     * Send a PATCH request.
     *
     * @param string $uri
     * @param string $json
     * @param array  $options
     *
     * @return Response
     */
    public function patch($uri, $json, array $options = []);

    /**
     * Send a DELETE request.
     *
     * @param string $uri
     * @param array  $options
     *
     * @return Response
     */
    public function delete($uri, array $options = []);

    /**
     * Send a request to the server, receive a response,
     * decode the response and returns an associative array.
     *
     * @param string      $method
     * @param string      $uri
     * @param string|null $json
     * @param array       $options
     *
     * @return Request
     */
    public function request($method, $uri, $json = null, array $options = []);
}
