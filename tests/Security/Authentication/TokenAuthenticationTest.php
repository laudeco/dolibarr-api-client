<?php
/*
 */

namespace Dolibarr\Client\Tests\Security\Authentication;

use Dolibarr\Client\Security\Authentication\TokenAuthentication;

/**
 * @author Laurent De Coninck <lau.deconinck@gmail.com>
 */
class TokenAuthenticationTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @test
     */
    public function construct_WithToken_TokenInHeaders()
    {
        $authentication = new TokenAuthentication('token');
        $headers = $authentication->getHeaders();

        $this->assertEquals('token', $headers['Dolapikey']->getHeaderValue());
    }
}
