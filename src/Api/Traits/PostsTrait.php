<?php

namespace Alphatrader\ApiBundle\Api\Traits;

use Alphatrader\ApiBundle\Api\Methods\PostController;

/**
 * Class PostsTrait
 * @package Api\Traits
 * @author ljbergmann <l.bergmann@sky-lab.de>
 */
trait PostsTrait
{
    /**
     * @param $id
     * @return \Alphatrader\ApiBundle\Model\Error|\Alphatrader\ApiBundle\Model\Posts
     */
    public function getPost($id)
    {
        return $this->getPostController()->getPost($id);
    }

    /**
     * @param $title
     * @param $content
     * @param null $locale
     * @param null $companyId
     * @return \Alphatrader\ApiBundle\Model\Error|\Alphatrader\ApiBundle\Model\Posts
     */
    public function newPost($title, $content, $locale = null, $companyId = null)
    {
        return $this->getPostController()->newPost($title, $content, $locale, $companyId);
    }

    /**
     * @param $postId
     * @param $title
     * @param $content
     * @param null $locale
     * @param null $companyId
     * @return \Alphatrader\ApiBundle\Model\Error|\Alphatrader\ApiBundle\Model\Posts
     */
    public function editPost($postId, $title, $content, $locale = null, $companyId = null)
    {
        return $this->getPostController()->editPost($postId, $title, $content, $locale, $companyId);
    }

    /**
     * @param $postId
     * @return \Alphatrader\ApiBundle\Model\Error|\Alphatrader\ApiBundle\Model\MessagePrototype
     */
    public function deletePost($postId)
    {
        return $this->getPostController()->deletePost($postId);
    }

    /**
     * @param $postId
     * @return \Alphatrader\ApiBundle\Model\Error|\Alphatrader\ApiBundle\Model\Posts
     */
    public function getPostComments($postId)
    {
        return $this->getPostController()->getPostComment($postId);
    }

    /**
     * @param $postId
     * @return array
     */
    public function getPostCommentsAsArray($postId)
    {
        return $this->getPostController()->getPostCommentsAsArray($postId);
    }

    /**
     * @param $postId
     * @param $title
     * @param $content
     * @param null $locale
     * @param null $companyId
     * @return \Alphatrader\ApiBundle\Model\Error|\Alphatrader\ApiBundle\Model\Posts
     */
    public function newPostComment($postId, $title, $content, $locale = null, $companyId = null)
    {
        return $this->getPostController()->newPostComment($postId, $title, $content, $locale, $companyId);
    }

    /**
     * @return PostController
     */
    public function getPostController()
    {
        return new PostController($this->config, $this->jwt);
    }
}
