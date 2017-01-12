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
 * Class PostController
 *
 * @package AlphaTrader\API\Controller
 * @author  ljbergmann <l.bergmann@sky-lab.de>
 */
class PostController extends ApiClient
{
    /**
     * @param $postId
     * @return \Alphatrader\ApiBundle\Model\Error|\Alphatrader\ApiBundle\Model\Posts
     */
    public function getPost($postId)
    {
        $data = $this->get('v2/posts/'.$postId);
        return $this->parseResponse($data, 'Alphatrader\ApiBundle\Model\Posts');
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
        $data = $this->post('v2/posts', [
            'title' => $title,
            'locale' => $locale,
            'companyId' => $companyId
            ], $content);

        return $this->parseResponse($data, 'Alphatrader\ApiBundle\Model\Posts');
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
        $data = $this->put('v2/posts/'.$postId, [
            'title' => $title,
            'locale' => $locale,
            'companyId' => $companyId
            ], $content);

        return $this->parseResponse($data, 'Alphatrader\ApiBundle\Model\Posts');
    }

    /**
     * @param $postId
     * @return \Alphatrader\ApiBundle\Model\Error|\Alphatrader\ApiBundle\Model\MessagePrototype
     */
    public function deletePost($postId)
    {
        $data = $this->delete('v2/posts/'.$postId);
        return $this->parseResponse($data, 'Alphatrader\ApiBundle\Model\MessagePrototype');
    }

    /**
     * @param $postId
     * @return \Alphatrader\ApiBundle\Model\Error|\Alphatrader\ApiBundle\Model\Posts
     */
    public function getPostComment($postId)
    {
        $data = $this->get('v2/posts/'.$postId.'/comments');

        return $this->parseResponse($data, 'Alphatrader\ApiBundle\Model\Posts');
    }

    /**
     * @param $postId
     * @return array
     */
    public function getPostCommentsAsArray($postId)
    {
        $data = $this->get('v2/posts/'.$postId.'/comments');
        return json_decode($data->getBody()->getContents(), true);
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
        $data = $this->post('v2/posts/'.$postId.'/comments', [
            'title' => $title,
            'locale' => $locale,
            'companyId' => $companyId
            ], $content);

        return $this->parseResponse($data, 'Alphatrader\ApiBundle\Model\Posts');
    }
}
