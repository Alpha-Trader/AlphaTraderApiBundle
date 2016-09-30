<?php

/*
 * This file is part of the AlphaTraderApiBundle package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Alphatrader\ApiBundle\Api\Methods;

use Alphatrader\ApiBundle\Api\ApiClient;
use AlphaTrader\ApiBundle\Model\Bankaccount;
use Alphatrader\ApiBundle\Model\Bond;
use Alphatrader\ApiBundle\Model\Company;
use Alphatrader\ApiBundle\Model\Error;
use JMS\Serializer\SerializerBuilder;

/**
 * Class BankAccountController
 * @package AlphaTrader\API\Controller
 * @author Tr0nYx <tronyx@bric.finance>
 */
class BondController extends ApiClient
{
    /**
     * @param Company $company
     * @param         $numberOfBonds
     * @param         $faceValue
     * @param         $interestRate
     * @param         $maturityDate
     *
     * @return Bond|Error
     */
    public function createBond(Company $company, $numberOfBonds, $faceValue, $interestRate, $maturityDate)
    {
        $data = $this->post(
            'bonds/',
            [],
            [
                'companyId'     => $company->getId(),
                'numberOfBonds' => $numberOfBonds,
                'faceValue'     => $faceValue,
                'interestRate'  => $interestRate,
                'maturityDate'  => $maturityDate
            ]
        );
        /** @var Bond $oResult */
        $oResult = $this->getSerializer()->deserialize($data, 'Alphatrader\ApiBundle\Model\Bond', 'json');
        if ($oResult->getListing() == null) {
            $oResult = $this->getSerializer()->deserialize(
                $data,
                'Alphatrader\ApiBundle\Model\Error',
                'json'
            );
        }
        return $oResult;
    }

    /**
     * @return array
     */
    public function repayBond()
    {
        $data = $this->post('bonds/');
        $oResult = $this->getSerializer()->deserialize($data, 'array', 'json');
        return $oResult;
    }

    /**
     * @param string $bondId
     *
     * @return Bond|Error
     */
    public function getBond($bondId)
    {
        $data = $this->get('bonds/' . $bondId);
        /** @var Bond $oResult */
        $oResult = $this->getSerializer()->deserialize($data, 'Alphatrader\ApiBundle\Model\Bond', 'json');
        if ($oResult->getListing() == null) {
            $oResult = $this->getSerializer()->deserialize(
                $data,
                'Alphatrader\ApiBundle\Model\Error',
                'json'
            );
        }
        return $oResult;
    }

    /**
     * @return Bond[]|Error
     */
    public function getBonds()
    {
        $data = $this->get('bonds/');
        /** @var Bond[] $oResult */
        $oResult = $this->getSerializer()->deserialize(
            $data,
            'ArrayCollection<Alphatrader\ApiBundle\Model\Bond>',
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
}
