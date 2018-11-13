<?php


namespace Dolibarr\Client\Domain\Proposal;

/**
 * @author Laurent De Coninck <lau.deconinck@gmail.com>
 */
class PayementMethod
{

    /**
     * @var int
     */
    private $methodId;

    /**
     * @param int $methodId
     */
    private function __construct($methodId)
    {
        $this->methodId = $methodId;
    }

    /**
     * @return PayementMethod
     */
    public static function card()
    {
        return new PayementMethod(6);
    }

    /**
     * @return PayementMethod
     */
    public static function cash()
    {
        return new PayementMethod(4);
    }

    /**
     * @return PayementMethod
     */
    public static function bankAccount()
    {
        return new PayementMethod(2);
    }
}
