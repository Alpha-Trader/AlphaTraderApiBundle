<?php

namespace Alphatrader\ApiBundle\Model;

use JMS\Serializer\Annotation;

/**
 * Class AuthorInterest
 * @package Model
 * @author ljbergmann <l.bergmann@sky-lab.de>
 */
class AuthorInterest
{
    use InterestTrait;

    /**
     * @var string
     * @Annotation\Type("string")
     * @Annotation\SerializedName("authorId")
     */
    private $authorId;

    /**
     * @return string
     */
    public function getAuthorId()
    {
        return $this->authorId;
    }

    /**
     * @param string $authorId
     */
    public function setAuthorId($authorId)
    {
        $this->authorId = $authorId;
    }

}