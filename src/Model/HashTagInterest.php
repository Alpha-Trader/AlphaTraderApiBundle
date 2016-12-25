<?php

namespace Alphatrader\ApiBundle\Model;

use JMS\Serializer\Annotation;

/**
 * Class HastTagInterest
 * @package Alphatrader\ApiBundle\Model
 * @author ljbergmann <l.bergmann@sky-lab.de>
 */
class HashTagInterest
{
    use InterestTrait;

    /**
     * @var hashTag
     * @Annotation\Type("Alphatrader\ApiBundle\Model\HashTag")
     * @Annotation\SerializedName("hashTag")
     */
    private $hashTag;

    /**
     * @return hashTag
     */
    public function getHashTag()
    {
        return $this->hashTag;
    }

    /**
     * @param hashTag $hashTag
     */
    public function setHashTag($hashTag)
    {
        $this->hashTag = $hashTag;
    }
}
