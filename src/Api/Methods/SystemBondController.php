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
use Alphatrader\ApiBundle\Model\Listing;
use Alphatrader\ApiBundle\Model\SystemBond;
use JMS\Serializer\SerializerBuilder;

/**
 * Class SystemBondController
 * @package AlphaTrader\API\Controller
 * @author Tr0nYx <tronyx@bric.finance>
 */
class SystemBondController extends ApiClient
{
    /**
     * @param Company $company
     * @param integer $numberOfBonds
     *
     * @return Listing
     */
    public function createBond(Company $company, $numberOfBonds)
    {
        $data = $this->post(
            'systembonds/',
            [
                'companyId'     => $company->getId(),
                'numberOfBonds' => $numberOfBonds
            ]
        );
        return $this->parseResponse($data, 'Alphatrader\ApiBundle\Model\SystemBond');
    }

    /**
     * @return array
     */
    public function repayBond()
    {
        $data = $this->post('systembonds/');
        $oResult = $this->getSerializer()->deserialize($data->getBody()->getContents(), 'array', 'json');
        return $oResult;
    }

    /**
     * @param string $bondId
     *
     * @return Bond
     */
    public function getBond($bondId)
    {
        $data = $this->get('systembonds/' . $bondId);
        return $this->parseResponse($data, 'Alphatrader\ApiBundle\Model\SystemBond');
    }
}
