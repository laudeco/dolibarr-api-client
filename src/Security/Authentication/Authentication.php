<?php

namespace Dolibarr\Client\Security\Authentication;

use Dolibarr\Client\Domain\Authentication\Header;

/**
 * Interface Authentication.
 *
 * @packageDolibarr\Client\Security\Authentication
 */
interface Authentication
{
    /**
     * @return array|Header[]
     */
    public function getHeaders();
}
