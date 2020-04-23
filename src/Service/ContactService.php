<?php


namespace Dolibarr\Client\Service;

use Dolibarr\Client\Domain\Contact\Contact;
use Dolibarr\Client\Domain\Contact\ContactId;
use Dolibarr\Client\Domain\Resource\ApiResource;
use Dolibarr\Client\Domain\Resource\ResourceId;
use Dolibarr\Client\Exception\ApiException;
use Dolibarr\Client\HttpClient\HttpClientInterface;
use JMS\Serializer\SerializerInterface;

final class ContactService extends AbstractService
{

    /**
     * @param HttpClientInterface $httpClient
     * @param SerializerInterface $serializerInterface
     */
    public function __construct(HttpClientInterface $httpClient, SerializerInterface $serializerInterface)
    {
        parent::__construct($httpClient, $serializerInterface, new ApiResource('contacts'));
    }

    /**
     * @param Contact $contact
     *
     * @return ContactId
     *
     * @throws ApiException
     */
    public function create(Contact $contact)
    {
        return new ContactId((int)$this->post($this->serialize($contact)));
    }
}
