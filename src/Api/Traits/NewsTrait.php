<?php

namespace Alphatrader\ApiBundle\Api\Traits;

use Alphatrader\ApiBundle\Api\Methods\NewsController;

/**
 * Trait NewsTrait
 * @package Api\Traits
 * @author ljbergmann <l.bergmann@sky-lab.de>
 */
trait NewsTrait
{
    /**
     * @param $count
     * @return \Alphatrader\ApiBundle\Model\Error|\Alphatrader\ApiBundle\Model\Posts[]
     */
    public function getHotNews($count)
    {
        return $this->getNewsController()->getHotNews($count);
    }

    /**
     * @param $postId
     * @return \Alphatrader\ApiBundle\Model\Error|mixed
     */
    public function getNewsPost($postId)
    {
        return $this->getNewsController()->getPost($postId);
    }

    /**
     * @return NewsController
     */
    public function getNewsController()
    {
        return new NewsController($this->config, $this->jwt);
    }
}