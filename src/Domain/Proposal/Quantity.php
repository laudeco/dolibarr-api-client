<?php


namespace Dolibarr\Client\Domain\Proposal;

use Webmozart\Assert\Assert;

final class Quantity
{
    /**
     * @var int
     */
    private $quantity;

    /**
     * @param int $quantity
     */
    private function __construct($quantity)
    {
        Assert::greaterThan($quantity, 0);
        Assert::integerish($quantity);
        $this->quantity = (int)$quantity;
    }

    /**
     * @param int $quantity
     *
     * @return Quantity
     */
    public static function create($quantity)
    {
        return new self($quantity);
    }

    /**
     * @return int
     */
    public function getQuantity()
    {
        return $this->quantity;
    }
}
