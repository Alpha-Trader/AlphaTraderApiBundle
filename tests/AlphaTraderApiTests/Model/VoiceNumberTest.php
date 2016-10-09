<?php
/**
 * User: ljbergmann
 * Date: 09.10.16 04:23
 */

namespace Tests\Model;

use Alphatrader\ApiBundle\Model\VoiceNumber;

/**
 * Class VoiceNumberTest
 * @package Tests\Model
 */

class VoiceNumberTest extends \PHPUnit_Framework_TestCase
{
    use RandomTrait;

    public function testGroupMember()
    {
        $vote = new VoiceNumber();
        $this->assertNull($vote->getGroupMember());

        $voter = $this->createMock("Alphatrader\ApiBundle\Model\UserName");
        $vote->setGroupMember($voter);

        $this->assertInstanceOf("Alphatrader\ApiBundle\Model\UserName", $vote->getGroupMember());
    }

    public function testNumberOfVoices()
    {
        $vote = new VoiceNumber();
        $this->assertNull($vote->getNumberOfVoices());

        $voices = mt_rand(1000, 5000);
        $vote->setNumberOfVoices($voices);

        $this->assertTrue(is_int($vote->getNumberOfVoices()));
        $this->assertEquals($voices, $vote->getNumberOfVoices());
    }
}
