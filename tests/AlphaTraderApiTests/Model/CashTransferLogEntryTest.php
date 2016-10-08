<?php
/**
 * User: ljbergmann
 * Date: 29.09.16 18:23
 */

namespace Tests\Model;

use PHPUnit\Framework\TestCase;
use Alphatrader\ApiBundle\Model\CashTransferLogEntry;

class CashTransferLogEntryTest extends TestCase
{

    public function testId()
    {
        $cashTransferLogEntry = new CashTransferLogEntry();
        $this->assertNull($cashTransferLogEntry->getId());

        $uuid = uniqid();

        $cashTransferLogEntry->setId($uuid);
        $this->assertEquals($uuid, $cashTransferLogEntry->getId());
        $this->assertTrue(is_string($cashTransferLogEntry->getId()));
    }

    public function testAmount()
    {
        $cashTransferLogEntry = new CashTransferLogEntry();
        $this->assertNull($cashTransferLogEntry->getAmount());

        $amount =  mt_rand(0, 50000)+(mt_rand() / mt_getrandmax());
        $cashTransferLogEntry->setAmount($amount);

        $this->assertEquals($amount, $cashTransferLogEntry->getAmount());
        $this->assertTrue(is_float($cashTransferLogEntry->getAmount()));
    }

    public function testMessage()
    {
        $cashTransferLogEntry = new CashTransferLogEntry();
        $this->assertNull($cashTransferLogEntry->getMessage());

        // Given
        $message = $this->createMock('Alphatrader\ApiBundle\Model\MessagePrototype');

        $message->expects($this->any())->method("getFilledString")->will($this->returnValue($this->getRandomString()));
        $message->expects($this->any())->method("getMessage")->will($this->returnValue($this->getRandomString()));
        $message->expects($this->any())->method("getSubstitutions")->will($this->returnValue(['0'=>$this->getRandomString()]));

        $cashTransferLogEntry->setMessage($message);

        $this->assertInstanceOf('Alphatrader\ApiBundle\Model\MessagePrototype', $cashTransferLogEntry->getMessage());
    }

    public function testReceiverBankAcc()
    {
        $cashTransferLogEntry = new CashTransferLogEntry();
        $this->assertNull($cashTransferLogEntry->getReceiverBankAccount());

        $string = $this->getRandomString(12);
        $cashTransferLogEntry->setReceiverBankAccount($string);
        $this->assertEquals($string, $cashTransferLogEntry->getReceiverBankAccount());
        $this->assertTrue(is_string($cashTransferLogEntry->getReceiverBankAccount()));
    }

    public function testSenderBankAcc()
    {
        $cashTransferLogEntry = new CashTransferLogEntry();
        $this->assertNull($cashTransferLogEntry->getSenderBankAccount());

        $string = $this->getRandomString(12);
        $cashTransferLogEntry->setSenderBankAccount($string);
        $this->assertEquals($string, $cashTransferLogEntry->getSenderBankAccount());
        $this->assertTrue(is_string($cashTransferLogEntry->getSenderBankAccount()));
    }

    /*
    * @param $length
    */
    private function getRandomString($length = 6)
    {
        $str = "";
        $characters = array_merge(range('A', 'Z'), range('a', 'z'), range('0', '9'));
        $max = count($characters) - 1;
        for ($i = 0; $i < $length; $i++) {
            $rand = mt_rand(0, $max);
            $str .= $characters[$rand];
        }
        return $str;
    }
}
