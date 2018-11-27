<?php


namespace Dolibarr\Client\Domain\Resource;

use Webmozart\Assert\Assert;

/**
 * @author Laurent De Coninck <lau.deconinck@gmail.com>
 */
class ResourceId
{

    /**
     * @var int
     */
    private $id;

    /**
     * ResourceId constructor.
     *
     * @param int $id
     */
    public function __construct($id)
    {
        Assert::integerish($id);
        Assert::greaterThan($id, 0);

        $this->id = (int) $id;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
}
