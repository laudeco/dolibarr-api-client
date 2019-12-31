<?php


namespace Dolibarr\Client\Domain\Common;

/**
 * @package Dolibarr\Client\Domain\Common
 */
final class Barcode
{

    /**
     * @var string
     */
    private $value;

    /**
     * @param string $value
     */
    public function __construct($value)
    {
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function barcode()
    {
        return $this->value;
    }
}
