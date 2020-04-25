<?php

namespace Dolibarr\Client\Tests\Service;

use Dolibarr\Client\Domain\Proposal\ProposalProduct;
use Dolibarr\Client\Domain\Resource\ResourceId;
use Dolibarr\Client\Service\ProposalService;

final class ProposalServiceTest extends ServiceTest
{
    /**
     * @var ProposalService
     */
    private $service;

    /**
     * Setup the service.
     */
    protected function setUp()
    {
        parent::setUp();
        $this->service = new ProposalService($this->mockClient(), $this->serializer());
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
            ->with("proposals/33/lines", $this->anything())
            ->willReturn($this->buildResponse('Proposals/addLine'));

        $proposalProduct = new ProposalProduct(2, 4);
        $proposalProduct->setVatRate(6);
        $proposalProduct->setUnitPrice(100);
        $proposalProduct->setDescription('Description');
        $proposalProduct->setDiscount(10);

        $this->service->addProduct(new ResourceId(33), $proposalProduct);
    }
}
