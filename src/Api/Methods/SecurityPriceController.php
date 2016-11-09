<?php
/*
 * This file is part of the AlphaTraderApiBundle package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Alphatrader\ApiBundle\Api\Methods;

use Alphatrader\ApiBundle\Api\ApiClient;

/**
 * Class PriceSpreadController
 * @package AlphaTrader\API\Controller
 * @author ljbergmann <l.bergmann@sky-lab.de>
 */
class SecurityPriceController extends ApiClient
{
    /**
     * @param $secIdent
     * @param $startDate
     * @param $endDate
     * @return \Alphatrader\ApiBundle\Model\Error|\Alphatrader\ApiBundle\Model\SecurityPrice[]
     */
    public function getSecurityPrices($secIdent, $startDate, $endDate)
    {
        $data = $this->get('securityPrices/', [
            'securityIdentifier' => $secIdent,
            'startDate' => $startDate,
            'endDate' => $endDate
        ]);
        return $this->parseResponse($data, 'ArrayCollection<Alphatrader\ApiBundle\Model\SecurityPrice>');
    }
}
