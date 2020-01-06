<?php


namespace Dolibarr\Client\Security\Authentication;

use Dolibarr\Client\Domain\Authentication\Header;

final class NoAuthentication implements Authentication
{

    /**
     * @return array|Header[]
     */
    public function getHeaders()
    {
        return [];
    }
}
