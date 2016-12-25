<?php

namespace Alphatrader\ApiBundle\Api\Traits;

use Alphatrader\ApiBundle\Api\Methods\InterestController;

/**
 * Trait InterestTrait
 * @package Api\Traits
 * @author ljbergmann <l.bergmann@sky-lab.de>
 */
trait InterestTrait
{
    /**
     * @param $userId
     * @return \Alphatrader\ApiBundle\Model\AuthorInterest|\Alphatrader\ApiBundle\Model\Error
     */
    public function getMyAuthorInterest($userId)
    {
        return $this->getInterestController()->getMyAuthorInterest($userId);
    }

    /**
     * @param $userId
     * @param $interest
     * @return \Alphatrader\ApiBundle\Model\AuthorInterest|\Alphatrader\ApiBundle\Model\Error
     */
    public function setMyAuthorInterest($userId, $interest)
    {
        return $this->getInterestController()->setMyAuthorInterest($userId, $interest);
    }

    /**
     * @param $companyId
     * @return \Alphatrader\ApiBundle\Model\CompanyInterest|\Alphatrader\ApiBundle\Model\Error
     */
    public function getMyCompanyInterest($companyId)
    {
        return $this->getInterestController()->getMyCompanyInterest($companyId);
    }

    /**
     * @param $companyId
     * @param $interest
     * @return \Alphatrader\ApiBundle\Model\CompanyInterest|\Alphatrader\ApiBundle\Model\Error
     */
    public function setMyCompanyInterest($companyId, $interest)
    {
        return $this->getInterestController()->setMyCompanyInterest($companyId, $interest);
    }

    /**
     * @param $hashTag
     * @return \Alphatrader\ApiBundle\Model\Error|\Alphatrader\ApiBundle\Model\HashTagInterest
     */
    public function getMyHashTagInterest($hashTag)
    {
        return $this->getInterestController()->getMyHashTagInterest($hashTag);
    }

    /**
     * @param $hashTag
     * @param $interest
     * @return \Alphatrader\ApiBundle\Model\Error|\Alphatrader\ApiBundle\Model\HashTagInterest
     */
    public function setMyHashTagInterest($hashTag, $interest)
    {
        return $this->getInterestController()->setMyHashTagInterest($hashTag, $interest);
    }

    /**
     * @return InterestController
     */
    public function getInterestController()
    {
        return new InterestController($this->config, $this->jwt);
    }
}