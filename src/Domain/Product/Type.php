<?php


namespace Dolibarr\Client\Domain\Product;

use Webmozart\Assert\Assert;

/**
 * Defines the type of the product.
 *
 * @package Dolibarr\Client\Domain\Product
 */
final class Type
{

    /**
     * @var int
     */
    private $value;

    /**
     * @param int $type
     */
    private function __construct($type)
    {
        Assert::integer($type);
        if ($type < 0 || $type > 2) {
            throw new \InvalidArgumentException('Invalid type given');
        }

        $this->value = $type;
    }

    /**
     * @return int
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @return Type
     */
    public static function service()
    {
        return new self(2);
    }

    /**
     * @return Type
     */
    public static function product()
    {
        return new self(1);
    }

    /**
     * @return Type
     */
    public static function all()
    {
        return new self(0);
    }
}
