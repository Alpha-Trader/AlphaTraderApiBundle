<?php
/**
 * User: ljbergmann
 * Date: 09.10.16 02:41
 */

namespace Tests\Model;

use Alphatrader\ApiBundle\Model\SalaryPayment;

/**
 * Class SalaryPaymentTest
 * @package Tests\Model
 */

class SalaryPaymentTest extends \PHPUnit_Framework_TestCase
{
    use RandomTrait;

    public function testId()
    {
        $salaryPayment = new SalaryPayment();
        $this->assertNull($salaryPayment->getId());

        $uuid = uniqid();
        $salaryPayment->setId($uuid);

        $this->assertTrue(is_string($salaryPayment->getId()));
        $this->assertEquals($uuid, $salaryPayment->getId());
    }

    public function testCompanyId()
    {
        $salaryPayment = new SalaryPayment();
        $this->assertNull($salaryPayment->getCompanyId());

        $uuid = uniqid();
        $salaryPayment->setCompanyId($uuid);

        $this->assertTrue(is_string($salaryPayment->getCompanyId()));
        $this->assertEquals($uuid, $salaryPayment->getCompanyId());
    }

    public function testNextPossiblePayment()
    {
        $salaryPayment = new SalaryPayment();
        $this->assertNull($salaryPayment->getNextPossiblePaymentDate());

        $date = $this->getRandomString();
        $salaryPayment->setNextPossiblePaymentDate($date);

        $this->assertTrue(is_string($salaryPayment->getNextPossiblePaymentDate()));
        $this->assertEquals($date, $salaryPayment->getNextPossiblePaymentDate());
    }

    public function testSalaryAmount()
    {
        $salaryPayment = new SalaryPayment();
        $this->assertNull($salaryPayment->getSalaryAmount());

        $volume = $this->getRandomFloat();
        $salaryPayment->setSalaryAmount($volume);

        $this->assertTrue(is_float($salaryPayment->getSalaryAmount()));
        $this->assertEquals($volume, $salaryPayment->getSalaryAmount());
    }
}
