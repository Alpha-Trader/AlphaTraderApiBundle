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
     * @param $page
     * @param $size
     * @param $sort
     * @return \Alphatrader\ApiBundle\Model\Error|\Alphatrader\ApiBundle\Model\PostsPage
     */
    public function getNews($page, $size, $sort)
    {
        return $this->getNewsController()->getNews($page, $size, $sort);
    }

    /**
     * @param $authorId
     * @param $page
     * @param $size
     * @param $sort
     * @return \Alphatrader\ApiBundle\Model\Error|\Alphatrader\ApiBundle\Model\PostsPage
     */
    public function getNewsByAuthor($authorId, $page, $size, $sort)
    {
        return $this->getNewsController()->getNewsByAuthor($authorId, $page, $size, $sort);
    }

    /**
     * @param $companyId
     * @param $page
     * @param $size
     * @param $sort
     * @return \Alphatrader\ApiBundle\Model\Error|\Alphatrader\ApiBundle\Model\PostsPage
     */
    public function getNewsByCompany($companyId, $page, $size, $sort)
    {
        return $this->getNewsController()->getNewsByCompany($companyId, $page, $size, $sort);
    }

    /**
     * @param $hashTag
     * @param $page
     * @param $size
     * @param $sort
     */
    public function getNewsByHashTag($hashTag, $page, $size, $sort)
    {
        return $this->getNewsController()->getNewsByHashTag($hashTag, $page, $size, $sort);
    }

    /**
     * @param $count
     * @return \Alphatrader\ApiBundle\Model\Error|\Alphatrader\ApiBundle\Model\Posts[]
     */
    public function getHotNews($count, $lastPostId = null)
    {
        return $this->getNewsController()->getHotNews($count, $lastPostId);
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
