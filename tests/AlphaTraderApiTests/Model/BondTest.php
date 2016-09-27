<?php
/**
 * Created by IntelliJ IDEA.
 * User: ljbergmann
 * Date: 26.09.16 02:12
 */

namespace Tests;

use PHPUnit\Framework\TestCase;
use Alphatrader\ApiBundle\Model\Bond;
use Symfony\Component\DependencyInjection\Tests\B;

class BondTest extends TestCase{

    public function testId(){
        $bond = new Bond();
        $this->assertNull($bond->getId());

        $uuid = uniqid();

        $bond->setId($uuid);
        $this->assertEquals($uuid,$bond->getId());
        $this->assertTrue(is_string($bond->getId()));
    }

    public function testFaceValue(){
        $bond = new Bond();
        $this->assertNull($bond->getFaceValue());

        $faceValue = mt_rand(0,99)+(mt_rand() / mt_getrandmax());
        $bond->setFaceValue($faceValue);
        $this->assertEquals($faceValue,$bond->getFaceValue());
        $this->assertTrue(is_float($bond->getFaceValue()));
    }

    public function testInterrestRate(){
        $bond = new Bond();
        $this->assertNull($bond->getInterestRate());

        $interrestRate = mt_rand() / mt_getrandmax();

        $bond->setInterestRate($interrestRate);
        $this->assertEquals($interrestRate,$bond->getInterestRate());
        $this->assertTrue(is_float($bond->getInterestRate()));
    }

    public function testIssueDate(){
        $bond = new Bond();
        $this->assertNull($bond->getIssueDate());

        $time = mt_rand(1262055681,1474823143);
        $bond->setIssueDate($time);
        $this->assertEquals($time,$bond->getIssueDate());
        $this->assertTrue(is_int($bond->getIssueDate()));
    }

    public function testIssuer(){
        $bond = new Bond();
        $this->assertNull($bond->getIssuer());
        
    }
    
    public function testMaturityDate(){
        $bond = new Bond();
        $this->assertNull($bond->getMaturityDate());

        $time = mt_rand(1262055681,1474823143);
        $bond->setMaturityDate($time);
        $this->assertEquals($time,$bond->getMaturityDate());
        $this->assertTrue(is_int($bond->getMaturityDate()));
    }
}