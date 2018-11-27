<?php


namespace Dolibarr\Client\HttpClient\Middleware;

use Dolibarr\Client\Security\Authentication\Authentication;
use Psr\Http\Message\RequestInterface;

/**
 * @author Laurent De Coninck <lau.deconinck@gmail.com>
 */
class AuthenticationMiddleware
{
    /**
     * @var Authentication
     */
    private $authentication;

    /**
     * @param Authentication $authentication
     */
    public function __construct(Authentication $authentication)
    {
        $this->authentication = $authentication;
    }

    /**
     * @param callable $handler
     *
     * @return callable
     */
    public function __invoke(callable $handler)
    {
        return function (RequestInterface $request, array $options) use ($handler) {
            foreach ($this->authentication->getHeaders() as $header) {
                $request = $request->withHeader(
                    $header->getHeaderKey(),
                    $header->getHeaderValue()
                );
            }

            return $handler($request, $options);
        };
    }
}
