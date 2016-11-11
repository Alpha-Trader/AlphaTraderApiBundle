<?php

namespace Tests;

use Alphatrader\ApiBundle\Api\AlphaTrader;
use Alphatrader\ApiBundle\Model\BankAccount;
use Alphatrader\ApiBundle\Model\Company;
use Alphatrader\ApiBundle\Model\Error;
use JMS\Serializer\Exception\RuntimeException;
use Tests\Methods\BaseTestCase;

class AlphaTraderTest extends BaseTestCase
{
    /**
     * @var AlphaTrader
     */
    protected $alphatrader;

    /**
     * {@inheritDoc}
     */
    public function setUp()
    {
        $session = $this->createMock('Symfony\Component\HttpFoundation\Session\Session');
        $this->alphatrader = new AlphaTrader($this->config, $session);
    }

    public function test_createClient()
    {
        self::assertInstanceOf(AlphaTrader::class, $this->alphatrader);
    }
    
    public function test_formatTimeStamp()
    {
        $timestamp = $this->invokeMethod($this->alphatrader, 'formatTimeStamp', array(new \DateTime()));
        $this->assertInstanceOf('\DateTime', $timestamp);
        $timestamp = $this->invokeMethod($this->alphatrader, 'formatTimeStamp', array(null));
        $this->assertNull($timestamp);
        $time = mt_rand(1262055681, 1474823143);
        $timestamp = $this->invokeMethod($this->alphatrader, 'formatTimeStamp', array($time));
        $this->assertTrue(is_int($timestamp));
    }

    /**
     * @return Bankaccount
     */
    public function test_getBankAccount()
    {
        $this->expectException(RuntimeException::class);
        $this->alphatrader->getBankAccount();
    }

    public function test_getCashTransferLogs()
    {
        $senderBankAccount = new BankAccount();
        $receiverBankAccount = new BankAccount();
        $response = ['cash'=>50000];
        $expected = json_encode($response);
        $myFactory = $this->getMockBuilder('Alphatrader\ApiBundle\Api\AlphaTrader', array('getCashTransferLogs'))->disableOriginalConstructor()->getMock();
        $myFactory->expects($this->any())->method('getCashTransferLogs')->will($this->returnValue($expected));
        $val = $myFactory->getCashTransferLogs(new \DateTime(), new \DateTime(), $senderBankAccount, $receiverBankAccount);
        $this->assertEquals(json_decode($val)->cash, $response['cash']);
    }

    public function test_generateCash()
    {
        $response = ['cash'=>50000];
        $expected = json_encode($response);
        $myFactory = $this->getMockBuilder('Alphatrader\ApiBundle\Api\AlphaTrader', array('generateCash'))->disableOriginalConstructor()->getMock();
        $myFactory->expects($this->any())->method('generateCash')->will($this->returnValue($expected));
        $val = $myFactory->generateCash(50000);
        $this->assertEquals(json_decode($val)->cash, $response['cash']);
    }

    public function test_getChats()
    {
        $this->expectException(RuntimeException::class);
        $this->alphatrader->getChats();
    }

    public function test_getChat()
    {
        $this->expectException(RuntimeException::class);
        $this->alphatrader->getChat(1);
    }

    public function test_getCurrentUser()
    {
        $this->expectException(RuntimeException::class);
        $this->alphatrader->getCurrentUser();
    }

    public function test_getUsers()
    {
        $this->expectException(RuntimeException::class);
        $this->alphatrader->getUsers();
    }

    public function test_getUsersByNamePart()
    {
        $this->expectException(RuntimeException::class);
        $this->alphatrader->getUsersByNamePart('test');
    }

    public function test_getUserByUsername()
    {
        $this->expectException(RuntimeException::class);
        $this->alphatrader->getUserByUsername('test');
    }
    
    public function test_getUserById()
    {
        $this->expectException(RuntimeException::class);
        $this->alphatrader->getUserById('test');
    }

    public function test_getUserJwt()
    {
        $this->expectException(RuntimeException::class);
        $this->alphatrader->getUserJwt("UnitTest","password");
    }

    public function test_getMyCompanies()
    {
        $this->expectException(RuntimeException::class);
        $this->alphatrader->getMyCompanies();
    }

    public function test_getCompanies()
    {
        $this->expectException(RuntimeException::class);
        $this->alphatrader->getAllCompanies();
    }
    
    public function test_getCompany()
    {
        $this->expectException(RuntimeException::class);
        $this->alphatrader->getCompany('1');
    }

    public function test_getCompaniesByUserName()
    {
        $this->expectException(RuntimeException::class);
        $this->alphatrader->getCompaniesByUserName('demo');
    }

    public function test_getCompaniesByUserId()
    {
        $this->expectException(RuntimeException::class);
        return $this->alphatrader->getCompaniesByUserId(1);
    }

    public function test_getCompanyBySecurityAccountId()
    {
        $this->expectException(RuntimeException::class);
        $this->alphatrader->getCompanyBySecurityAccountId(1);
    }

    public function test_getCompanyBySecurityIdentifier()
    {
        $this->expectException(RuntimeException::class);
        $this->alphatrader->getCompanyBySecurityIdentifier(1);
    }

    public function test_getCompanyProfile()
    {
        $this->expectException(RuntimeException::class);
        $this->alphatrader->getCompanyProfile(1);
    }

    public function test_createCompany()
    {
        $this->expectException(RuntimeException::class);
        $this->alphatrader->createCompany('test', 50000);
    }

    public function test_registerUser()
    {
        $this->expectException(RuntimeException::class);
        $this->alphatrader->registerUser('test', 'test@test.xyz', 'password');
    }

    /*public function test_getUserJwt()
    {
        $this->expectException(RuntimeException::class);
        $this->alphatrader->getUserJwt('test','password');
    }*/

    public function test_getUserProfile()
    {
        $this->expectException(RuntimeException::class);
        $this->alphatrader->getUserProfile('test');
    }

    public function test_getEvents()
    {
        $this->expectException(RuntimeException::class);
        $this->alphatrader->getEvents(new \DateTime());
    }

    public function test_getEventsByRealms()
    {
        $this->expectException(RuntimeException::class);
        $this->alphatrader->getEventsByRealms('test', new \DateTime());
    }

    public function test_getEventsByType()
    {
        $this->expectException(RuntimeException::class);
        $this->alphatrader->getEventsByType('test', '', new \DateTime());
    }

    public function test_getPortfolio()
    {
        $this->expectException(RuntimeException::class);
        $this->alphatrader->getPortfolio(1);
    }

    public function test_getListing()
    {
        $this->expectException(RuntimeException::class);
        $this->alphatrader->getListing(1);
    }

    public function test_getListingProfile()
    {
        $this->expectException(RuntimeException::class);
        $this->alphatrader->getListingProfile(1);
    }

    public function test_getSecurityOrderLogs()
    {
        $this->expectException(RuntimeException::class);
        $this->alphatrader->getSecurityOrderLogs(1, new \DateTime(), new \DateTime(), 2, 3);
    }

    public function test_createBond()
    {
        $this->expectException(RuntimeException::class);
        $company = new Company();
        $company->setId(1);
        $this->alphatrader->createBond($company, 1, 1, 1, new \DateTime());
    }

    public function test_repayBond()
    {
        $this->expectException(RuntimeException::class);
        $this->alphatrader->repayBond();
    }

    public function test_getBond()
    {
        $this->expectException(RuntimeException::class);
        $this->alphatrader->getBond(1);
    }

    public function test_getBonds()
    {
        $this->expectException(RuntimeException::class);
        $this->alphatrader->getBonds();
    }

    public function test_createSystemBond()
    {
        $this->expectException(RuntimeException::class);
        $company = new Company();
        $company->setId(1);
        $this->alphatrader->createSystemBond($company, 1);
    }

    
    public function test_getSystemBond()
    {
        $this->expectException(RuntimeException::class);
        $this->alphatrader->getSystemBond(1);
    }

    public function test_createBankingLicense()
    {
        $company = new Company();
        $company->setId(1);
        $this->expectException(RuntimeException::class);
        $this->alphatrader->createBankingLicense($company);
    }
    
    public function test_getBankingLicense()
    {
        $company = new Company();
        $company->setId(1);
        $this->expectException(RuntimeException::class);
        $this->alphatrader->getBankingLicense($company);
    }

    public function test_getBankingLicenseById()
    {

        $this->expectException(RuntimeException::class);
        $this->alphatrader->getBankingLicenseById("id");
    }

    public function test_getMainInterestRate()
    {
        $this->expectException(RuntimeException::class);
        $this->alphatrader->getMainInterestRate();
    }

    public function test_getLatestMainInterestRate()
    {
        $this->expectException(RuntimeException::class);
        $this->alphatrader->getLatestMainInterestRate();
    }

    public function test_getCentralBankReservesById()
    {
        $this->expectException(RuntimeException::class);
        $this->alphatrader->getCentralBankReservesById(1);
    }

    public function test_setCompanyCentralBankReserves()
    {
        $company = new Company();
        $company->setId(1);
        $response = ['cash'=>50000];
        $expected = json_encode($response);
        $myFactory = $this->getMockBuilder('Alphatrader\ApiBundle\Api\AlphaTrader', array('setCompanyCentralBankReserves'))->disableOriginalConstructor()->getMock();
        $myFactory->expects($this->any())->method('setCompanyCentralBankReserves')->will($this->returnValue($expected));
        $val = $myFactory->setCompanyCentralBankReserves($company, 1);
        $this->assertEquals(json_decode($val)->cash, $response['cash']);
    }

    public function test_setNotificationsasRead()
    {
        //$this->expectException(RuntimeException::class);
        $response = $this->alphatrader->setNotificationsasRead(1);
        $this->assertNull($response);
    }

    public function test_getNotifications()
    {
        $this->expectException(RuntimeException::class);
        $this->alphatrader->getNotifications();
    }

    public function test_getUnreadNotifications()
    {
        $this->expectException(RuntimeException::class);
        $this->alphatrader->getUnreadNotifications();
    }

    public function test_getOrder()
    {
        $this->expectException(RuntimeException::class);
        $this->alphatrader->getOrder(1);
    }

    public function test_createOrder()
    {
        $this->expectException(RuntimeException::class);
        $this->alphatrader->createOrder(1, 1, 1, 1, 1, 1, 1);
    }

    public function test_checkOrder()
    {
        $this->expectException(RuntimeException::class);
        $this->alphatrader->checkOrder(1, 1, 1, 1);
    }


    public function test_addLogoToCompany()
    {
        //$this->expectException(RuntimeException::class);
        $company = new Company();
        $company->setId(1);
        $logourl = 'http://example.com';
        $response = ['company'=>$company,'logo'=>$logourl];
        $expected = json_encode($response, JSON_FORCE_OBJECT);
        $myFactory = $this->getMockBuilder('Alphatrader\ApiBundle\Api\AlphaTrader', array('addLogoToCompany'))->disableOriginalConstructor()->getMock();
        $myFactory->expects($this->any())->method('addLogoToCompany')->will($this->returnValue($expected));
        $val = $myFactory->addLogoToCompany($company->getId(), $logourl);
        $this->assertInstanceOf(Company::class, $company);
        $this->assertEquals($company, $response['company']);
        $this->assertEquals(1, $company->getId());
    }

    public function testGetMarketStatistics()
    {
        $this->expectException(RuntimeException::class);
        $this->alphatrader->getMarketStatistics();
    }

    public function testGetMarketStatisticsAsArray()
    {
        $this->expectException(RuntimeException::class);
        $this->alphatrader->getMarketStatisticsAsArray();
    }

    public function testGetMarketStatisticsByType()
    {
        $this->expectException(RuntimeException::class);
        $this->alphatrader->getMarketStatisticsByType('type');
    }

    public function testSearch()
    {
        $this->expectException(RuntimeException::class);
        $this->alphatrader->search("UnitTest");
    }

    public function testGetEmployment()
    {
        $this->expectException(RuntimeException::class);
        $this->alphatrader->getEmployment("id");
    }

    public function testGetEmployments()
    {
        $this->expectException(RuntimeException::class);
        $this->alphatrader->getEmployments();
    }

    public function testGetPayment()
    {
        $this->expectException(RuntimeException::class);
        $this->alphatrader->getPayment(1);
    }

    public function testPaySalary()
    {
        $this->expectException(RuntimeException::class);
        $this->alphatrader->paySalary("33");
    }

    public function testGetFixedIncomeSecurities()
    {
        $this->expectException(RuntimeException::class);
        $this->alphatrader->getFixedIncomeSecurities("secIdent");
    }

    public function testGetSystemBonds()
    {
        $this->expectException(RuntimeException::class);
        $this->alphatrader->getSystemBonds();
    }
}
