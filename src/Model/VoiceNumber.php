<?php

namespace Alphatrader\ApiBundle\Model;

use JMS\Serializer\Annotation;

/**
 * Class VoiceNumber
 *
 * @package                            Alphatrader\ApiBundle\Model
 * @Annotation\ExclusionPolicy("none")
 */
class VoiceNumber
{
    /**
     * @var UserName
     * @Annotation\Type("Alphatrader\ApiBundle\Model\UserName")
     * @Annotation\SerializedName("groupMember")
     */
    protected $groupMember;
    /**
     * @Annotation\Type("integer")
     * @Annotation\SerializedName("numberOfVoices")
     */
    protected $numberOfVoices;

    /**
     * @return UserName
     */
    public function getGroupMember()
    {
        return $this->groupMember;
    }

    /**
     * @param UserName $groupMember
     */
    public function setGroupMember($groupMember)
    {
        $this->groupMember = $groupMember;
    }

    /**
     * @return mixed
     */
    public function getNumberOfVoices()
    {
        return $this->numberOfVoices;
    }

    /**
     * @param mixed $numberOfVoices
     */
    public function setNumberOfVoices($numberOfVoices)
    {
        $this->numberOfVoices = $numberOfVoices;
    }
}
