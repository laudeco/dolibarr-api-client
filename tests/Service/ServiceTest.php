<?php

namespace Dolibarr\Client\Tests\Service;

use Dolibarr\Client\HttpClient\HttpClientInterface;
use JMS\Serializer\EventDispatcher\EventDispatcher;
use JMS\Serializer\Handler\HandlerRegistry;
use JMS\Serializer\Serializer;
use JMS\Serializer\SerializerBuilder;
use PHPUnit\Framework\TestCase;
use PHPUnit_Framework_MockObject_MockObject as MockObject;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;

abstract class ServiceTest extends TestCase
{
    /**
     * @var HttpClientInterface | MockObject
     */
    private $mockClient;

    /**
     * Set up the client.
     */
    protected function setUp()
    {
        parent::setUp();
        $this->mockClient = $this->createMock(HttpClientInterface::class);
    }

    /**
     * @return HttpClientInterface|MockObject
     */
    protected function mockClient()
    {
        return $this->mockClient;
    }

    /**
     * @param string $name
     *
     * @return ResponseInterface
     */
    protected function buildResponse($name = null)
    {
        $responseBody = $this->createMock(StreamInterface::class);

        /** @var ResponseInterface|MockObject $response */
        $response = $this->createMock(ResponseInterface::class);
        $response->expects($this->once())->method("getBody")
            ->willReturn($responseBody);


        $responseBody->expects($this->once())->method("getContents")
            ->willReturn($name ? $this->getExpectedResponse($name) : null);

        return $response;
    }

    /**
     * @param string $name
     *
     * @return string
     */
    private function getExpectedResponse($name)
    {
        return file_get_contents(__DIR__ . "/Data/Response/" . $name . ".json");
    }

    /**
     * @param string $name
     *
     * @return string
     */
    protected function getExpectedPayload($name)
    {
        return file_get_contents(__DIR__ . "/Data/Request/" . $name . ".json");
    }

    /**
     * @return Serializer
     */
    protected function serializer()
    {
        return SerializerBuilder::create()
            ->addDefaultHandlers()
            ->build();
    }
}
