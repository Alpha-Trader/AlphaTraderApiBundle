<?php

namespace Alphatrader\ApiBundle\Model;

use JMS\Serializer\Annotation;

/**
 * Class EmploymentAgreement
 *
 * @package                            Alphatrader\ApiBundle\Model
 * @Annotation\ExclusionPolicy("none")
 */
class EmploymentAgreement
{
    use DateTrait;
    
    /**
     * @Annotation\Type("string")
     * @Annotation\SerializedName("id")
     */
    private $id;

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
}
