<?php

namespace Alphatrader\ApiBundle\Api\Methods;

use Alphatrader\ApiBundle\Api\ApiClient;
use Alphatrader\ApiBundle\Api\Exception\AlphaTraderApiException;

/**
 * Class TestController
 * @package Api\Methods
 * @author ljbergmann <l.bergmann@sky-lab.de>
 */
class TestController extends ApiClient
{
    /**
     * @param $username
     * @param $email
     * @param $password
     * @return \Alphatrader\ApiBundle\Model\UserAccount|AlphaTraderApiException
     */
    public function registerUserWithCompany($username, $email, $password)
    {
        $data = $this->post($this->config['apiurl'].'/test/registeruserwithcompany', [
            'username' => $username,
            'emailAddress' => $email,
            'password' => $password
        ]);

        return $this->parseResponse($data, 'Alphatrader\ApiBundle\Model\UserAccount');
    }
}
