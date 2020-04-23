<?php

namespace Dolibarr\Client\Domain\Thirdparty;

use JMS\Serializer\Annotation as JMS;

/**
 * Thirdparty class.
 *
 * @author Laurent De Coninck <lau.deconinck@gmail.com>
 */
class Thirdparty
{

    /**
     * @var int
     * @JMS\Type("int")
     */
    private $id;

    /**
     * @var string
     *
     * @JMS\Type("string")
     */
    private $name;

    /**
     * @var string
     *
     * @JMS\Type("string")
     */
    private $nameAlias;

    /**
     * @var bool|null
     *
     * @JMS\Type("boolean")
     */
    private $entity;

    /**
     * Is in activity or not. (Open / Close in Dolibarr).
     *
     * @var bool
     *
     * @JMS\SerializedName("status")
     * @JMS\Type("boolean")
     */
    private $activity;

    /**
     * @var int
     *
     * @JMS\SerializedName("client")
     * @JMS\Type("integer")
     */
    private $type;

    /**
     * @var string
     *
     * @JMS\Type("string")
     */
    private $address;

    /**
     * @var string
     *
     * @JMS\Type("string")
     */
    private $zip;

    /**
     * @var string
     *
     * @JMS\Type("string")
     */
    private $town;

    /**
     * @var string
     *
     * @JMS\Type("string")
     */
    private $email;

    /**
     * @var string
     *
     * @JMS\Type("string")
     */
    private $phone;

    /**
     * @var string
     *
     * @JMS\Type("string")
     */
    private $fax;

    /**
     * @var string
     *
     * @JMS\Type("string")
     */
    private $twitter;

    /**
     * @var string
     *
     * @JMS\Type("string")
     */
    private $facebook;

    /**
     * @var bool
     *
     * @JMS\Type("boolean")
     */
    private $tva_assuj;

    /**
     * @var string
     *
     * @JMS\Type("string")
     */
    private $tvaIntra;

    /**
     * @var string
     *
     * @JMS\SerializedName("ref_ext")
     * @JMS\Type("string")
     */
    private $externalId;

    /**
     * @var string
     *
     * @JMS\Type("string")
     */
    private $defaultLang;

    /**
     * @var string
     *
     * @JMS\Type("string")
     */
    private $codeClient;

    /**
     * @var string
     *
     * @JMS\Type("string")
     */
    private $codeFournisseur;

    public function __construct()
    {
        $this->tva_assuj = false;
        $this->codeClient = -1; //automatically assigned by Dolibarr
        $this->codeFournisseur = -1;  //automatically assigned by Dolibarr
        $this->activity = true; //in activity
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     *
     * @return Thirdparty
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return Thirdparty
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getNameAlias()
    {
        return $this->nameAlias;
    }

    /**
     * @param string $nameAlias
     *
     * @return Thirdparty
     */
    public function setNameAlias($nameAlias)
    {
        $this->nameAlias = $nameAlias;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getEntity()
    {
        return $this->entity;
    }

    /**
     * @param bool|null $entity
     *
     * @return Thirdparty
     */
    public function setEntity($entity)
    {
        $this->entity = $entity;

        return $this;
    }

    /**
     * @return bool
     */
    public function isActivity()
    {
        return $this->activity;
    }

    /**
     * @param bool $activity
     *
     * @return Thirdparty
     */
    public function setActivity($activity)
    {
        $this->activity = $activity;

        return $this;
    }

    /**
     * @return int
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param int $type
     *
     * @return Thirdparty
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
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
     *
     * @return Thirdparty
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
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
     *
     * @return Thirdparty
     */
    public function setZip($zip)
    {
        $this->zip = $zip;

        return $this;
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
     *
     * @return Thirdparty
     */
    public function setTown($town)
    {
        $this->town = $town;

        return $this;
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
     *
     * @return Thirdparty
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
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
     *
     * @return Thirdparty
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * @return string
     */
    public function getFax()
    {
        return $this->fax;
    }

    /**
     * @param string $fax
     *
     * @return Thirdparty
     */
    public function setFax($fax)
    {
        $this->fax = $fax;

        return $this;
    }

    /**
     * @return string
     */
    public function getTwitter()
    {
        return $this->twitter;
    }

    /**
     * @param string $twitter
     *
     * @return Thirdparty
     */
    public function setTwitter($twitter)
    {
        $this->twitter = $twitter;

        return $this;
    }

    /**
     * @return string
     */
    public function getFacebook()
    {
        return $this->facebook;
    }

    /**
     * @param string $facebook
     *
     * @return Thirdparty
     */
    public function setFacebook($facebook)
    {
        $this->facebook = $facebook;

        return $this;
    }

    /**
     * @return bool
     */
    public function isTvaAssuj()
    {
        return $this->tva_assuj;
    }

    /**
     * @param bool $tva_assuj
     *
     * @return Thirdparty
     */
    public function setTvaAssuj($tva_assuj)
    {
        $this->tva_assuj = $tva_assuj;

        return $this;
    }

    /**
     * @return string
     */
    public function getTvaIntra()
    {
        return $this->tvaIntra;
    }

    /**
     * @param string $tvaIntra
     *
     * @return Thirdparty
     */
    public function setTvaIntra($tvaIntra)
    {
        $this->tvaIntra = $tvaIntra;

        return $this;
    }

    /**
     * @return string
     */
    public function getExternalId()
    {
        return $this->externalId;
    }

    /**
     * @param string $externalId
     *
     * @return Thirdparty
     */
    public function setExternalId($externalId)
    {
        $this->externalId = $externalId;

        return $this;
    }

    /**
     * @return string
     */
    public function getDefaultLang()
    {
        return $this->defaultLang;
    }

    /**
     * @param string $defaultLang
     *
     * @return Thirdparty
     */
    public function setDefaultLang($defaultLang)
    {
        $this->defaultLang = $defaultLang;

        return $this;
    }

    /**
     * @return string
     */
    public function getCodeClient()
    {
        return $this->codeClient;
    }

    /**
     * @param string $codeClient
     *
     * @return Thirdparty
     */
    public function setCodeClient($codeClient)
    {
        $this->codeClient = $codeClient;

        return $this;
    }

    /**
     * @return string
     */
    public function getCodeFournisseur()
    {
        return $this->codeFournisseur;
    }

    /**
     * @param string $codeFournisseur
     *
     * @return Thirdparty
     */
    public function setCodeFournisseur($codeFournisseur)
    {
        $this->codeFournisseur = $codeFournisseur;

        return $this;
    }
}
