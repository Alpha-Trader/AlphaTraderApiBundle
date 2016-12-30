<?php

namespace Tests\Model;

use Alphatrader\ApiBundle\Model\Posts;

/**
 * Class PostsTest
 * @package Tests\Model
 * @author ljbergmann <l.bergmann@sky-lab.de>
 */
class PostsTest extends \PHPUnit_Framework_TestCase
{
    use RandomTrait;

    public function testAlliance()
    {
        $post = new Posts();
        $this->assertNull($post->getAlliance());

        $value = $this->createMock('Alphatrader\ApiBundle\Model\Alliance');
        $post->setAlliance($value);

        $this->assertInstanceOf('Alphatrader\ApiBundle\Model\Alliance', $post->getAlliance());
    }

    public function testAuthor()
    {
        $post = new Posts();
        $this->assertNull($post->getAuthor());

        $value = $this->createMock('Alphatrader\ApiBundle\Model\UserName');
        $post->setAuthor($value);
    }

    public function testComment()
    {
        $post = new Posts();
        $this->assertNull($post->isComment());

        $value = $this->getRandomInteger(0, 1);
        $post->setComment($value);

        $this->assertEquals($value, $post->isComment());
    }

    public function testCompany()
    {
        $post = new Posts();
        $this->assertNull($post->getCompany());

        $value = $this->createMock('Alphatrader\ApiBundle\Model\CompactCompany');
        $post->setCompany($value);

        $this->assertInstanceOf('Alphatrader\ApiBundle\Model\CompactCompany', $post->getCompany());
    }

    public function testContent()
    {
        $post = new Posts();
        $this->assertNull($post->getContent());

        $value = $this->getRandomString(200);
        $post->setContent($value);

        $this->assertTrue(is_string($post->getContent()));
        $this->assertEquals($value, $post->getContent());
    }

    public function testDateCreated()
    {
        $post = new Posts();
        $this->assertNull($post->getDateCreated());

        $value = new \DateTime('now');
        $post->setDateCreated($value);

        $this->assertEquals($value, $post->getDateCreated());
    }

    public function testDateDeleted()
    {
        $post = new Posts();
        $this->assertNull($post->getDateDeleted());

        $value = new \DateTime('now');
        $post->setDateDeleted($value);

        $this->assertEquals($value, $post->getDateDeleted());
    }

    public function testDateEdited()
    {
        $post = new Posts();
        $this->assertNull($post->getDateEdited());

        $value = new \DateTime('now');
        $post->setDateEdited($value);

        $this->assertEquals($value, $post->getDateEdited());
    }

    public function testHashTags()
    {
        $post = new Posts();
        $this->assertNull($post->getHashTags());

        $value = [$this->createMock('Alphatrader\ApiBundle\Model\HashTag')];
        $post->setHashTags($value);

        $this->assertContainsOnlyInstancesOf('Alphatrader\ApiBundle\Model\HashTag', $value);
    }

    public function testId()
    {
        $post = new Posts();
        $this->assertNull($post->getId());

        $value = uniqid();
        $post->setId($value);

        $this->assertEquals($value, $post->getId());
    }


    public function testLocale()
    {
        $post = new Posts();
        $this->assertNull($post->getLocale());

        $value = $this->getRandomString(5);
        $post->setLocale($value);

        $this->assertTrue(is_string($post->getLocale()));
        $this->assertEquals($value, $post->getLocale());
    }

    public function testMessageBoard()
    {
        $post = new Posts();
        $this->assertNull($post->getMessageBoard());

        $value = $this->createMock('Alphatrader\ApiBundle\Model\MessageBoard');
        $post->setMessageBoard($value);

        $this->assertInstanceOf('Alphatrader\ApiBundle\Model\MessageBoard', $value);
    }

    public function testNewsPostOrNewsComment()
    {
        $post = new Posts();
        $this->assertNull($post->isNewsPostOrNewsComment());

        $value = $this->getRandomInteger(0, 1);
        $post->setNewsPostOrNewsComment($value);

        $this->assertEquals($value, $post->isNewsPostOrNewsComment());
    }

    public function testParent()
    {
        $post = new Posts();
        $this->assertNull($post->getParent());

        $value = $this->getRandomString(12);
        $post->setParent($value);

        $this->assertTrue(is_string($post->getParent()));
        $this->assertEquals($value, $post->getParent());
    }

    public function testRoot()
    {
        $post = new Posts();
        $this->assertNull($post->getRoot());

        $value = $this->getRandomString(12);
        $post->setRoot($value);

        $this->assertTrue(is_string($post->getRoot()));
        $this->assertEquals($value, $post->getRoot());
    }

    public function testTitle()
    {
        $post = new Posts();
        $this->assertNull($post->getTitle());

        $value = $this->getRandomString(255);
        $post->setTitle($value);

        $this->assertTrue(is_string($post->getTitle()));
        $this->assertEquals($value, $post->getTitle());
    }
}
