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
 * Class LikeController
 * @package Alphatrader\ApiBundle\Api\Methods
 * @author ljbergmann <l.bergmann@sky-lab.de>
 */
class LikeController extends ApiClient
{
    /**
     * @param $postId
     * @return \Alphatrader\ApiBundle\Model\Error|\Alphatrader\ApiBundle\Model\PostLike[]
     */
    public function getLikes($postId)
    {
        $data = $this->get("v2/likes/".$postId);
        return $this->parseResponse($data, 'ArrayCollection<Alphatrader\ApiBundle\Model\PostLike>');
    }

    /**
     * @param $postId
     * @return \Alphatrader\ApiBundle\Model\Error|\Alphatrader\ApiBundle\Model\Message
     */
    public function deleteLike($postId)
    {
        $data = $this->delete("v2/my/likes/".$postId);
        return $this->parseResponse($data, 'Alphatrader\ApiBundle\Model\PostLike');
    }

    /**
     * @param $postId
     * @param $type string LIKE|DISLIKE
     * @return \Alphatrader\ApiBundle\Model\Error|\Alphatrader\ApiBundle\Model\Message
     */
    public function setLike($postId, $type)
    {
        $data = $this->put("v2/my/likes/".$postId, array('type' => $type));
        return $this->parseResponse($data, 'Alphatrader\ApiBundle\Model\PostLike');
    }

    /**
     * @param $postId
     * @param $type string LIKE|DISLIKE
     * @return string
     */
    public function setLikeJsonResult($postId, $type)
    {
        $data = $this->put("v2/my/likes/".$postId, array('type' => $type));
        return $data->getBody()->getContents();
    }
}
