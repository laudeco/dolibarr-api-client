<?php


namespace Dolibarr\Client\Security\Authentication;

use Webmozart\Assert\Assert;

/**
 * Token based authentication on the Dolibarr API.
 *
 * @author Laurent De Coninck <lau.deconinck@gmail.com>
 */
class TokenAuthentication extends AbstractAuthentication
{

    /**
     * @param string $token
     */
    public function __construct($token)
    {
        Assert::stringNotEmpty($token);

        parent::__construct();
        $this->addHeader('Dolapikey', $token);
    }
}
