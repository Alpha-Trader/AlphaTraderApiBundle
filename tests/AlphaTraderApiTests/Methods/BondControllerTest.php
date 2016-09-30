<?php

/*
 * This file is part of the AlphaTraderApiBundle package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Tests\Methods;

use Alphatrader\ApiBundle\Api\Methods\BondController;
use Alphatrader\ApiBundle\Model\Company;
use Alphatrader\ApiBundle\Model\Error;

/**
 * Class BondControllerTest
 * @package AlphaTrader\API\Controller
 * @author Tr0nYx <tronyx@bric.finance>
 */
class BondControllerTest extends BaseTestCase
{
    protected $config = [
        'apiurl'   => 'http://example.com',
        'username' => 'demo',
        'password' => 'password',
        'authid'   => 'partnerid',
        'jwt'      => 'jwttoken'
    ];
    
    public function test_createBond()
    {
        $expected = json_encode([]);
        $request = $this->createMock('Alphatrader\ApiBundle\Api\Methods\BondController');
        $request->method('createBond')->will($this->returnValue($expected));

        $company = new Company();
        $company->setId(1);
        $bondcontroller = new BondController($this->config);
        $bondcontroller->setClient($this->getClient($expected));
        $val = $bondcontroller->createBond($company,1,1,1,1);

        $this->assertInstanceOf('Alphatrader\ApiBundle\Model\Error', $val);
    }

    public function test_getBond()
    {
        $expected = json_encode([]);
        $request = $this->createMock('Alphatrader\ApiBundle\Api\Methods\BondController');
        $request->method('getBond')->will($this->returnValue($expected));

        $bondcontroller = new BondController($this->config);
        $bondcontroller->setClient($this->getClient($expected));
        $val = $bondcontroller->getBond(1);

        $this->assertInstanceOf('Alphatrader\ApiBundle\Model\Error', $val);
    }

    public function test_repayBond()
    {
        $expected = json_encode([]);
        $request = $this->createMock('Alphatrader\ApiBundle\Api\Methods\BondController');
        $request->method('repayBond')->will($this->returnValue($expected));

        $bondcontroller = new BondController($this->config);
        $bondcontroller->setClient($this->getClient($expected));
        $val = $bondcontroller->repayBond();

        $this->assertTrue(is_array($val));
    }

    public function test_getBonds()
    {
        $expected = json_encode([]);
        $request = $this->createMock('Alphatrader\ApiBundle\Api\Methods\BondController');
        $request->method('getBonds')->will($this->returnValue($expected));

        $bondcontroller = new BondController($this->config);
        $bondcontroller->setClient($this->getClient($expected));
        $val = $bondcontroller->getBonds();

        $this->assertTrue(is_array($val));
    }
}