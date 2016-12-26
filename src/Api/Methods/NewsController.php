<?php

namespace Alphatrader\ApiBundle\Api\Methods;

use Alphatrader\ApiBundle\Api\ApiClient;

/**
 * Class NewsController
 * @package Api\Methods
 * @author ljbergmann <l.bergmann@sky-lab.de>
 */
class NewsController extends ApiClient
{
    /**
     * @param $count
     * @return \Alphatrader\ApiBundle\Model\Error|\Alphatrader\ApiBundle\Model\Posts[]
     */
    public function getHotNews($count)
    {
        $data = $this->get('/v2/news/hot', ['count' => $count]);
        return $this->parseResponse($data, 'ArrayCollection<Alphatrader\ApiBundle\Model\Posts>');
    }

    /**
     * @param $postId
     * @return \Alphatrader\ApiBundle\Model\Error|mixed
     */
    public function getPost($postId)
    {
        $data = $this->get('/v2/news/'.$postId);
        return $this->parseResponse($data, 'Alphatrader\ApiBundle\Model\Posts');
    }
}
