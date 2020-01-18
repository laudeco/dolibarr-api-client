<?php


namespace Dolibarr\Client\Domain\StockMovement;

use JMS\Serializer\Annotation as JMS;

/**
 * @package Dolibarr\Client\Domain\StockMovement
 */
final class StockMovement
{

    /**
     * @var string
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("product_id")
     */
    private $productId;

    /**
     * @var string
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("warehouse_id")
     */
    private $warehouseId;

    /**
     * @var int
     *
     * @JMS\Type("integer")
     * @JMS\SerializedName("qty")
     */
    private $quantity;

    /**
     * @var string|null
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("movementlabel")
     */
    private $label;

    /**
     * @var string|null
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("movementcode")
     */
    private $inventoryCode;

    /**
     * @var string|null
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("lot")
     */
    private $lot;

    /**
     * @JMS\Type("DateTimeImmutable<'Y-m-d'>")
     * @JMS\SerializedName("dlc")
     *
     * @var \DateTimeImmutable|null
     */
    private $dlc;

    /**
     * @JMS\Type("DateTimeImmutable<'Y-m-d'>")
     * @JMS\SerializedName("dluo")
     *
     * @var \DateTimeImmutable|null
     */
    private $dluo;


    /**
     * @return string
     */
    public function getProductId()
    {
        return $this->productId;
    }

    /**
     * @param string $productId
     */
    public function setProductId($productId)
    {
        $this->productId = $productId;
    }

    /**
     * @return string
     */
    public function getWarehouseId()
    {
        return $this->warehouseId;
    }

    /**
     * @param string $warehouseId
     */
    public function setWarehouseId($warehouseId)
    {
        $this->warehouseId = $warehouseId;
    }

    /**
     * @return int
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param int $quantity
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }

    /**
     * @return string|null
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * @param string|null $label
     */
    public function setLabel($label)
    {
        $this->label = $label;
    }

    /**
     * @return string|null
     */
    public function getInventoryCode()
    {
        return $this->inventoryCode;
    }

    /**
     * @param string|null $inventoryCode
     */
    public function setInventoryCode($inventoryCode)
    {
        $this->inventoryCode = $inventoryCode;
    }

    /**
     * @return string|null
     */
    public function getLot()
    {
        return $this->lot;
    }

    /**
     * @param string|null $lot
     */
    public function setLot($lot)
    {
        $this->lot = $lot;
    }

    /**
     * @return \DateTimeImmutable|null
     */
    public function getDlc()
    {
        return $this->dlc;
    }

    /**
     * @param \DateTimeImmutable|null $dlc
     */
    public function setDlc(\DateTimeImmutable $dlc)
    {
        $this->dlc = $dlc;
    }

    /**
     * @return \DateTimeImmutable|null
     */
    public function getDluo()
    {
        return $this->dluo;
    }

    /**
     * @param \DateTimeImmutable|null $dluo
     */
    public function setDluo(\DateTimeImmutable $dluo)
    {
        $this->dluo = $dluo;
    }
}
