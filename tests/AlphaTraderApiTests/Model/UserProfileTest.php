<?php
/**
 * User: ljbergmann
 * Date: 09.10.16 04:26
 */

namespace Tests\Model;

use Alphatrader\ApiBundle\Model\UserProfile;

/**
 * Class UserProfileTest
 * @package Tests\Model
 */

class UserProfileTest extends \PHPUnit_Framework_TestCase
{
    use RandomTrait;

    public function testBankAccount()
    {
        $up = new UserProfile();
        $this->assertNull($up->getBankAccount());

        $bankAccount = $this->createMock('Alphatrader\ApiBundle\Model\BankAccount');
        $up->setBankAccount($bankAccount);

        $this->assertInstanceOf('Alphatrader\ApiBundle\Model\BankAccount', $up->getBankAccount());
    }

    public function testCashTransferLogs()
    {
        $up = new UserProfile();
        $this->assertNull($up->getCashTransferLogs());

        $ctle = $this->createMock('Alphatrader\ApiBundle\Model\CashTransferLogEntry');
        $up->setCashTransferLogs([$ctle]);

        $this->assertContainsOnlyInstancesOf(
            'Alphatrader\ApiBundle\Model\CashTransferLogEntry',
            $up->getCashTransferLogs()
        );
    }

    public function testEmployments()
    {
        $up = new UserProfile();
        $this->assertNull($up->getEmployments());

        $eacc = $this->createMock('Alphatrader\ApiBundle\Model\EmploymentAgreementCompactCompany');
        $up->setEmployments([$eacc]);

        $this->assertContainsOnlyInstancesOf(
            'Alphatrader\ApiBundle\Model\EmploymentAgreementCompactCompany',
            $up->getEmployments()
        );
    }

    public function testEvents()
    {
        $up = new UserProfile();
        $this->assertNull($up->getEvents());

        $events = $this->createMock('Alphatrader\ApiBundle\Model\Events');
        $up->setEvents([$events]);

        $this->assertContainsOnlyInstancesOf(
            'Alphatrader\ApiBundle\Model\Events',
            $up->getEvents()
        );
    }

    public function testInitiatedPolls()
    {
        $up = new UserProfile();
        $this->assertNull($up->getInitiatedPolls());

        $poll = $this->createMock('Alphatrader\ApiBundle\Model\AbstractPoll');
        $up->setInitiatedPolls([$poll]);

        $this->assertContainsOnlyInstancesOf(
            'Alphatrader\ApiBundle\Model\AbstractPoll',
            $up->getInitiatedPolls()
        );
    }

    public function testLocale()
    {
        $up = new UserProfile();
        $this->assertNull($up->getLocale());

        $locale = $this->getRandomString();
        $up->setLocale($locale);

        $this->assertTrue(is_string($up->getLocale()));
        $this->assertEquals($locale, $up->getLocale());
    }

    public function testPolls()
    {
        $up = new UserProfile();
        $this->assertNull($up->getPolls());

        $poll = $this->createMock('Alphatrader\ApiBundle\Model\AbstractPoll');
        $up->setPolls([$poll]);

        $this->assertContainsOnlyInstancesOf(
            'Alphatrader\ApiBundle\Model\AbstractPoll',
            $up->getPolls()
        );
    }

    public function testSalaryPayments()
    {
        $up = new UserProfile();
        $this->assertNull($up->getSalaryPayments());

        $payment = $this->createMock('Alphatrader\ApiBundle\Model\SalaryPayment');
        $up->setSalaryPayments([$payment]);

        $this->assertContainsOnlyInstancesOf(
            'Alphatrader\ApiBundle\Model\SalaryPayment',
            $up->getSalaryPayments()
        );
    }

    public function testUser()
    {
        $up = new UserProfile();
        $this->assertNull($up->getUser());

        $user = $this->createMock('Alphatrader\ApiBundle\Model\UserName');
        $up->setUser($user);

        $this->assertInstanceOf('Alphatrader\ApiBundle\Model\UserName', $up->getUser());
    }

    public function testUserCapabilities()
    {
        $up = new UserProfile();
        $this->assertNull($up->getUserCapabilities());

        $user = $this->createMock('Alphatrader\ApiBundle\Model\UserCapabilities');
        $up->setUserCapabilities($user);

        $this->assertInstanceOf('Alphatrader\ApiBundle\Model\UserCapabilities', $up->getUserCapabilities());
    }

    public function testGetDailyWage()
    {
        $up = new UserProfile();
        $this->assertEquals(0.00, $up->getDailyWage());

        $wage = $this->getRandomFloat();
        $eacc = $this->createMock('Alphatrader\ApiBundle\Model\EmploymentAgreementCompactCompany');
        $eacc->expects($this->any())->method('getDailyWage')->willReturn($wage);
        $up->setEmployments([$eacc]);

        $this->assertTrue(is_float($up->getDailyWage()));
        $this->assertEquals($wage, $up->getDailyWage());
    }

    public function testGetFirstEmploymentDate()
    {
        $up = new UserProfile();
        $this->assertNull($up->getFirstEmploymentDate());

        $date = new \DateTime("now");
        $eacc = $this->createMock('Alphatrader\ApiBundle\Model\EmploymentAgreementCompactCompany');
        $eacc->expects($this->any())->method('getStartDate')->willReturn($date);
        $ac = $this->createMock('\Doctrine\Common\Collections\ArrayCollection');
        $ac->expects($this->any())->method('first')->willReturn($eacc);

        $up->setEmployments($ac);

        $this->assertEquals($date, $up->getFirstEmploymentDate());
    }
}
