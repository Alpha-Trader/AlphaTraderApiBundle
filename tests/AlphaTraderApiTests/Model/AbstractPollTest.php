<?php
/**
 * Created by IntelliJ IDEA.
 * User: ljbergmann
 * Date: 25.09.16 23:26
 */

namespace Tests;

use \Alphatrader\ApiBundle\Model\AbstractPoll;
use PHPUnit\Framework\TestCase;

/**
 * Class UserProfile
 * @package Tests\Model
 * @author ljbergmann
 */
class AbstractPollTest extends TestCase {

    public function testId(){
        $abstractPoll = $this->getAbstractPoll();
        $this->assertNull($abstractPoll->getId());
        $uuid = uniqid();

        $abstractPoll->setId($uuid);
        $this->assertEquals($uuid,$abstractPoll->getId());
    }

    public function testAbstentionRule(){
        /* @var $abstractPoll \Alphatrader\ApiBundle\Model\AbstractPoll */
        $abstractPoll = $this->getAbstractPoll();
        $this->assertNull($abstractPoll->getAbstentionRule());

        $abstractPoll->setAbstentionRule("COUNTS_AS_APPROVAL");
        $this->assertEquals("COUNTS_AS_APPROVAL",$abstractPoll->getAbstentionRule());

    }

    public function testCastVotesPercentage(){
        /* @var $abstractPoll \Alphatrader\ApiBundle\Model\AbstractPoll */
        $abstractPoll = $this->getAbstractPoll();
        $this->assertNull($abstractPoll->getCastVotesPercentage());

        $percentage = mt_rand() / mt_getrandmax();

        $abstractPoll->setCastVotesPercentage($percentage);
        $this->assertEquals($percentage,$abstractPoll->getCastVotesPercentage());
        $this->assertTrue(is_float($percentage));
    }

    public function testGroup(){
        /* @var $abstractPoll \Alphatrader\ApiBundle\Model\AbstractPoll */
        $abstractPoll = $this->getAbstractPoll();
    }
    
    public function testMotion(){
        /* @var $abstractPoll \Alphatrader\ApiBundle\Model\AbstractPoll */
        $abstractPoll = $this->getAbstractPoll();
        $this->assertNull($abstractPoll->getMotion());
        $motion = $this->randomString();
        
        $abstractPoll->setMotion($motion);
        $this->assertEquals($motion,$abstractPoll->getMotion());
    }

    
    public function testPollInitiator(){
        /* @var $abstractPoll \Alphatrader\ApiBundle\Model\AbstractPoll */
        $abstractPoll = $this->getAbstractPoll();

    }

    public function testResultExpireDate(){
        /* @var $abstractPoll \Alphatrader\ApiBundle\Model\AbstractPoll */
        $abstractPoll = $this->getAbstractPoll();
        $this->assertNull($abstractPoll->getResultExpireDate());
        
        $time = mt_rand(1262055681,1474823143);
        $abstractPoll->setResultExpireDate($time);
        $this->assertEquals($time,$abstractPoll->getResultExpireDate());
        $this->assertTrue(is_int($abstractPoll->getResultExpireDate()));
    }

    public function testTotalNumberOfVotes(){
        /* @var $abstractPoll \Alphatrader\ApiBundle\Model\AbstractPoll */
        $abstractPoll = $this->getAbstractPoll();
        $this->assertNull($abstractPoll->getTotalNumberOfVoices());

        $number = mt_rand(10000,50000);
        $abstractPoll->setTotalNumberOfCastVotes($number);
        $this->assertEquals($number,$abstractPoll->getTotalNumberOfCastVotes());
        $this->assertTrue(is_int($abstractPoll->getTotalNumberOfCastVotes()));
    }

    public function testTotalNumberOfVoices(){
        /* @var $abstractPoll \Alphatrader\ApiBundle\Model\AbstractPoll */
        $abstractPoll = $this->getAbstractPoll();
        $this->assertNull($abstractPoll->getTotalNumberOfVoices());

        $number = mt_rand(10000,50000);
        $abstractPoll->setTotalNumberOfVoices($number);
        $this->assertEquals($number,$abstractPoll->getTotalNumberOfVoices());
        $this->assertTrue(is_int($abstractPoll->getTotalNumberOfVoices()));
    }

    public function testType(){
        /* @var $abstractPoll \Alphatrader\ApiBundle\Model\AbstractPoll */
        $abstractPoll = $this->getAbstractPoll();
        
        $abstractPoll->setType('YES_NO');
        $this->assertEquals('YES_NO',$abstractPoll->getType());
        $this->assertTrue(is_string($abstractPoll->getType()));
    }
    
    public function testVotes(){
        /* @var $abstractPoll \Alphatrader\ApiBundle\Model\AbstractPoll */
        $abstractPoll = $this->getAbstractPoll();
    }
    
    protected function getAbstractPoll(){

        return new AbstractPoll();
    }

    /*
     * @param $length
     */
    function randomString($length = 6) {
        $str = "";
        $characters = array_merge(range('A','Z'), range('a','z'), range('0','9'));
        $max = count($characters) - 1;
        for ($i = 0; $i < $length; $i++) {
            $rand = mt_rand(0, $max);
            $str .= $characters[$rand];
        }
        return $str;
    }
    
}