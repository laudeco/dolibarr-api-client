<?php

namespace Dolibarr\Client\Tests\Service;

use Dolibarr\Client\Domain\Contact\Contact;
use Dolibarr\Client\Domain\Contact\ContactId;
use Dolibarr\Client\Service\ContactService;

final class ContactServiceTest extends ServiceTest
{
    /**
     * @var ContactService
     */
    private $service;

    /**
     * Setup the service.
     */
    protected function setUp()
    {
        parent::setUp();
        $this->service = new ContactService($this->mockClient(), $this->serializer());
    }

    /**
     * @test
     *
     * @throws \Exception
     */
    public function create_WithData_ValidPayload()
    {
        $this->mockClient()
            ->expects($this->once())
            ->method("post")
            ->with("contacts", $this->getExpectedPayload('Contacts/create'))
            ->willReturn($this->buildResponse('Contacts/create'));

        $contact = new Contact('test_last name');
        $contact->setFirstname('Test');
        $contact->setCivilityCode('Mr');
        $contact->setPhone('0000000000');
        $contact->setEmail('test@test.com');
        $contact->setAddress('add');
        $contact->setZip('1000');
        $contact->setCompanyId(1);
        $contact->setEnable(true);
        $contact->setExternalReference('AZERTY001');
        $contact->setTown('City');

        $id = $this->service->create($contact);

        $this->assertInstanceOf(ContactId::class, $id);
        $this->assertEquals(4, $id->getId());
    }
}
