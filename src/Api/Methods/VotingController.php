<?php

namespace Alphatrader\ApiBundle\Api\Methods;

use Alphatrader\ApiBundle\Api\ApiClient;
use Alphatrader\ApiBundle\Model\AbstractPoll;
use Alphatrader\ApiBundle\Model\Company;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class VotingController
 * @package AlphaTrader\API\Controller
 * @author Tr0nYx <tronyx@bric.finance>
 */
class VotingController extends ApiClient
{
    /**
     * @return ArrayCollection
     */
    public function getMyPolls()
    {
        $data = $this->get('initiatedpolls/');
        $oResult = $this->getSerializer()->deserialize(
            $data,
            'ArrayCollection<Alphatrader\ApiBundle\Model\AbstractPoll>',
            'json'
        );
        if (!is_array($oResult)) {
            $oResult = $this->getSerializer()->deserialize(
                $data,
                'Alphatrader\ApiBundle\Model\Error',
                'json'
            );
        }
        return $oResult;
    }

    /**
     * @return ArrayCollection
     */
    public function getAllKnownPolls()
    {
        $data = $this->get('polls/');
        $oResult = $this->getSerializer()->deserialize(
            $data,
            'ArrayCollection<Alphatrader\ApiBundle\Model\AbstractPoll>',
            'json'
        );
        if (!is_array($oResult)) {
            $oResult = $this->getSerializer()->deserialize(
                $data,
                'Alphatrader\ApiBundle\Model\Error',
                'json'
            );
        }
        return $oResult;
    }

    /**
     * @param Company $company
     *
     * @return AbstractPoll
     */
    public function setCompanyCashoutPoll(Company $company)
    {
        $data = $this->post('polls/cashout', ['companyid' => $company->getId()]);
        /** @var AbstractPoll $oResult */
        $oResult = $this->getSerializer()->deserialize($data, 'Alphatrader\ApiBundle\Model\AbstractPoll', 'json');
        if ($oResult->getId() == null) {
            $oResult = $this->getSerializer()->deserialize(
                $data,
                'Alphatrader\ApiBundle\Model\Error',
                'json'
            );
        }
        return $oResult;
    }

    /**
     * @param Company $company
     * @param         $dailyWage
     *
     * @return AbstractPoll
     */
    public function setCompanyEmployCeo(Company $company, $dailyWage)
    {
        $data = $this->post('polls/employceo', ['companyid' => $company->getId(), 'dailyWage' => $dailyWage]);
        $oResult = $this->getSerializer()->deserialize($data, 'Alphatrader\ApiBundle\Model\AbstractPoll', 'json');
        if ($oResult->getId() == null) {
            $oResult = $this->getSerializer()->deserialize(
                $data,
                'Alphatrader\ApiBundle\Model\Error',
                'json'
            );
        }
        return $oResult;
    }

    /**
     * @param Company $company
     *
     * @return AbstractPoll
     */
    public function setCompanyLiquidation(Company $company)
    {
        $data = $this->post('polls/liquidation', ['companyid' => $company->getId()]);
        $oResult = $this->getSerializer()->deserialize($data, 'Alphatrader\ApiBundle\Model\AbstractPoll', 'json');
        if ($oResult->getId() == null) {
            $oResult = $this->getSerializer()->deserialize(
                $data,
                'Alphatrader\ApiBundle\Model\Error',
                'json'
            );
        }
        return $oResult;
    }

    /**
     * @param $pollid
     *
     * @return AbstractPoll
     */
    public function getPoll($pollid)
    {
        $data = $this->get('polls/' . $pollid);
        $oResult = $this->getSerializer()->deserialize($data, 'Alphatrader\ApiBundle\Model\AbstractPoll', 'json');
        if ($oResult->getId() == null) {
            $oResult = $this->getSerializer()->deserialize(
                $data,
                'Alphatrader\ApiBundle\Model\Error',
                'json'
            );
        }
        return $oResult;
    }

    /**
     * @param $pollid
     */
    public function executePoll($pollid)
    {
        $this->post('polls/execute' . $pollid);
    }

    /**
     * @param $pollid
     */
    public function deletePoll($pollid)
    {
        $this->delete('polls/' . $pollid);
    }

    /**
     * @param $pollid
     * @param $voices
     * @param $votingType
     *
     * @return AbstractPoll
     */
    public function votePoll($pollid, $voices, $votingType)
    {
        $data = $this->post('polls/', ['pollId' => $pollid, 'voices' => $voices, 'votingType' => $votingType]);
        $oResult = $this->getSerializer()->deserialize($data, 'Alphatrader\ApiBundle\Model\AbstractPoll', 'json');
        if ($oResult->getId() == null) {
            $oResult = $this->getSerializer()->deserialize(
                $data,
                'Alphatrader\ApiBundle\Model\Error',
                'json'
            );
        }
        return $oResult;
    }
}