<?php

namespace Alphatrader\ApiBundle\Api\Traits;

use Alphatrader\ApiBundle\Api\Methods\VotingController;
use Alphatrader\ApiBundle\Model\AbstractPoll;
use Alphatrader\ApiBundle\Model\Company;

/**
 * Class VotingTrait
 *
 * @package Alphatrader\ApiBundle\Api\Traits
 * @author  Tr0nYx
 */
trait VotingTrait
{
    /**
     * @return \Alphatrader\ApiBundle\Model\AbstractPoll[]
     */
    public function getMyPolls()
    {
        return $this->getVotingController()->getMyPolls();
    }

    /**
     * @return \Alphatrader\ApiBundle\Model\AbstractPoll[]
     */
    public function getAllKnownPolls()
    {
        return $this->getVotingController()->getAllKnownPolls();
    }

    /**
     * @param Company $company
     *
     * @return \Alphatrader\ApiBundle\Model\AbstractPoll
     */
    public function setCompanyCashoutPoll(Company $company)
    {
        return $this->getVotingController()->setCompanyCashoutPoll($company);
    }

    /**
     * @param Company   $company
     * @param         $dailyWage
     *
     * @return \Alphatrader\ApiBundle\Model\AbstractPoll
     */
    public function setCompanyEmployCeo(Company $company, $dailyWage)
    {
        return $this->getVotingController()->setCompanyEmployCeo($company, $dailyWage);
    }

    /**
     * @param Company $company
     *
     * @return \Alphatrader\ApiBundle\Model\AbstractPoll
     */
    public function setCompanyLiquidation(Company $company)
    {
        return $this->getVotingController()->setCompanyLiquidation($company);
    }

    /**
     * @param $pollid
     *
     * @return \Alphatrader\ApiBundle\Model\AbstractPoll
     */
    public function getPoll($pollid)
    {
        return $this->getVotingController()->getPoll($pollid);
    }

    /**
     * @param $pollid
     */
    public function setExecutePoll($pollid)
    {
        $this->getVotingController()->executePoll($pollid);
    }

    /**
     * @param $pollid
     */
    public function setdeletePoll($pollid)
    {
        $this->getVotingController()->deletePoll($pollid);
    }

    /**
     * @param $pollid
     * @param $voices
     * @param $votingType
     *
     * @return AbstractPoll
     */
    public function castVote($pollid, $voices, $votingType)
    {
        return $this->getVotingController()->votePoll($pollid, $voices, $votingType);
    }

    /**
     * @param $pollId
     * @return \Alphatrader\ApiBundle\Model\Error|\Alphatrader\ApiBundle\Model\Message
     */
    public function executePoll($pollId)
    {
        return $this->getVotingController()->executePoll($pollId);
    }

    /**
     * @return VotingController
     */
    public function getVotingController()
    {
        return new VotingController($this->config, $this->jwt);
    }
}
