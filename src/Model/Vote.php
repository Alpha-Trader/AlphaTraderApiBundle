<?php

namespace Alphatrader\ApiBundle\Model;

use JMS\Serializer\Annotation;

/**
 * Class Vote
 *
 * @package                            Alphatrader\ApiBundle\Model
 * @Annotation\ExclusionPolicy("none")
 */
class Vote
{
    /**
     * @Annotation\Type("string")
     * @Annotation\SerializedName("type")
     */
    protected $type;
    /**
     * @Annotation\Type("integer")
     * @Annotation\SerializedName("voices")
     */
    protected $voices;

    /**
     * @var UserName
     * @Annotation\Type("Alphatrader\ApiBundle\Model\UserName")
     * @Annotation\SerializedName("voter")
     */
    protected $voter;

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getVoices()
    {
        return $this->voices;
    }

    /**
     * @param mixed $voices
     */
    public function setVoices($voices)
    {
        $this->voices = $voices;
    }

    /**
     * @return UserName
     */
    public function getVoter()
    {
        return $this->voter;
    }

    /**
     * @param UserName $voter
     */
    public function setVoter($voter)
    {
        $this->voter = $voter;
    }
}
