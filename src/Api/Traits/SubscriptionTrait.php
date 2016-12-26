<?php
/*
 * This file is part of the AlphaTraderApiBundle package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Alphatrader\ApiBundle\Api\Traits;

use Alphatrader\ApiBundle\Api\Methods\SubscriptionController;

/**
 * Trait SubscriptionTrait
 * @package Alphatrader\ApiBundle\Api\Traits
 * @author ljbergmann <l.bergmann@sky-lab.de>
 */
trait SubscriptionTrait
{
    /**
     * @param $authorId
     * @return \Alphatrader\ApiBundle\Model\AuthorInterest|\Alphatrader\ApiBundle\Model\Error
     */
    public function deleteAuthorSubscription($authorId)
    {
        return $this->getSubscriptionController()->deleteAuthorSubscription($authorId);
    }

    /**
     * @param $authorId
     * @param $action
     * @return \Alphatrader\ApiBundle\Model\AuthorInterest|\Alphatrader\ApiBundle\Model\Error
     */
    public function setAuthorSubscription($authorId, $action)
    {
        return $this->getSubscriptionController()->setAuthorSubscriptionStatus($authorId, $action);
    }

    /**
     * @param $companyId
     * @return \Alphatrader\ApiBundle\Model\CompanyInterest|\Alphatrader\ApiBundle\Model\Error
     */
    public function deleteCompanySubscription($companyId)
    {
        return $this->getSubscriptionController()->deleteCompanySubscription($companyId);
    }

    /**
     * @param $companyId
     * @param $action
     * @return \Alphatrader\ApiBundle\Model\CompanyInterest|\Alphatrader\ApiBundle\Model\Error
     */
    public function setCompanySubscription($companyId, $action)
    {
        return $this->getSubscriptionController()->setAuthorSubscriptionStatus($companyId, $action);
    }

    /**
     * @return SubscriptionController
     */
    public function getSubscriptionController()
    {
        return new SubscriptionController($this->config, $this->jwt);
    }
}
