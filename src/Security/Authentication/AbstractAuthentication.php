<?php


namespace Dolibarr\Client\Security\Authentication;

use Dolibarr\Client\Domain\Authentication\Header;

/**
 * @author Laurent De Coninck <lau.deconinck@gmail.com>
 */
abstract class AbstractAuthentication implements Authentication
{

    /**
     * @var Header[]|array
     */
    private $headers;

    public function __construct()
    {
        $this->headers = [];
    }

    /**
     * @param string $headerKey
     * @param string $headerValue
     *
     * @return $this
     */
    protected function addHeader($headerKey, $headerValue)
    {
        $this->headers[$headerKey] = new Header($headerKey, $headerValue);

        return $this;
    }

    /**
     * @return array|Header[]
     */
    public function getHeaders()
    {
        return $this->headers;
    }
}
