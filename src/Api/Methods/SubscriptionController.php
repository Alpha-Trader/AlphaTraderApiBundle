<?php
/*
 * This file is part of the AlphaTraderApiBundle package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Alphatrader\ApiBundle\Api\Methods;

use Alphatrader\ApiBundle\Api\ApiClient;

/**
 * Class SubscriptionController
 * @package Api\Methods
 * @author ljbergmann <l.bergmann@sky-lab.de>
 */
class SubscriptionController extends ApiClient
{
    /**
     * @param authorId
     * @return \Alphatrader\ApiBundle\Model\Error|\Alphatrader\ApiBundle\Model\AuthorInterest
     */
    public function deleteSubscription($authorId)
    {
        $data = $this->delete("v2/my/subscriptions/authors/".$authorId);
        return $this->parseResponse($data, 'Alphatrader\ApiBundle\Model\AuthorInterest');
    }
    /**
     * @param $authorId
     * @param $action
     * @return \Alphatrader\ApiBundle\Model\Error|\Alphatrader\ApiBundle\Model\AuthorInterest
     */
    public function setAuthorSubscriptionStatus($authorId, $action)
    {
        $data = $this->put("v2/my/subscriptions/authors/".$authorId, array('action' => $action));
        return $this->parseResponse($data, 'Alphatrader\ApiBundle\Model\AuthorInterest');
    }
}
