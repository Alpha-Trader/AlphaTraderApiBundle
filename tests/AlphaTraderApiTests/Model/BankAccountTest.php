<?php
/**
 * Created by IntelliJ IDEA.
 * User: ljbergmann
 * Date: 26.09.16 01:39
 */

namespace Tests\Model;

use \Alphatrader\ApiBundle\Model\BankAccount;
use PHPUnit\Framework\TestCase;

/**
 * Class UserProfile
 * @package Tests\Model
 * @author ljbergmann
 */
class BankAccountTest extends TestCase
{
    
    public function testId()
    {
        $bankAccount = $this->getBankAccount();
        $this->assertNull($bankAccount->getId());

        $uuid = uniqid();
        
        $bankAccount->setId($uuid);
        $this->assertEquals($uuid, $bankAccount->getId());
        $this->assertTrue(is_string($bankAccount->getId()));
    }
    
    public function testCash()
    {
        $bankAccount = $this->getBankAccount();
        $this->assertNull($bankAccount->getCash());
        
        $cash = mt_rand() / mt_getrandmax();

        $bankAccount->setCash($cash);
        $this->assertEquals($cash, $bankAccount->getCash());
        $this->assertTrue(is_float($bankAccount->getCash()));
    }
    
    private function getBankAccount()
    {
        return new BankAccount();
    }
}
