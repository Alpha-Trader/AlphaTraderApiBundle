<?php
/*
 * This file is part of the AlphaTraderApiBundle package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Alphatrader\ApiBundle\Api\Methods;

use Alphatrader\ApiBundle\Api\ApiClient;
use Alphatrader\ApiBundle\Model\Company;
use Alphatrader\ApiBundle\Model\SystemBond;

/**
 * Class SystemBondController
 *
 * @package AlphaTrader\API\Controller
 * @author  Tr0nYx <tronyx@bric.finance>
 */
class SystemBondController extends ApiClient
{
    /**
     * @throws \Alphatrader\ApiBundle\Api\Exception\HttpErrorException
     * @return SystemBond[]|Error
     */
    public function getBonds()
    {
        $request = $this->get('systembonds/');
        return $this->parseResponse($request, 'ArrayCollection<Alphatrader\ApiBundle\Model\SystemBond>');
    }

    /**
     * @param string $bondId
     *
     * @return \Alphatrader\ApiBundle\Model\SystemBond|\Alphatrader\ApiBundle\Model\Error
     */
    public function getBond($bondId)
    {
        $data = $this->get('systembonds/' . $bondId);
        return $this->parseResponse($data, 'Alphatrader\ApiBundle\Model\SystemBond');
    }

    /**
     * @param string $bondId
     *
     * @return \Alphatrader\ApiBundle\Model\SystemBond|\Alphatrader\ApiBundle\Model\Error
     */
    public function getBondBySecurityIdentifier($securityIdentifier)
    {
        $data = $this->get("systembonds/securityidentifier/" . $securityIdentifier);
        return $this->parseResponse($data, 'Alphatrader\ApiBundle\Model\SystemBond');
    }

    /**
     * @param Company $company
     * @param integer $numberOfBonds
     *
     * @return \Alphatrader\ApiBundle\Model\Listing|\Alphatrader\ApiBundle\Model\Error
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
}
