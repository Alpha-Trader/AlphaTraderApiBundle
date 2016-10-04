<?php
/**
 * User: ljbergmann
 * Date: 25.09.16 23:26
 */

namespace Tests\Model;

use Alphatrader\ApiBundle\Model\AbstractPoll;
use PHPUnit\Framework\TestCase;

/**
 * Class AbstracPollTest
 * @package Tests\Model
 * @author ljbergmann
 * @author Tr0nYx
 */
class AbstractPollTest extends TestCase
{
    public function testId()
    {
        $abstractPoll = $this->getAbstractPoll();
        $this->assertNull($abstractPoll->getId());
        $uuid = uniqid();

        $abstractPoll->setId($uuid);
        $this->assertEquals($uuid,$abstractPoll->getId());
    }

    public function testAbstentionRule()
    {
        $abstractPoll = $this->getAbstractPoll();
        $this->assertNull($abstractPoll->getAbstentionRule());

        $abstractPoll->setAbstentionRule("COUNTS_AS_APPROVAL");
        $this->assertEquals("COUNTS_AS_APPROVAL",$abstractPoll->getAbstentionRule());

    }

    public function testCastVotesPercentage()
    {
        $abstractPoll = $this->getAbstractPoll();
        $this->assertNull($abstractPoll->getCastVotesPercentage());

        $percentage = mt_rand() / mt_getrandmax();

        $abstractPoll->setCastVotesPercentage($percentage);
        $this->assertEquals($percentage,$abstractPoll->getCastVotesPercentage());
        $this->assertTrue(is_float($percentage));
    }

    public function testGroup()
    {
        $abstractPoll = $this->getAbstractPoll();

        // Given
        $username1 = $this->createMock('Alphatrader\ApiBundle\Model\UserName');
        
        $group1 = $this->createMock('Alphatrader\ApiBundle\Model\VoiceNumber');
        $group1->expects($this->any())->method('setGroupMember')->will($this->returnValue($username1));
        
        $group2 = $this->createMock('Alphatrader\ApiBundle\Model\VoiceNumber');
        $group2->expects($this->any())->method('setGroupMember')->will($this->returnValue($username1));

        //When
        $abstractPoll->setGroup([$group1,$group2]);

        //Then
        $this->assertCount(2, $abstractPoll->getGroup());
    }
    
    public function testMotion()
    {
        $abstractPoll = $this->getAbstractPoll();
        $this->assertNull($abstractPoll->getMotion());
        $motion = $this->getRandomString();
        
        $abstractPoll->setMotion($motion);
        $this->assertEquals($motion,$abstractPoll->getMotion());
    }

    
    public function testPollInitiator()
    {
        $abstractPoll = $this->getAbstractPoll();
        $id = $this->getRandomString();
        
        $username = $this->createMock('Alphatrader\ApiBundle\Model\UserName');
        $username->expects($this->any())->method('getId')->will($this->returnValue($id));
        $abstractPoll->setPollInitiator($username);
        $this->assertEquals($id,$abstractPoll->getPollInitiator()->getId());
    }

    public function testResultExpireDate()
    {
        $abstractPoll = $this->getAbstractPoll();
        $this->assertNull($abstractPoll->getResultExpireDate());
        
        $time = mt_rand(1262055681,1474823143);
        $abstractPoll->setResultExpireDate($time);
        $this->assertEquals($time,$abstractPoll->getResultExpireDate());
        $this->assertTrue(is_int($abstractPoll->getResultExpireDate()));
    }

    public function testTotalNumberOfVotes()
    {
        $abstractPoll = $this->getAbstractPoll();
        $this->assertNull($abstractPoll->getTotalNumberOfVoices());

        $number = mt_rand(10000,50000);
        $abstractPoll->setTotalNumberOfCastVotes($number);
        $this->assertEquals($number,$abstractPoll->getTotalNumberOfCastVotes());
        $this->assertTrue(is_int($abstractPoll->getTotalNumberOfCastVotes()));
    }

    public function testTotalNumberOfVoices()
    {
        $abstractPoll = $this->getAbstractPoll();
        $this->assertNull($abstractPoll->getTotalNumberOfVoices());

        $number = mt_rand(10000,50000);
        $abstractPoll->setTotalNumberOfVoices($number);
        $this->assertEquals($number,$abstractPoll->getTotalNumberOfVoices());
        $this->assertTrue(is_int($abstractPoll->getTotalNumberOfVoices()));
    }

    public function testType()
    {
        $abstractPoll = $this->getAbstractPoll();
        
        $abstractPoll->setType('YES_NO');
        $this->assertEquals('YES_NO',$abstractPoll->getType());
        $this->assertTrue(is_string($abstractPoll->getType()));
    }
    
    public function testVotes()
    {
        $abstractPoll = $this->getAbstractPoll();
        $vote1 = $this->createMock('Alphatrader\ApiBundle\Model\Vote');
        $vote1->expects($this->any())->method('getVoices')->will($this->returnValue(3));

        $vote2 = $this->createMock('Alphatrader\ApiBundle\Model\Vote');
        $vote2->expects($this->any())->method('getVoices')->will($this->returnValue(2));

        //When
        $abstractPoll->setVotes([$vote1,$vote2]);
        $this->assertCount(2,$abstractPoll->getVotes());
    }

    /**
     * @return AbstractPoll
     */
    protected function getAbstractPoll(){

        return new AbstractPoll();
    }
    /*
     * @param $length
     */
    private function getRandomString($length = 6) {
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