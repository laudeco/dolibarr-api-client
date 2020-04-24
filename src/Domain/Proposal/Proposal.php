<?php


namespace Dolibarr\Client\Domain\Proposal;

use JMS\Serializer\Annotation as JMS;
use Webmozart\Assert\Assert;

/**
 * @author Laurent De Coninck <lau.deconinck@gmail.com>
 */
class Proposal
{

    /**
     * @var int
     *
     * @JMS\Type("int")
     * @JMS\SerializedName("socid")
     */
    private $companyId;

    /**
     * @var int
     *
     * @JMS\Type("int")
     * @JMS\SerializedName("contactid")
     */
    private $contactId;

    /**
     * Timestamp of the delivery date.
     *
     * @JMS\Type("DateTime<'Y-m-d'>")
     * @JMS\SerializedName("date_livraison")
     *
     * @var int
     */
    private $deliveryDate;

    /**
     * @JMS\Type("int")
     * @JMS\SerializedName("user_author_id")
     *
     * @var
     */
    private $authorId;

    /**
     * @var int
     *
     * @JMS\Type("int")
     * @JMS\SerializedName("demand_reason_id")
     */
    private $origin;

    /**
     * @JMS\Type("int")
     * @JMS\SerializedName("cond_reglement_code")
     *
     * @var int
     */
    private $salesCondition;

    /**
     * @JMS\Type("int")
     * @JMS\SerializedName("mode_reglement_code")
     *
     * @var int
     */
    private $payementMethod;

    /**
     * @var \DateTime|null
     *
     * @JMS\Type("DateTime<'Y-m-d'>")
     * @JMS\SerializedName("date")
     */
    private $date;

    /**
     * @param int            $companyId
     * @param \DateTime|null $date
     */
    public function __construct($companyId, \DateTime $date = null)
    {
        Assert::integer($companyId);
        Assert::greaterThan($companyId, 0);

        if ($date === null) {
            $date = new \DateTime();
        }

        $this->date = $date;
        $this->companyId = $companyId;
    }

    /**
     * @return int
     */
    public function getCompanyId()
    {
        return $this->companyId;
    }

    /**
     * @param int $companyId
     */
    public function setCompanyId($companyId)
    {
        $this->companyId = $companyId;
    }

    /**
     * @return int
     */
    public function getContactId()
    {
        return $this->contactId;
    }

    /**
     * @param int $contactId
     */
    public function setContactId($contactId)
    {
        $this->contactId = $contactId;
    }

    /**
     * @return int
     */
    public function getDeliveryDate()
    {
        return $this->deliveryDate;
    }

    /**
     * @param int $deliveryDate
     */
    public function setDeliveryDate($deliveryDate)
    {
        $this->deliveryDate = $deliveryDate;
    }

    /**
     * @return mixed
     */
    public function getAuthorId()
    {
        return $this->authorId;
    }

    /**
     * @param mixed $authorId
     */
    public function setAuthorId($authorId)
    {
        $this->authorId = $authorId;
    }

    /**
     * @return int
     */
    public function getOrigin()
    {
        return $this->origin;
    }

    /**
     * @param int $origin
     */
    public function setOrigin($origin)
    {
        $this->origin = $origin;
    }

    /**
     * @return int
     */
    public function getSalesCondition()
    {
        return $this->salesCondition;
    }

    /**
     * @param int $salesCondition
     */
    public function setSalesCondition($salesCondition)
    {
        $this->salesCondition = $salesCondition;
    }

    /**
     * @return int
     */
    public function getPayementMethod()
    {
        return $this->payementMethod;
    }

    /**
     * @param int $payementMethod
     */
    public function setPayementMethod($payementMethod)
    {
        $this->payementMethod = $payementMethod;
    }
}
