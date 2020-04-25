<?php


namespace Dolibarr\Client\Domain\Proposal;

use Dolibarr\Client\Domain\Product\Product;
use JMS\Serializer\Annotation as JMS;
use Webmozart\Assert\Assert;

final class ProposalProduct
{
    /**
     * @var string
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("desc")
     */
    private $description;

    /**
     * Unit price.
     *
     * @var float
     *
     * @JMS\Type("float")
     * @JMS\SerializedName("subprice")
     */
    private $unitPrice;

    /**
     * @var float
     *
     * @JMS\Type("float")
     * @JMS\SerializedName("qty")
     */
    private $quantity;

    /**
     * @var float
     *
     * @JMS\Type("float")
     * @JMS\SerializedName("tva_tx")
     */
    private $vatRate;

    /**
     * @var int
     *
     * @JMS\Type("int")
     * @JMS\SerializedName("fk_product")
     */
    private $productId;

    /**
     * @var float
     *
     * @JMS\Type("float")
     * @JMS\SerializedName("remise_percent")
     */
    private $discount;

    /**
     * @param float $quantity
     * @param int   $productId
     */
    public function __construct($quantity, $productId)
    {
        Assert::greaterThan($quantity, 0);
        Assert::greaterThan($productId, 0);
        Assert::integerish($productId);

        $this->quantity = $quantity;
        $this->productId = (int)$productId;
    }

    public static function create(Quantity $quantity, Product $product)
    {
        $proposalProduct = new self($quantity->getQuantity(), $product->getId());
        $proposalProduct->setUnitPrice($product->getPriceHt());
        $proposalProduct->setVatRate($product->getRateVat());

        return $proposalProduct;
    }


    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return float
     */
    public function getUnitPrice()
    {
        return $this->unitPrice;
    }

    /**
     * @param float $unitPrice
     */
    public function setUnitPrice($unitPrice)
    {
        $this->unitPrice = $unitPrice;
    }

    /**
     * @return float
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param float $quantity
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }

    /**
     * @return float
     */
    public function getVatRate()
    {
        return $this->vatRate;
    }

    /**
     * @param float $vatRate
     */
    public function setVatRate($vatRate)
    {
        $this->vatRate = $vatRate;
    }

    /**
     * @return int
     */
    public function getProductId()
    {
        return $this->productId;
    }

    /**
     * @param int $productId
     */
    public function setProductId($productId)
    {
        $this->productId = $productId;
    }

    /**
     * @return float
     */
    public function getDiscount()
    {
        return $this->discount;
    }

    /**
     * @param float $discount
     */
    public function setDiscount($discount)
    {
        $this->discount = $discount;
    }
}
