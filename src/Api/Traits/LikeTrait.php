<?php
/*
 * This file is part of the AlphaTraderApiBundle package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Alphatrader\ApiBundle\Api\Traits;

use Alphatrader\ApiBundle\Api\Methods\LikeController;

/**
 * Trait LikeTrait
 * @package Api\Traits
 * @author ljbergmann <l.bergmann@sky-lab.de>
 */
trait LikeTrait
{
    /**
     * @param $postId
     * @return \Alphatrader\ApiBundle\Model\Error|\Alphatrader\ApiBundle\Model\PostLike[]
     */
    public function getLikes($postId)
    {
        return $this->getLikeController()->getLikes($postId);
    }

    /**
     * @param $postId string
     * @param $type string LIKE|DISLIKE
     * @return \Alphatrader\ApiBundle\Model\Error|\Alphatrader\ApiBundle\Model\Message
     */
    public function setLike($postId, $type)
    {
        return $this->getLikeController()->setLike($postId, $type);
    }

    /**
     * @param $postId
     * @return \Alphatrader\ApiBundle\Model\Error|\Alphatrader\ApiBundle\Model\Message
     */
    public function deleteLike($postId)
    {
        return $this->getLikeController()->deleteLike($postId);
    }

    /**
     * @return LikeController
     */
    public function getLikeController()
    {
        return new LikeController($this->config, $this->jwt);
    }
}
