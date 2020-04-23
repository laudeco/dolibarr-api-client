<?php


namespace Dolibarr\Client\Domain\Contact;

use JMS\Serializer\Annotation as JMS;
use Webmozart\Assert\Assert;

final class Contact
{
    /**
     * @var string
     * @JMS\Type("string")
     */
    private $lastname;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $firstname;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $civilityCode;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $address;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $zip;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $town;

    /**
     * @var integer
     *
     * @JMS\SerializedName("socid")
     * @JMS\Type("int")
     */
    private $companyId;

    /**
     * @var boolean
     *
     * @JMS\SerializedName("status")
     * @JMS\Type("int")
     */
    private $enable;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $email;

    /**
     * @var string
     * @JMS\SerializedName("phone_peso")
     * @JMS\Type("string")
     */
    private $phone;

    /**
     * @var string
     *
     * @JMS\SerializedName("ref_ext")
     * @JMS\Type("string")
     */
    private $externalReference;

    /**
     * @param string $lastname
     */
    public function __construct($lastname)
    {
        Assert::stringNotEmpty($lastname);
        $this->lastname = $lastname;
    }

    /**
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * @param string $lastname
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    }

    /**
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * @param string $firstname
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    }

    /**
     * @return string
     */
    public function getCivilityCode()
    {
        return $this->civilityCode;
    }

    /**
     * @param string $civilityCode
     */
    public function setCivilityCode($civilityCode)
    {
        $this->civilityCode = $civilityCode;
    }

    /**
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param string $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * @return string
     */
    public function getZip()
    {
        return $this->zip;
    }

    /**
     * @param string $zip
     */
    public function setZip($zip)
    {
        $this->zip = $zip;
    }

    /**
     * @return string
     */
    public function getTown()
    {
        return $this->town;
    }

    /**
     * @param string $town
     */
    public function setTown($town)
    {
        $this->town = $town;
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
     * @return bool
     */
    public function isEnable()
    {
        return $this->enable;
    }

    /**
     * @param bool $enable
     */
    public function setEnable($enable)
    {
        $this->enable = $enable;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * @return string
     */
    public function getExternalReference()
    {
        return $this->externalReference;
    }

    /**
     * @param string $externalReference
     */
    public function setExternalReference($externalReference)
    {
        $this->externalReference = $externalReference;
    }
}
