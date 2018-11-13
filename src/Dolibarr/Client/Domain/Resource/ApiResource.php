<?php


namespace Dolibarr\Client\Domain\Resource;

use Webmozart\Assert\Assert;

/**
 * @author Laurent De Coninck <lau.deconinck@gmail.com>
 */
class ApiResource
{
    /**
     * @var string
     */
    private $resourceName;

    /**
     * @param string $resourceName
     */
    public function __construct($resourceName)
    {
        Assert::stringNotEmpty($resourceName, 'resource is required');

        $this->resourceName = $resourceName;
    }

    /**
     * @return string
     */
    public function getResourceName()
    {
        return $this->resourceName;
    }
}
