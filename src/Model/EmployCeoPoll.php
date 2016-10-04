<?php

namespace Alphatrader\ApiBundle\Model;

use JMS\Serializer\Annotation;

/**
 * Class EmployCeoPoll
 * @package Alphatrader\ApiBundle\Model
 * @author Tr0nYx
 */
class EmployCeoPoll extends ShareholderPoll
{
    /**
     * @var UserName
     * @Annotation\Type("Alphatrader\ApiBundle\Model\UserName")
     * @Annotation\SerializedName("applicant")
     */
    protected $applicant;

    /**
     * @var float
     * @Annotation\Type("float")
     * @Annotation\SerializedName("dailyWage")
     */
    private $dailyWage;

    /**
     * @return UserName
     */
    public function getApplicant()
    {
        return $this->applicant;
    }

    /**
     * @param UserName $applicant
     */
    public function setApplicant($applicant)
    {
        $this->applicant = $applicant;
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
