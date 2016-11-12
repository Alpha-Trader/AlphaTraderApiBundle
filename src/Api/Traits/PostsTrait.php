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
        return $this->getPostController()->getPostById($id);
    }
    
    /**
     * @return PostController
     */
    public function getPostController()
    {
        return new PostController($this->config, $this->jwt);
    }
}