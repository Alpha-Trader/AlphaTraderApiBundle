<?php

/*
 * This file is part of the AlphaTraderApiBundle package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Alphatrader\ApiBundle\Api\Methods;

use Alphatrader\ApiBundle\Api\ApiClient;
use Alphatrader\ApiBundle\Api\Exception\HttpErrorException;
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
     * @throws \Alphatrader\ApiBundle\Api\Exception\HttpErrorException
     * @return Bond|Error
     */
    public function createBond(Company $company, $numberOfBonds, $faceValue, $interestRate, $maturityDate)
    {
        $request = $this->post(
            'bonds/',
            [
                'companyId' => $company->getId(),
                'numberOfBonds' => $numberOfBonds,
                'faceValue' => $faceValue,
                'interestRate' => $interestRate,
                'maturityDate' => $maturityDate
            ]
        );
        return $this->parseResponse($request, 'Alphatrader\ApiBundle\Model\Bond');
    }

    /**
     * @return array
     */
    public function repayBond()
    {
        $data = $this->post('bonds/');
        $oResult = $this->getSerializer()->deserialize($data->getBody()->getContents(), 'array', 'json');

        return $oResult;
    }

    /**
     * @param string $bondId
     *
     * @throws \Alphatrader\ApiBundle\Api\Exception\HttpErrorException
     * @return Bond|Error
     */
    public function getBond($bondId)
    {
        $request = $this->get('bonds/' . $bondId);
        return $this->parseResponse($request, 'Alphatrader\ApiBundle\Model\Bond');
    }

    /**
     * @throws \Alphatrader\ApiBundle\Api\Exception\HttpErrorException
     * @return Bond[]|Error
     */
    public function getBonds()
    {
        $request = $this->get('bonds/');
        return $this->parseResponse($request, 'ArrayCollection<Alphatrader\ApiBundle\Model\Bond>');
    }
}
