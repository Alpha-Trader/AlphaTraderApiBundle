<?php

namespace Api\Methods;

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
     * @return \Alphatrader\ApiBundle\Model\BankAccountView|AlphaTraderApiException
     */
    public function registerUserWithCompany($username, $email, $password)
    {
        $data = $this->post('test/registeruserwithcompany', [
            'username' => $username,
            'email' => $email,
            'password' => $password
        ]);

        return $this->parseResponse($data, 'Alphatrader\ApiBundle\Model\BankAccountView');
    }
}
