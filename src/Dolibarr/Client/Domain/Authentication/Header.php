<?php


namespace Dolibarr\Client\Domain\Authentication;

use Webmozart\Assert\Assert;

/**
 * @author Laurent De Coninck <lau.deconinck@gmail.com>
 */
class Header
{

    /**
     * @var string
     */
    private $headerKey;

    /**
     * @var string
     */
    private $headerValue;

    /**
     * @param string $headerKey
     * @param string $headerValue
     */
    public function __construct($headerKey, $headerValue)
    {
        Assert::notEmpty($headerKey);
        Assert::notEmpty($headerValue);

        $this->headerKey = $headerKey;
        $this->headerValue = $headerValue;
    }

    /**
     * @return string
     */
    public function getHeaderKey()
    {
        return $this->headerKey;
    }

    /**
     * @return string
     */
    public function getHeaderValue()
    {
        return $this->headerValue;
    }
}
