<?php
/**
 * Created by IntelliJ IDEA.
 * User: ljb
 * Date: 09.12.16
 * Time: 12:03
 */

namespace Alphatrader\ApiBundle\Model;

use JMS\Serializer\Annotation;

class PriceSpreadPage
{
    use PageTrait;

    /**
     * @var content[]
     * @Annotation\Type("ArrayCollection<Alphatrader\ApiBundle\Model\PriceSpreadListing>")
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
