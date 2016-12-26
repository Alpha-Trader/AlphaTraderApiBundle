<?php

namespace Alphatrader\ApiBundle\Model;

/**
 * Class ListingPage
 * @package Alphatrader\ApiBundle\Model
 * @author ljbergmann <l.bergmann@sky-lab.de>
 */
class ListingPage
{
    use PageTrait;

    /**
     * @var content[]
     * @Annotation\Type("ArrayCollection<Alphatrader\ApiBundle\Model\Listing>")
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
