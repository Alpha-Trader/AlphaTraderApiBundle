<?php

namespace Tests\Model;

use Tests\Model\RandomTrait;
use Alphatrader\ApiBundle\Model\HashTag;

/**
 * Class HashTagTest
 * @package AlphaTraderApiTests\Model
 * @author ljbergmann <l.bergmann@sky-lab.de>
 */
class HashTagTest extends \PHPUnit_Framework_TestCase
{
    use RandomTrait;

    public function testId()
    {
        $hashTag = new HashTag();
        $this->assertNull($hashTag->getId());

        $value = uniqid();
        $hashTag->setId($value);

        $this->assertEquals($value, $hashTag->getId());
    }

    public function testTag()
    {
        $hashTag = new HashTag();
        $this->assertNull($hashTag->getTag());

        $value = $this->getRandomString(12);
        $hashTag->setTag($value);

        $this->assertEquals($value, $hashTag->getTag());
    }
}
