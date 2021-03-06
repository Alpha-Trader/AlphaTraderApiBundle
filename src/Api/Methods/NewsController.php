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
     * @param $page
     * @param $size
     * @param $sort
     * @return \Alphatrader\ApiBundle\Model\Error|\Alphatrader\ApiBundle\Model\PostsPage
     */
    public function getNews($page, $size, $sort)
    {
        $data = $this->get("v2/news", [
            'page' => $page,
            'size' => $size,
            'sort' => $sort
        ]);

        return $this->parseResponse($data, 'Alphatrader\ApiBundle\Model\PostsPage');
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
        $data = $this->get('v2/authors/'.$authorId."/news", [
            'page' => $page,
            'size' => $size,
            'sort' => $sort
        ]);

        return $this->parseResponse($data, 'Alphatrader\ApiBundle\Model\PostsPage');
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
        $data = $this->get('v2/companies/'.$companyId."/news", [
            'page' => $page,
            'size' => $size,
            'sort' => $sort
        ]);

        return $this->parseResponse($data, 'Alphatrader\ApiBundle\Model\PostsPage');
    }

    /**
     * @param $hashTag
     * @param $page
     * @param $size
     * @param $sort
     * @return \Alphatrader\ApiBundle\Model\Error|\Alphatrader\ApiBundle\Model\PostsPage
     */
    public function getNewsByHashTag($hashTag, $page, $size, $sort)
    {
        $data = $this->get('v2/hashtags/'.$hashTag."/news", [
            'page' => $page,
            'size' => $size,
            'sort' => $sort
        ]);

        return $this->parseResponse($data, 'Alphatrader\ApiBundle\Model\PostsPage');
    }

    /**
     * @param $count
     * @return \Alphatrader\ApiBundle\Model\Error|\Alphatrader\ApiBundle\Model\Posts[]
     */
    public function getHotNews($count, $lastPostId)
    {
        $data = $this->get('v2/news/hot', [
            'count' => $count,
            'lastPostId' => $lastPostId
        ]);
        return $this->parseResponse($data, 'ArrayCollection<Alphatrader\ApiBundle\Model\Posts>');
    }

    /**
     * @param $postId
     * @return \Alphatrader\ApiBundle\Model\Error|mixed
     */
    public function getPost($postId)
    {
        $data = $this->get('v2/news/'.$postId);
        return $this->parseResponse($data, 'Alphatrader\ApiBundle\Model\Posts');
    }
}
