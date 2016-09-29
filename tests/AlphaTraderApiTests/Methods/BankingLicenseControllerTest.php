<?php

/*
 * This file is part of the AlphaTraderApiBundle package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Tests\Methods;

use Alphatrader\ApiBundle\Api\ApiClient;
use Alphatrader\ApiBundle\Api\Methods\BankingLicenseController;
use Alphatrader\ApiBundle\Model\BankingLicense;
use Alphatrader\ApiBundle\Model\Company;
use Alphatrader\ApiBundle\Model\Error;
use Doctrine\Common\Annotations\AnnotationReader;
use GuzzleHttp\Psr7\Response;
use JMS\Serializer\SerializerBuilder;
use PHPUnit\Framework\TestCase;

/**
 * Class BankingLicenseController
 * @package AlphaTrader\API\Controller
 * @author Tr0nYx <tronyx@bric.finance>
 */
class BankingLicenseControllerTest extends TestCase
{
    protected $config = [
        'apiurl'   => 'http://example.com',
        'username' => 'demo',
        'password' => 'password',
        'authid'   => 'partnerid',
        'jwt'      => 'jwttoken'
    ];

    public function test_createBankingLicenseWithError()
    {
        $expected = json_encode([]);
        $request = $this->createMock('Alphatrader\ApiBundle\Api\Methods\BankingLicenseController');
        $request->method('createBankingLicense')->will($this->returnValue($expected));

        $company = new Company();
        $company->setId(1);
        $bankaccount = new BankingLicenseController($this->config);
        $bankaccount->setClient($this->getClient($expected));
        $val = $bankaccount->createBankingLicense($company);

        $this->assertInstanceOf('Alphatrader\ApiBundle\Model\Error', $val);
    }

    public function test_getBankingLicenseWithError()
    {
        $expected = json_encode([]);
        $request = $this->createMock('Alphatrader\ApiBundle\Api\Methods\BankingLicenseController');
        $request->method('getBankingLicense')->will($this->returnValue($expected));

        $company = new Company();
        $company->setId(1);
        $bankaccount = new BankingLicenseController($this->config);
        $bankaccount->setClient($this->getClient($expected));
        $val = $bankaccount->getBankingLicense($company);

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
