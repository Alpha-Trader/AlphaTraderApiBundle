<?php

namespace Alphatrader\ApiBundle\Api\Methods;

use Alphatrader\ApiBundle\Api\ApiClient;
use Alphatrader\ApiBundle\Model\Company;

/**
 * Class VotingController
 *
 * @package AlphaTrader\API\Controller
 * @author  Tr0nYx <tronyx@bric.finance>
 */
class VotingController extends ApiClient
{
    /**
     * @return \Alphatrader\ApiBundle\Model\AbstractPoll[]|\Alphatrader\ApiBundle\Model\Error
     */
    public function getMyPolls()
    {
        $data = $this->get('initiatedpolls/');
        return $this->parseResponse($data, 'ArrayCollection<Alphatrader\ApiBundle\Model\AbstractPoll>');
    }

    /**
     * @return \Alphatrader\ApiBundle\Model\AbstractPoll[]|\Alphatrader\ApiBundle\Model\Error
     */
    public function getAllKnownPolls()
    {
        $data = $this->get('polls/');
        return $this->parseResponse($data, 'ArrayCollection<Alphatrader\ApiBundle\Model\AbstractPoll>');
    }

    /**
     * @param Company $company
     *
     * @return \Alphatrader\ApiBundle\Model\AbstractPoll|\Alphatrader\ApiBundle\Model\Error
     */
    public function setCompanyCashoutPoll(Company $company)
    {
        $data = $this->post('polls/cashout', ['companyId' => $company->getId()]);
        return $this->parseResponse($data, 'Alphatrader\ApiBundle\Model\AbstractPoll');
    }

    /**
     * @param Company   $company
     * @param         $dailyWage
     *
     * @return \Alphatrader\ApiBundle\Model\AbstractPoll|\Alphatrader\ApiBundle\Model\Error
     */
    public function setCompanyEmployCeo(Company $company, $dailyWage)
    {
        $data = $this->post('polls/employceo', ['companyId' => $company->getId(), 'dailyWage' => $dailyWage]);
        return $this->parseResponse($data, 'Alphatrader\ApiBundle\Model\AbstractPoll');
    }

    /**
     * @param Company $company
     *
     * @return \Alphatrader\ApiBundle\Model\AbstractPoll|\Alphatrader\ApiBundle\Model\Error
     */
    public function setCompanyLiquidation(Company $company)
    {
        $data = $this->post('polls/liquidation', ['companyId' => $company->getId()]);
        return $this->parseResponse($data, 'Alphatrader\ApiBundle\Model\AbstractPoll');
    }

    /**
     * @param $pollid
     *
     * @return \Alphatrader\ApiBundle\Model\AbstractPoll|\Alphatrader\ApiBundle\Model\Error
     */
    public function getPoll($pollid)
    {
        $data = $this->get('polls/' . $pollid);
        return $this->parseResponse($data, 'Alphatrader\ApiBundle\Model\AbstractPoll');
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
     * @return \Alphatrader\ApiBundle\Model\AbstractPoll|\Alphatrader\ApiBundle\Model\Error
     */
    public function votePoll($pollid, $voices, $votingType)
    {
        $data = $this->post('polls/'.$pollid, ['voices' => $voices, 'votingType' => $votingType]);
        return $this->parseResponse($data, 'Alphatrader\ApiBundle\Model\AbstractPoll');
    }
}
