<?php


namespace Dolibarr\Client\Security\Authentication;

/**
 * @package Dolibarr\Client\Security\Authentication
 */
final class LoginAuthentication extends AbstractAuthentication
{
    /**
     * @var string
     */
    private $login;

    /**
     * @var string
     */
    private $password;

    /**
     * @param string $login
     * @param string $password
     */
    public function __construct($login, $password)
    {
        parent::__construct();

        $this->login = $login;
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }
}
