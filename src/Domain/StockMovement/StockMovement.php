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
     * @JMS\SerializedName("label")
     */
    private $label;

    /**
     * @var string|null
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("label")
     */
    private $inventoryCode;

    /**
     * @var string|null
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("type")
     */
    private $type;

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
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string|null $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }
}
