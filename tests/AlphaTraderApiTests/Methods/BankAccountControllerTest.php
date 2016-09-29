<?php

/*
 * This file is part of the AlphaTraderApiBundle package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Tests\Methods;

use Alphatrader\ApiBundle\Api\ApiClient;
use Alphatrader\ApiBundle\Api\Methods\BankAccountController;
use AlphaTrader\ApiBundle\Model\BankAccount;
use Alphatrader\ApiBundle\Model\Error;
use Doctrine\Common\Annotations\AnnotationReader;
use GuzzleHttp\Psr7\Response;
use JMS\Serializer\SerializerBuilder;
use PHPUnit\Framework\TestCase;

/**
 * Class BankAccountController
 * @package AlphaTrader\API\Controller
 * @author Tr0nYx <tronyx@bric.finance>
 */
class BankAccountControllerTest extends TestCase
{
    protected $config = [
        'apiurl'   => 'http://example.com',
        'username' => 'demo',
        'password' => 'password',
        'authid'   => 'partnerid',
        'jwt'      => 'jwttoken'
    ];
    
    /**
     * @return Bankaccount
     */
    public function test_getBankAccount()
    {
        $expected = '{"cash": 50000,"id": "3b6fcf48-e8ef-404f-b688-88ec41ea5e80"}';
        $result = json_decode($expected);

        $request = $this->createMock('Alphatrader\ApiBundle\Api\Methods\BankAccountController');
        $request->method('getBankAccount')->will($this->returnValue($expected));

        $bankaccount = new BankAccountController($this->config);
        $bankaccount->setClient($this->getClient($expected));
        $val = $bankaccount->getBankAccount();

        $this->assertEquals($result->id, $val->getId());
    }

    /**
     * @return Bankaccount
     */
    public function test_getBankAccountWithoutCash()
    {
        $expected = '{"nocash": 50000,"id": "3b6fcf48-e8ef-404f-b688-88ec41ea5e80"}';

        $request = $this->createMock('Alphatrader\ApiBundle\Api\Methods\BankAccountController');
        $request->method('getBankAccount')->will($this->returnValue($expected));

        $bankaccount = new BankAccountController($this->config);
        $bankaccount->setClient($this->getClient($expected));
        /** @var Error $val */
        $val = $bankaccount->getBankAccount();

        $this->assertInstanceOf('Alphatrader\ApiBundle\Model\Error', $val);
    }
    
    /**
     * @param $response
     *
     * @return ApiClient
     */
    public function getClient($response)
    {
        $apiclient = $this->createMock('Alphatrader\ApiBundle\Api\ApiClient');
        $apiclient->method('request')->will($this->returnValue(new Response(200, [], $response)));
        $serializer = SerializerBuilder::create();
        $serializer->setAnnotationReader(new AnnotationReader());
        $serializer->build();
        $apiclient->method('getSerializer')->will($this->returnValue($serializer));
        return $apiclient;
    }
}
