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
 * Class LocaleController
 *
 * @package AlphaTrader\API\Controller
 * @author  ljbergmann <l.bergmann@sky-lab.de>
 */
class LocaleController extends ApiClient
{
    /**
     * @return \Alphatrader\ApiBundle\Model\Error|\Alphatrader\ApiBundle\Model\Message
     */
    public function getLocaleFromCurrentUser()
    {
        $data = $this->get('locale');
        return $this->parseResponse($data, 'Alphatrader\ApiBundle\Model\Message');
    }

    /**
     * @param $locale
     * @return \Alphatrader\ApiBundle\Model\Error|\Alphatrader\ApiBundle\Model\Message
     */
    public function setLocale($locale)
    {
        $data = $this->put('locale', ['locale' => $locale]);
        return $this->parseResponse($data, 'Alphatrader\ApiBundle\Model\Message');
    }

    /**
     * @return array|\JMS\Serializer\scalar|mixed|object
     */
    public function getLocales()
    {
        $data = $this->get('locales');
        return $this->getSerializer()->deserialize($data->getBody()->getContents(), 'array', 'json');
    }
}
