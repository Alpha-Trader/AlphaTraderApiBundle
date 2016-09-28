<?php

namespace Tests;

use Alphatrader\ApiBundle\Api\AlphaTrader;
use Alphatrader\ApiBundle\Api\Methods\BankAccountController;
use Alphatrader\ApiBundle\Api\Methods\CashGenerationController;
use Alphatrader\ApiBundle\Api\Methods\CashTransferLogController;
use Doctrine\Common\Annotations\AnnotationReader;
use GuzzleHttp\Psr7\Response;
use JMS\Serializer\SerializerBuilder;
use PHPUnit\Framework\TestCase;

class AlphaTraderTest extends TestCase
{
    /**
     * @var AlphaTrader
     */
    protected $alphatrader;

    protected $config = [
        'apiurl'   => 'http://example.com',
        'username' => 'demo',
        'password' => 'password',
        'authid'   => 'partnerid',
        'jwt'      => 'jwttoken'
    ];

    /**
     * {@inheritDoc}
     */
    public function setUp()
    {
        $this->alphatrader = new AlphaTrader($this->config);
    }

    public function test_createClient()
    {
        self::assertInstanceOf(AlphaTrader::class, $this->alphatrader);
    }
    
    public function test_formatTimeStamp()
    {
        $timestamp = $this->invokeMethod($this->alphatrader, 'formatTimeStamp', array(new \DateTime()));
        $this->assertTrue(is_int($timestamp));
        $time = mt_rand(1262055681,1474823143);
        $timestamp = $this->invokeMethod($this->alphatrader, 'formatTimeStamp', array($time));
        $this->assertTrue(is_int($timestamp));
    }

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

    public function test_getCashTransferLogs() {
        $log[0]['id'] = "ab016bf0-c9e4-4582-93bf-86c89077e4b2";
        $log[0]['date'] = 1465157461427;
        $log[0]['amount'] = 150;
        $log[0]['senderBankAccount'] = "1e31b49c-7f05-4f1e-8cf8-347e435a1b62";
        $log[0]['receiverBankAccount'] = "819725d2-3e97-4a20-b0e8-15ee23e1085b";
        $log[0]['message']['filledString'] = "Salary from Active Software Engineering";
        $log[0]['message']['message'] = "Salary from #";
        $log[0]['message']['substitutions'][] = "Salary from Active Software Engineering";
        
        $expected = json_encode($log);
        $result = json_decode($expected);

        $request = $this->createMock('Alphatrader\ApiBundle\Api\Methods\CashTransferLogController');
        $request->method('getCashTransferLogs')->will($this->returnValue($expected));

        $client = new CashTransferLogController($this->config);
        $client->setClient($this->getClient($expected));
        $val = $client->getCashTransferLogs(new \DateTime(),new \DateTime(),$log[0]['senderBankAccount'],$log[0]['receiverBankAccount']);

        $this->assertEquals($result[0]->id, $val[0]->getId());
        $this->assertInstanceOf('DateTime',$val[0]->getDate());
    }

    public function test_generateCash()
    {
        $expected = '{"cash": 50000,"id": "3b6fcf48-e8ef-404f-b688-88ec41ea5e80"}';
        $result = json_decode($expected);

        $request = $this->createMock('Alphatrader\ApiBundle\Api\Methods\CashGenerationController');
        $request->method('generateCash')->will($this->returnValue($expected));

        $cashcontroller = new CashGenerationController($this->config);
        $cashcontroller->setClient($this->getClient($expected));
        $val = $cashcontroller->generateCash($result->cash);

        $this->assertEquals($result->id, $val->getId());
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
    
    /**
     * Call protected/private method of a class.
     *
     * @param object &$object    Instantiated object that we will run method on.
     * @param string $methodName Method name to call
     * @param array  $parameters Array of parameters to pass into method.
     *
     * @return mixed Method return.
     */
    public function invokeMethod(&$object, $methodName, array $parameters = array())
    {
        $reflection = new \ReflectionClass(get_class($object));
        $method = $reflection->getMethod($methodName);
        $method->setAccessible(true);

        return $method->invokeArgs($object, $parameters);
    }
}