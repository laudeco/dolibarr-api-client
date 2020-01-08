<?php


namespace Dolibarr\Client\Service;

use Doctrine\Common\Collections\ArrayCollection;
use Dolibarr\Client\Domain\Common\Barcode;
use Dolibarr\Client\Domain\Product\Product;
use Dolibarr\Client\Domain\Product\ProductId;
use Dolibarr\Client\Domain\Product\Type;
use Dolibarr\Client\Domain\Resource\ApiResource;
use Dolibarr\Client\Exception\ApiException;
use Dolibarr\Client\HttpClient\HttpClientInterface;
use JMS\Serializer\SerializerInterface;

/**
 * @package Dolibarr\Client\Service
 */
final class ProductsService extends AbstractService
{

    /**
     * @param HttpClientInterface $httpClient
     * @param SerializerInterface $serializerInterface
     */
    public function __construct(HttpClientInterface $httpClient, SerializerInterface $serializerInterface)
    {
        parent::__construct($httpClient, $serializerInterface, new ApiResource('products'));
    }

    /**
     * @param Barcode $barcode
     *
     * @return ArrayCollection|Product[]
     *
     * @throws ApiException
     */
    public function getByBarcode(Barcode $barcode)
    {
        $resources = $this->getList(['query' => [
            'sqlfilters' => 'barcode='.$barcode->barcode()
        ]]);

        return $this->deserializeCollection($resources, Product::class);
    }

    /**
     * @param ProductId $productId
     *
     * @return Product
     *
     * @throws ApiException
     */
    public function getById(ProductId $productId)
    {
        $resource = $this->get($productId->getId());

        return $this->deserialize($resource, Product::class);
    }

    /**
     * @param int       $page
     * @param int       $limit
     * @param Type|null $mode
     *
     * @return ArrayCollection|Product[]
     *
     * @throws ApiException
     */
    public function getAll($page, $limit, Type $mode = null)
    {
        if (!$mode) {
            $mode = Type::all();
        }

        $resources = $this->getList([
            'query' => [
                'limit' => $limit,
                'page'  => $page,
                'mode'  => $mode->getValue(),
            ]
        ]);

        return $this->deserializeCollection($resources, Product::class);
    }
}
