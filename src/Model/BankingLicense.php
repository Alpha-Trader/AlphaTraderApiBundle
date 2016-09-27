<?php

namespace Alphatrader\ApiBundle\Model;

use JMS\Serializer\Annotation;

/**
 * Class BankingLicense
 * @package Alphatrader\ApiBundle\Model
 * @Annotation\ExclusionPolicy("none")
 */
class BankingLicense
{
    use DateTrait;
    
    /**
     * @Annotation\Type("string")
     * @Annotation\SerializedName("id")
     */
    private $id;

    /**
     * @Annotation\Type("Alphatrader\ApiBundle\Model\CompactCompany")
     * @Annotation\SerializedName("company")
     */
    private $company;

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
     * @return CompactCompany
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * @param CompactCompany $company
     */
    public function setCompany($company)
    {
        $this->company = $company;
    }
}
