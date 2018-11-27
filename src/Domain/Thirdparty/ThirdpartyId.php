<?php


namespace Dolibarr\Client\Domain\Thirdparty;

use Webmozart\Assert\Assert;

/**
 * Value object of a thirdparty id.
 *
 * @author Laurent De Coninck <lau.deconinck@gmail.com>
 */
class ThirdpartyId
{

    /**
     * @var int
     */
    private $id;

    /**
     * @param int $id
     */
    public function __construct($id)
    {
        Assert::integer($id);
        Assert::greaterThan($id, 0);
        Assert::notNull($id);

        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
}
