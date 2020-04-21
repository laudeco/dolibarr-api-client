<?php


namespace Dolibarr\Client\Domain\Thirdparty;

use Dolibarr\Client\Domain\Thirdparty\ValueObjects\Type;

final class Prospect extends Thirdparty
{
    public function __construct(Type $type)
    {
        parent::__construct();
        $this->setType($type->type());
    }
}
