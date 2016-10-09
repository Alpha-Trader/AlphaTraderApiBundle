<?php
/**
 * User: ljbergmann
 * Date: 09.10.16 04:18
 */

namespace Tests\Model;

use Alphatrader\ApiBundle\Model\Vote;

/**
 * Class VoteTest
 * @package Tests\Model
 */

class VoteTest extends \PHPUnit_Framework_TestCase
{
    use RandomTrait;

    public function testType()
    {
        $vote = new Vote();
        $this->assertNull($vote->getType());

        $type = $this->getRandomString();
        $vote->setType($type);

        $this->assertTrue(is_string($vote->getType()));
        $this->assertEquals($type, $vote->getType());
    }

    public function testVoices()
    {
        $vote = new Vote();
        $this->assertNull($vote->getVoices());

        $vocies = mt_rand(1000, 5000);
        $vote->setVoices($vocies);

        $this->assertTrue(is_int($vote->getVoices()));
        $this->assertEquals($vocies, $vote->getVoices());
    }

    public function testVoter()
    {
        $vote = new Vote();
        $this->assertNull($vote->getVoter());

        $voter = $this->createMock("Alphatrader\ApiBundle\Model\UserName");
        $vote->setVoter($voter);

        $this->assertInstanceOf("Alphatrader\ApiBundle\Model\UserName", $vote->getVoter());
    }
}
