<?php

namespace Alphatrader\ApiBundle\Model;

use JMS\Serializer\Annotation;

/**
 * Class EmploymentAgreementCompactCompany
 *
 * @package                            Alphatrader\ApiBundle\Model
 * @Annotation\ExclusionPolicy("none")
 */
class EmploymentAgreementCompactCompany
{
    use DateTrait;
    /**
     * @Annotation\Type("string")
     * @Annotation\SerializedName("id")
     */
    private $id;

    /**
     * @var CompactCompany
     * @Annotation\Type("Alphatrader\ApiBundle\Model\CompactCompany")
     * @Annotation\SerializedName("company")
     */
    private $company;

    /**
     * @Annotation\Type("float")
     * @Annotation\SerializedName("dailyWage")
     */
    private $dailyWage;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return float
     */
    public function getDailyWage()
    {
        return $this->dailyWage;
    }

    /**
     * @param float $dailyWage
     */
    public function setDailyWage($dailyWage)
    {
        $this->dailyWage = $dailyWage;
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
