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
 * Class PartnerController
 *
 * @package AlphaTrader\API\Controller
 * @author  ljbergmann <l.bergmann@sky-lab.de>
 */
class PartnerController extends ApiClient
{
    /**
     * @return \Alphatrader\ApiBundle\Model\Error|\Alphatrader\ApiBundle\Model\UserName[]
     */
    public function getPartners()
    {
        $data = $this->get('partners/');
        return $this->parseResponse($data, 'ArrayCollection<Alphatrader\ApiBundle\Model\UserName>');
    }

    /**
     * @return \Alphatrader\ApiBundle\Model\Error|\Alphatrader\ApiBundle\Model\UserName
     */
    public function registerPartner()
    {
        $data = $this->put('partners/register');
        return $this->parseResponse($data, 'Alphatrader\ApiBundle\Model\UserName');
    }
}
