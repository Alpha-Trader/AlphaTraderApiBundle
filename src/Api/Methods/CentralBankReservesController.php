<?php

namespace Alphatrader\ApiBundle\Api\Methods;

use Alphatrader\ApiBundle\Api\ApiClient;
use Alphatrader\ApiBundle\Model\CentralBankReserve;
use Alphatrader\ApiBundle\Model\Error;

/**
 * Class CentralBankReservesController
 * @package Alphatrader\ApiBundle\Api\Methods
 * @author Tr0nYx <tronyx@bric.finance>
 */
class CentralBankReservesController extends ApiClient
{
    /**
     * @param int $reserveId
     *
     * @return CentralBankReserve|Error
     */
    public function getReserveById($reserveId)
    {
        $data = $this->get('centralbankreserves' . $reserveId);
        /** @var CentralBankReserve $oResult */
        $oResult = $this->serializer->deserialize($data, 'Alphatrader\ApiBundle\Model\CentralBankReserve', 'json');
        if ($oResult->getId() == null) {
            $oResult = $this->serializer->deserialize(
                $data,
                'Alphatrader\ApiBundle\Model\Error',
                'json'
            );
        }
        return $oResult;
    }
}