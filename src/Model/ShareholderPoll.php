<?php

namespace Alphatrader\ApiBundle\Model;

use Doctrine\Common\Collections\ArrayCollection;
use JMS\Serializer\Annotation;

/**
 * Class ShareholderPoll
 * @package Alphatrader\ApiBundle\Model
 * @author Tr0nYx
 */
class ShareholderPoll
{
    use PollTrait;
    /**
     * @var CompanyName
     * @Annotation\Type("Alphatrader\ApiBundle\Model\CompanyName")
     * @Annotation\SerializedName("company")
     */
    private $company;

    /**
     * @var float
     * @Annotation\Type("float")
     * @Annotation\SerializedName("approvalVotesPercentage")
     */
    private $approvVotesPercent;

    /**
     * @return float
     */
    public function getApprovVotesPercent()
    {
        return $this->approvVotesPercent;
    }

    /**
     * @param float $approvVotesPercent
     */
    public function setApprovVotesPercent($approvVotesPercent)
    {
        $this->approvVotesPercent = $approvVotesPercent;
    }

    /**
     * @return CompanyName
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * @param CompanyName $company
     */
    public function setCompany($company)
    {
        $this->company = $company;
    }
}
