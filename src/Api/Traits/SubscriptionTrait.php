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
    public function deleteSubscription($authorId)
    {
        return $this->getSubscriptionController()->deleteSubscription($authorId);
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
     * @return SubscriptionController
     */
    public function getSubscriptionController()
    {
        return new SubscriptionController($this->config, $this->jwt);
    }
}