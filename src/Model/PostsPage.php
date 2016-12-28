<?php

namespace Alphatrader\ApiBundle\Model;

/**
 * Class PostsPage
 * @package Alphatrader\ApiBundle\Model
 * @author ljbergmann <l.bergmann@sky-lab.de>
 */
class PostsPage
{
    use PageTrait;
    /**
     * @var content[]
     * @Annotation\Type("ArrayCollection<Alphatrader\ApiBundle\Model\Posts>")
     * @Annotation\SerializedName("content")
     */
    private $content;

    /**
     * @return content[]
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param content[] $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }
}
