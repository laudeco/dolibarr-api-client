<?php


namespace Dolibarr\Client\Domain\Proposal;

use JMS\Serializer\Annotation as JMS;

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
     * @JMS\SerializedName("demand_reason_id")
     */
    private $origin;

    /**
     * @var \DateTime
     *
     * @JMS\Type("DateTime")
     */
    private $date;

    /**
     * @var
     */
    private $salesCondition;

    /**
     * @var int
     */
    private $payementMethod;

    /**
     * @param int $companyId
     *
     * @return Proposal
     */
    public function setCompanyId($companyId)
    {
        $this->companyId = $companyId;

        return $this;
    }

    /**
     * @param int $origin
     *
     * @return Proposal
     */
    public function setOrigin($origin)
    {
        $this->origin = $origin;

        return $this;
    }

    /**
     * @param \DateTime $date
     *
     * @return Proposal
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * @return int
     */
    public function getCompanyId()
    {
        return $this->companyId;
    }

    /**
     * @return int
     */
    public function getOrigin()
    {
        return $this->origin;
    }

    /**
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }
}
