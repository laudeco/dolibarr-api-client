<?php


namespace Dolibarr\Client\Domain\Proposal;

use Webmozart\Assert\Assert;

final class PropalStatus
{
    /**
     * @var int
     */
    private $value;

    private function __construct($status = 0)
    {
        $this->value = $status;
    }

    /**
     * @return PropalStatus
     */
    public static function draft()
    {
        return new self(0);
    }

    /**
     * @return PropalStatus
     */
    public static function validated()
    {
        return new self(1);
    }

    /**
     * @return PropalStatus
     */
    public static function signed()
    {
        return new self(2);
    }

    /**
     * @return PropalStatus
     */
    public static function refused()
    {
        return new self(3);
    }

    /**
     * @return PropalStatus
     */
    public static function billed()
    {
        return new self(4);
    }

    /**
     * @return int
     */
    public function getValue()
    {
        return $this->value;
    }

    public static function fromInteger($value)
    {
        Assert::lessThanEq($value, 4);
        Assert::greaterThanEq($value, 0);

        return new self($value);
    }
    /**
     * @param PropalStatus $status
     *
     * @return bool
     */
    public function equals(PropalStatus $status)
    {
        return $this->value === $status->getValue();
    }
}
