<?php

namespace Alphatrader\ApiBundle\Model;

use Doctrine\Common\Collections\ArrayCollection;
use JMS\Serializer\Annotation;

/**
 * Class Page
 *
 * @package Alphatrader\ApiBundle\Model
 * @Annotation\ExclusionPolicy("none")
 */
class CompanyPage
{
    use PageTrait;

    /**
     * @var content[]
     * @Annotation\Type("ArrayCollection<Alphatrader\ApiBundle\Model\Company>")
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
