<?php


namespace Dolibarr\Client\Domain\Product;

use JMS\Serializer\Annotation as JMS;

/**
 * @package Dolibarr\Client\Domain\Product
 */
final class Product
{

    /**
     * @var string
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("id")
     */
    private $id;

    /**
     * @var string|null
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("ref")
     */
    private $reference;

    /**
     * @var string|null
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("ref_ext")
     */
    private $externalReference;

    /**
     * @var string
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("barcode")
     */
    private $barcode;

    /**
     * @var string
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("label")
     */
    private $label;

    /**
     * @var string
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("description")
     */
    private $description;

    /**
     * @var int
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("stock_reel")
     */
    private $realStock;

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string|null
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * @param string|null $reference
     */
    public function setReference($reference)
    {
        $this->reference = $reference;
    }

    /**
     * @return string|null
     */
    public function getExternalReference()
    {
        return $this->externalReference;
    }

    /**
     * @param string|null $externalReference
     */
    public function setExternalReference($externalReference)
    {
        $this->externalReference = $externalReference;
    }

    /**
     * @return string
     */
    public function getBarcode()
    {
        return $this->barcode;
    }

    /**
     * @param string $barcode
     */
    public function setBarcode($barcode)
    {
        $this->barcode = $barcode;
    }

    /**
     * @return string
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * @param string $label
     */
    public function setLabel($label)
    {
        $this->label = $label;
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
     * @return int
     */
    public function getRealStock()
    {
        return $this->realStock;
    }

    /**
     * @param int $realStock
     */
    public function setRealStock($realStock)
    {
        $this->realStock = $realStock;
    }
}
