<?php


namespace Dolibarr\Client\Domain\Thirdparty\ValueObjects;

use Webmozart\Assert\Assert;

final class Type
{
    /**
     * @var int
     */
    private $value;

    private static $customer = 1;

    private static $prospect = 2;

    private static $prospectCustomer = 3;

    private static $none = 0;

    private function __construct($type)
    {
        Assert::greaterThanEq($type, 0);
        Assert::lessThanEq($type, 3);

        $this->value = $type;
    }

    public function type()
    {
        return $this->value;
    }

    public static function customer()
    {
        return new self(self::$customer);
    }

    public static function prospect()
    {
        return new self(self::$prospect);
    }

    public static function prospectCustomer()
    {
        return new self(self::$prospectCustomer);
    }

    public static function none()
    {
        return new self(self::$none);
    }
}
