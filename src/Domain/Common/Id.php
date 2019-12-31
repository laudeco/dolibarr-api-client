<?php


namespace Dolibarr\Client\Domain\Common;

use Dolibarr\Client\Domain\Resource\ResourceId;
use Webmozart\Assert\Assert;

trait Id
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
     * @param ResourceId $resourceId
     *
     * @return self
     */
    public static function fromResourceId(ResourceId $resourceId)
    {
        return new self($resourceId->getId());
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
}
