<?php


namespace Alphatrader\ApiBundle\Model;

use Tests\Model\RandomTrait;

/**
 * Class PostLikeTest
 * @package Alphatrader\ApiBundle\Model
 * @author ljbergmann <l.bergmann@sky-lab.de>
 */
class PostLikeTest extends \PHPUnit_Framework_TestCase
{
    use RandomTrait;

    public function testId()
    {
        $ps = new PostLike();
        $this->assertNull($ps->getId());

        $value = uniqid();
        $ps->setId($value);

        $this->assertEquals($value, $ps->getId());
    }

    public function testType()
    {
        $ps = new PostLike();
        $this->assertNull($ps->getType());

        $value = $this->getRandomString();
        $ps->setType($value);

        $this->assertEquals($value, $ps->getType());
    }

    public function testUser()
    {
        $ps = new PostLike();
        $this->assertNull($ps->getUser());

        $value = $this->createMock('Alphatrader\ApiBundle\Model\UserName');
        $ps->setUser($value);

        $this->assertInstanceOf('Alphatrader\ApiBundle\Model\UserName', $ps->getUser());
    }
}
