<?php

namespace Alphatrader\ApiBundle\Model;

use JMS\Serializer\Annotation;

/**
 * Class EmployCeoPoll
 * @package Alphatrader\ApiBundle\Model
 * @author Tr0nYx
 */
class EmployCeoPoll extends AbstractPoll
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
     * @Annotation\SerializedName("approvalVotesPercentage")
     */
    private $approvVotesPercent;

    /**
     * @var CompanyCompactProfile
     * @Annotation\Type("Alphatrader\ApiBundle\Model\CompanyCompactProfile")
     * @Annotation\SerializedName("company")
     */
    private $company;

    /**
     * @var float
     * @Annotation\Type("float")
     * @Annotation\SerializedName("dailyWage")
     */
    private $dailyWage;
    
    /**
     * @return float
     */
    public function getApprovalVotesPercentage()
    {
        return $this->approvVotesPercent;
    }

    /**
     * @param float $approvVotesPercent
     */
    public function setApprovalVotesPercentage($approvVotesPercent)
    {
        $this->approvVotesPercent = $approvVotesPercent;
    }

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
     * @return CompanyCompactProfile
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * @param CompanyCompactProfile $company
     */
    public function setCompany($company)
    {
        $this->company = $company;
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
