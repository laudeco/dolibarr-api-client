<?php

namespace Dolibarr\Client\Domain\Warehouse;

use JMS\Serializer\Annotation as JMS;

/**
 * @author Laurent De Coninck <lau.deconinck@gmail.com>
 */
final class Warehouse
{
    /**
     * @var string|null
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("id")
     */
    private $id;

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
     * @JMS\SerializedName("description")
     */
    private $description;

    /**
     * @var string|null
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("statut")
     */
    private $statut;

    /**
     * @var string|null
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("lieu")
     */
    private $lieu;

    /**
     * @var string|null
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("address")
     */
    private $address;

    /**
     * @var string|null
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("zip")
     */
    private $zip;

    /**
     * @var string|null
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("town")
     */
    private $town;

    /**
     * @var string|null
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("fk_parent")
     */
    private $fkParent;

    /**
     * @var string|null
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("ref")
     */
    private $ref;

    /**
     * @var string|null
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("ref_ext")
     */
    private $refExt;

    /**
     * @var string|null
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("country")
     */
    private $country;

    /**
     * @var string|null
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("country_id")
     */
    private $countryId;

    /**
     * @var string|null
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("country_code")
     */
    private $countryCode;

    /**
     * @return string|null
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string|null $id
     */
    public function setId($id)
    {
        $this->id = $id;
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
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string|null $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return string|null
     */
    public function getStatut()
    {
        return $this->statut;
    }

    /**
     * @param string|null $statut
     */
    public function setStatut($statut)
    {
        $this->statut = $statut;
    }

    /**
     * @return string|null
     */
    public function getLieu()
    {
        return $this->lieu;
    }

    /**
     * @param string|null $lieu
     */
    public function setLieu($lieu)
    {
        $this->lieu = $lieu;
    }

    /**
     * @return string|null
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param string|null $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * @return string|null
     */
    public function getZip()
    {
        return $this->zip;
    }

    /**
     * @param string|null $zip
     */
    public function setZip($zip)
    {
        $this->zip = $zip;
    }

    /**
     * @return string|null
     */
    public function getTown()
    {
        return $this->town;
    }

    /**
     * @param string|null $town
     */
    public function setTown($town)
    {
        $this->town = $town;
    }

    /**
     * @return string|null
     */
    public function getFkParent()
    {
        return $this->fkParent;
    }

    /**
     * @param string|null $fkParent
     */
    public function setFkParent($fkParent)
    {
        $this->fkParent = $fkParent;
    }

    /**
     * @return string|null
     */
    public function getRef()
    {
        return $this->ref;
    }

    /**
     * @param string|null $ref
     */
    public function setRef($ref)
    {
        $this->ref = $ref;
    }

    /**
     * @return string|null
     */
    public function getRefExt()
    {
        return $this->refExt;
    }

    /**
     * @param string|null $refExt
     */
    public function setRefExt($refExt)
    {
        $this->refExt = $refExt;
    }

    /**
     * @return string|null
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param string|null $country
     */
    public function setCountry($country)
    {
        $this->country = $country;
    }

    /**
     * @return string|null
     */
    public function getCountryId()
    {
        return $this->countryId;
    }

    /**
     * @param string|null $countryId
     */
    public function setCountryId($countryId)
    {
        $this->countryId = $countryId;
    }

    /**
     * @return string|null
     */
    public function getCountryCode()
    {
        return $this->countryCode;
    }

    /**
     * @param string|null $countryCode
     */
    public function setCountryCode($countryCode)
    {
        $this->countryCode = $countryCode;
    }
}
