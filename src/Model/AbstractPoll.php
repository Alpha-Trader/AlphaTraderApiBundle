<?php

namespace Alphatrader\ApiBundle\Model;

use Doctrine\Common\Collections\ArrayCollection;
use JMS\Serializer\Annotation;

/**
 * Class UserProfile
 * @package Alphatrader\ApiBundle\Model
 * @author Tr0nYx
 */
class AbstractPoll
{
    use DateTrait;
    
    /**
     * @var string
     * @Annotation\Type("string")
     * @Annotation\SerializedName("id")
     */
    private $id;

    /**
     * @var string
     * @Annotation\Type("string")
     * @Annotation\SerializedName("abstentionRule")
     */
    private $abstentionRule;

    /**
     * @var float
     * @Annotation\Type("float")
     * @Annotation\SerializedName("castVotesPercentage")
     */
    private $castVotesPercentage;

    /**
     * @var VoiceNumber[]
     * @Annotation\Type("ArrayCollection<Alphatrader\ApiBundle\Model\VoiceNumber>")
     * @Annotation\SerializedName("group")
     */
    private $group;

    /**
     * @var string
     * @Annotation\Type("string")
     * @Annotation\SerializedName("motion")
     */
    private $motion;

    /**
     * @var UserName
     * @Annotation\Type("Alphatrader\ApiBundle\Model\UserName")
     * @Annotation\SerializedName("pollInitiator")
     */
    private $pollInitiator;

    /**
     * @var integer
     * @Annotation\Type("integer")
     * @Annotation\SerializedName("resultExpireDate")
     */
    private $resultExpireDate;

    /**
     * @var int
     * @Annotation\Type("integer")
     * @Annotation\SerializedName("totalNumberOfCastVotes")
     */
    private $totalNumberOfVotes;

    /**
     * @var int
     * @Annotation\Type("integer")
     * @Annotation\SerializedName("totalNumberOfVoices")
     */
    private $totalNumberOfVoices;

    /**
     * @var string
     * @Annotation\Type("string")
     * @Annotation\SerializedName("type")
     */
    private $type;

    /**
     * @var Vote[]
     * @Annotation\Type("ArrayCollection<Alphatrader\ApiBundle\Model\Vote>")
     * @Annotation\SerializedName("votes")
     */
    private $votes;

    /**
     * @var float
     * @Annotation\Type("float")
     * @Annotation\SerializedName("approvalVotesPercentage")
     */
    private $approvalVotesPercentage;

    /**
     * @var CompanyCompactProfile
     * @Annotation\Type("Alphatrader\ApiBundle\Model\CompanyCompactProfile")
     * @Annotation\SerializedName("company")
     */
    private $company;

    /**
     * @var float
     * @Annotation\Type("float")
     * @Annotation\SerializedName("dailyWage")
     */
    private $dailyWage;
    
    /**
     * @return string
     */
    public function getAbstentionRule()
    {
        return $this->abstentionRule;
    }

    /**
     * @param string $abstentionRule
     */
    public function setAbstentionRule($abstentionRule)
    {
        $this->abstentionRule = $abstentionRule;
    }

    /**
     * @return float
     */
    public function getCastVotesPercentage()
    {
        return $this->castVotesPercentage;
    }

    /**
     * @param float $castVotesPercentage
     */
    public function setCastVotesPercentage($castVotesPercentage)
    {
        $this->castVotesPercentage = $castVotesPercentage;
    }

    /**
     * @return VoiceNumber[]
     */
    public function getGroup()
    {
        return $this->group;
    }

    /**
     * @param VoiceNumber[] $group
     */
    public function setGroup($group)
    {
        $this->group = $group;
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getMotion()
    {
        return $this->motion;
    }

    /**
     * @param string $motion
     */
    public function setMotion($motion)
    {
        $this->motion = $motion;
    }

    /**
     * @return UserName
     */
    public function getPollInitiator()
    {
        return $this->pollInitiator;
    }

    /**
     * @param UserName $pollInitiator
     */
    public function setPollInitiator($pollInitiator)
    {
        $this->pollInitiator = $pollInitiator;
    }

    /**
     * @return int
     */
    public function getResultExpireDate()
    {
        return $this->resultExpireDate;
    }

    /**
     * @param int $resultExpireDate
     */
    public function setResultExpireDate($resultExpireDate)
    {
        $this->resultExpireDate = $resultExpireDate;
    }

    /**
     * @return int
     */
    public function getTotalNumberOfCastVotes()
    {
        return $this->totalNumberOfVotes;
    }

    /**
     * @param int $totalNumberOfVotes
     */
    public function setTotalNumberOfCastVotes($totalNumberOfVotes)
    {
        $this->totalNumberOfVotes = $totalNumberOfVotes;
    }

    /**
     * @return int
     */
    public function getTotalNumberOfVoices()
    {
        return $this->totalNumberOfVoices;
    }

    /**
     * @param int $totalNumberOfVoices
     */
    public function setTotalNumberOfVoices($totalNumberOfVoices)
    {
        $this->totalNumberOfVoices = $totalNumberOfVoices;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return Vote[]
     */
    public function getVotes()
    {
        return $this->votes;
    }

    /**
     * @param Vote[] $votes
     */
    public function setVotes($votes)
    {
        $this->votes = $votes;
    }

    /**
     * @return float
     */
    public function getApprovalVotesPercentage()
    {
        return $this->approvalVotesPercentage;
    }

    /**
     * @param float $approvalVotesPercentage
     */
    public function setApprovalVotesPercentage($approvalVotesPercentage)
    {
        $this->approvalVotesPercentage = $approvalVotesPercentage;
    }

    /**
     * @return CompanyCompactProfile
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * @param CompanyCompactProfile $company
     */
    public function setCompany($company)
    {
        $this->company = $company;
    }

    /**
     * @return float
     */
    public function getDailyWage()
    {
        return $this->dailyWage;
    }

    /**
     * @param float $dailyWage
     */
    public function setDailyWage($dailyWage)
    {
        $this->dailyWage = $dailyWage;
    }
}
